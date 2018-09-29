<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Isisms extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Isisms_model');
        $this->load->library('form_validation');
    }    
    function data() {
        $table = 'view_sms';
        $primaryKey = 'id';
        $columns = array(
         array('db' => 'id', 'dt' => 0),array('db' => 'id', 'dt' => 0),
         array('db' => 'tanggal', 'dt' => 1,

  'formatter' => function( $d, $row ) {
            return date( 'l, j F Y - H:i:s', strtotime($d));
        }
            ),
         array('db' => 'nama', 'dt' => 2),
         array('db' => 'tentang', 'dt' => 3),
         array('db' => 'isi', 'dt' => 4),
         array('db' => 'username', 'dt' => 5),
         array('db' => 'status', 'dt' => 6),
         array(
            'db' => 'id',
            'dt' => 7,
            'formatter' => function( $d, $row ) {
                // return anchor('Isisms/read/'.$d,'<i class="fa fa-eye"></i>',"class='btn btn-sm btn-danger'").' '.
                // anchor('Isisms/update/'.$d,'<i class="fa fa-edit"></i>',"class='btn btn-sm btn-danger'").' '.
                // anchor('Isisms/delete/'.$d,'<i class="fa fa-trash"></i>',"class='btn btn-sm btn-danger'");
            }
            )
         );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db' => $this->db->database,
            'host' => $this->db->hostname
            );
        
        $this->load->library('ssp');
        echo json_encode(
            SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
            );
    }

    public function index()
    {
        $isisms = $this->Isisms_model->get_all();

        $data = array(
            'isisms_data' => $isisms
            );

        $this->template->load('template','isisms/isisms_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Isisms_model->get_by_id($id);
        if ($row) {
            $data = array(
              'id' => $row->id,
              'tanggal' => $row->tanggal,
              'nama' => $row->nama,
              'tentang' => $row->tentang,
              'isi' => $row->isi,
              'idAdmin' => $row->idAdmin,
              );
            $this->load->view('isisms/isisms_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('isisms'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Send',
            'action' => site_url('isisms/create_action'),
            'id' => set_value('id'),
            'tanggal' => set_value('tanggal'),
            'nama' => set_value('nama'),
            'tentang' => set_value('tentang'),
            'isi' => set_value('isi'),
            'idAdmin' => set_value('idAdmin'),
            );
        $data['user']=$this->db->get('pelanggan')->result();
        $this->template->load('template','isisms/isisms_form', $data);
    }





    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $user=$this->db->get_where('pelanggan',array('nama'=>$this->input->post('nama',TRUE)))->row_array();
            $data = array(
              'tanggal' => date('Y-m-d H:i:s'),
              'nama' => $user['id'],
              'tentang' => $this->input->post('tentang',TRUE),
              'isi' => $this->input->post('isi',TRUE),
              'idAdmin' => $this->session->userdata('id'),
              );
            $this->Isisms_model->insert($data);

            $email_api  = urlencode("daniswara.daniswara@gmail.com");
            $passkey_api    = urlencode("akuanakbaik");
            $no_hp_tujuan   = urlencode($user['noHP']);
            $isi_pesan  = urlencode($this->input->post('isi',TRUE));


            $url    = "https://reguler.medansms.co.id/sms_api.php?action=kirim_sms&email=".$email_api."&passkey=".$passkey_api."&no_tujuan=".$no_hp_tujuan."&pesan=".$isi_pesan;
            $result = file_get_contents($url);
            $data   = explode("~~~", $result);

echo $data[0]; //1=SUKSES, selain itu GAGAL
echo $data[1]; //Panjang SMS
echo $data[2]; //Jumlah SMS yang dikirim
echo $data[3]; //Total Kredit yang digunakan
echo $data[4]; //Sisa Kredit
echo $data[5]; //Jenis Paket SMS (1=SMS Gratis, 0=SMS Reguler/SMS Center/SMS Masking




    $this->session->set_flashdata('message', 'Create Record Success');
    redirect(site_url('isisms'));
}
}

public function update($id) 
{
    $row = $this->Isisms_model->get_by_id($id);

    if ($row) {
        $data = array(
            'button' => 'Update',
            'action' => site_url('isisms/update_action'),
            'id' => set_value('id', $row->id),
            'tanggal' => set_value('tanggal', $row->tanggal),
            'nama' => set_value('nama', $row->nama),
            'tentang' => set_value('tentang', $row->tentang),
            'isi' => set_value('isi', $row->isi),
            'idAdmin' => set_value('idAdmin', $row->idAdmin),
            );
        $this->template->load('template','isisms/isisms_form', $data);
    } else {
        $this->session->set_flashdata('message', 'Record Not Found');
        redirect(site_url('isisms'));
    }
}

public function update_action() 
{
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
        $this->update($this->input->post('id', TRUE));
    } else {
        $data = array(
          'tanggal' => $this->input->post('tanggal',TRUE),
          'nama' => $this->input->post('nama',TRUE),
          'tentang' => $this->input->post('tentang',TRUE),
          'isi' => $this->input->post('isi',TRUE),
          'idAdmin' => $this->input->post('idAdmin',TRUE),
          );

        $this->Isisms_model->update($this->input->post('id', TRUE), $data);
        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('isisms'));
    }
}

public function delete($id) 
{
    $row = $this->Isisms_model->get_by_id($id);

    if ($row) {
        $this->Isisms_model->delete($id);
        $this->session->set_flashdata('message', 'Delete Record Success');
        redirect(site_url('isisms'));
    } else {
        $this->session->set_flashdata('message', 'Record Not Found');
        redirect(site_url('isisms'));
    }
}

public function _rules() 
{
	// $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('tentang', 'tentang', 'trim|required');
	$this->form_validation->set_rules('isi', 'isi', 'trim|required');
	// $this->form_validation->set_rules('idAdmin', 'idadmin', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
}

}

/* End of file Isisms.php */
/* Location: ./application/controllers/Isisms.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-03-09 05:22:38 */
/* http://harviacode.com */
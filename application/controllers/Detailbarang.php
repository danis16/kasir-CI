<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detailbarang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Detailbarang_model');
        $this->load->library('form_validation');
    }    
    function data() {
        $table = 'view_detailbarang';
        $primaryKey = 'id';
        $no=1;
        $columns = array(
           array('db' => 'id', 'dt' => 0),
           array('db' => 'barang', 'dt' => 1),
           array('db' => 'merek', 'dt' => 2),
           array('db' => 'warna', 'dt' => 3),
           array('db' => 'size', 'dt' => 4),
           array('db' => 'hargaEcer', 'dt' => 5),
           array('db' => 'stokAwal', 'dt' => 6),
           array('db' => 'idCabang', 'dt' => 7),
           array('db' => 'kodeBarang', 'dt' => 8),
           array(
            'db' => 'id',
            'dt' => 9,
            'formatter' => function( $d, $row ) {
            // return anchor('Detailbarang/read/'.$d,'<i class="fa fa-eye"></i>',"class='btn btn-sm btn-danger'").' '.
                   // anchor('Detailbarang/update/'.$d,'<i class="fa fa-edit"></i>',"class='btn btn-sm btn-danger'").' '.
                   // anchor('Detailbarang/delete/'.$d,'<i class="fa fa-trash"></i>',"class='btn btn-sm btn-danger'");
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
        $detailbarang = $this->Detailbarang_model->get_all();

        $data = array(
            'detailbarang_data' => $detailbarang
            );

        $this->template->load('template','detailbarang/detailbarang_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Detailbarang_model->get_by_id($id);
        if ($row) {
            $data = array(
              'id' => $row->id,
              'idBarang' => $row->idBarang,
              'idWarna' => $row->idWarna,
              'idUkuran' => $row->idUkuran,
              'hargaEcer' => $row->hargaEcer,
              'stokAwal' => $row->stokAwal,
              'idCabang' => $row->idCabang,
              'kodeBarang' => $row->kodeBarang,
              );
            $this->load->view('detailbarang/detailbarang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailbarang'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('detailbarang/create_action'),
            'id' => set_value('id'),
            'idBarang' => set_value('idBarang'),
            'idWarna' => set_value('idWarna'),
            'idUkuran' => set_value('idUkuran'),
            'hargaEcer' => set_value('hargaEcer'),
            'stokAwal' => set_value('stokAwal'),
            'idCabang' => set_value('idCabang'),
            'kodeBarang' => set_value('kodeBarang'),
            );
        $this->template->load('template','detailbarang/detailbarang_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
              'idBarang' => $this->input->post('idBarang',TRUE),
              'idWarna' => $this->input->post('idWarna',TRUE),
              'idUkuran' => $this->input->post('idUkuran',TRUE),
              'hargaEcer' => $this->input->post('hargaEcer',TRUE),
              'stokAwal' => $this->input->post('stokAwal',TRUE),
              'idCabang' => $this->input->post('idCabang',TRUE),
              'kodeBarang' => $this->input->post('kodeBarang',TRUE),
              );

            $this->Detailbarang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('detailbarang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Detailbarang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('detailbarang/update_action'),
                'id' => set_value('id', $row->id),
                'idBarang' => set_value('idBarang', $row->idBarang),
                'idWarna' => set_value('idWarna', $row->idWarna),
                'idUkuran' => set_value('idUkuran', $row->idUkuran),
                'hargaEcer' => set_value('hargaEcer', $row->hargaEcer),
                'stokAwal' => set_value('stokAwal', $row->stokAwal),
                'idCabang' => set_value('idCabang', $row->idCabang),
                'kodeBarang' => set_value('kodeBarang', $row->kodeBarang),
                );
            $this->template->load('template','detailbarang/detailbarang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailbarang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
              'idBarang' => $this->input->post('idBarang',TRUE),
              'idWarna' => $this->input->post('idWarna',TRUE),
              'idUkuran' => $this->input->post('idUkuran',TRUE),
              'hargaEcer' => $this->input->post('hargaEcer',TRUE),
              'stokAwal' => $this->input->post('stokAwal',TRUE),
              'idCabang' => $this->input->post('idCabang',TRUE),
              'kodeBarang' => $this->input->post('kodeBarang',TRUE),
              );

            $this->Detailbarang_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('detailbarang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Detailbarang_model->get_by_id($id);

        if ($row) {
            $this->Detailbarang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('detailbarang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailbarang'));
        }
    }

    public function _rules() 
    {
       $this->form_validation->set_rules('idBarang', 'idbarang', 'trim|required');
       $this->form_validation->set_rules('idWarna', 'idwarna', 'trim|required');
       $this->form_validation->set_rules('idUkuran', 'idukuran', 'trim|required');
       $this->form_validation->set_rules('hargaEcer', 'hargaecer', 'trim|required');
       $this->form_validation->set_rules('stokAwal', 'stokawal', 'trim|required');
       $this->form_validation->set_rules('idCabang', 'idcabang', 'trim|required');
       $this->form_validation->set_rules('kodeBarang', 'kodebarang', 'trim|required');

       $this->form_validation->set_rules('id', 'id', 'trim');
       $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
   }

   public function CETAK()
   {

    $this->load->library('pdf');

    $data['detailbarang'] = $this->db->query('SELECT db.id, jb.barang, size, warna, hargaEcer, stokAwal, idCabang, kodeBarang  
        FROM detailbarang db, barang b, size s, warna w, jenisbarang jb 
        WHERE b.id=db.idBarang AND db.idWarna=w.id AND db.idUkuran=s.id and stokAwal > 0 and jb.id=b.barang ')->result();

    $this->load->view('detailbarang/detailbarang_read',$data);


}

}

/* End of file Detailbarang.php */
/* Location: ./application/controllers/Detailbarang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-25 07:25:04 */
/* http://harviacode.com */
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Barangrusak extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Barangrusak_model');
        $this->load->library('form_validation');
    }    
function data() {
        $table = 'view_barangrusak';
        $primaryKey = 'id';
        $columns = array(
         array('db' => 'id', 'dt' => 0),array('db' => 'id', 'dt' => 0),
array('db' => 'tanggal', 'dt' => 1,
  'formatter' => function( $d, $row ) {
            return date( 'l, j F Y', strtotime($d));
        }



    ),
array('db' => 'kodeBarang', 'dt' => 2),
array('db' => 'jumlah', 'dt' => 3),
array('db' => 'keterangan', 'dt' => 4),
array('db' => 'penyebab', 'dt' => 5),
array('db' => 'noNota', 'dt' => 6),
array(
                'db' => 'id',
                'dt' => 7,
                'formatter' => function( $d, $row ) {
            return 
            // anchor('Barangrusak/read/'.$d,'<i class="fa fa-eye"></i>',"class='btn btn-sm btn-danger'").' '.
            //        anchor('Barangrusak/update/'.$d,'<i class="fa fa-edit"></i>',"class='btn btn-sm btn-danger'").' '.
                   anchor('Barangrusak/delete/'.$d,'<i class="fa fa-trash"></i>',"class='btn btn-sm btn-danger'");
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
        $barangrusak = $this->Barangrusak_model->get_all();

        $data = array(
            'barangrusak_data' => $barangrusak
        );

        $this->template->load('template','barangrusak/barangrusak_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Barangrusak_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'tanggal' => $row->tanggal,
		'idDetailBarang' => $row->idDetailBarang,
		'jumlah' => $row->jumlah,
		'keterangan' => $row->keterangan,
		'penyebab' => $row->penyebab,
	    );
            $this->load->view('barangrusak/barangrusak_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barangrusak'));
        }
    }

    public function create() 
    {

        if (empty($_GET['nota_barang'])) {
            $nota="";
        }
        else {
            $nota=$_GET['nota_barang'];
        }
        $data = array(
            'button' => 'Create',
            'action' => site_url('barangrusak/create_action'),
	    'id' => set_value('id'),
	    'tanggal' => set_value('tanggal'),
	    'idDetailBarang' => set_value('idDetailBarang'),
	    'jumlah' => set_value('jumlah'),
	    'keterangan' => set_value('keterangan'),
	    'penyebab' => set_value('penyebab'),
	);
        $data['notatampil']=$nota;
        $data['kode']=$this->db->query('
SELECT * FROM pembelian p, detailpembelian dp, detailbarang db WHERE p.id=dp.idPembelian AND db.id=dp.idBarang AND nonota="'.$nota.'" and stokAwal > 0')->result();
        $data['nota'] = $this->db->query('SELECT p.noNota as nota FROM pembelian p, detailpembelian dp WHERE p.id=dp.idPembelian GROUP BY nonota')->result();
        $this->template->load('template','barangrusak/barangrusak_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $kode=$this->db->get_where('detailbarang',array('kodeBarang'=>$this->input->post('idDetailBarang',TRUE)))->row_array();
            $pembelian=$this->db->get_where('pembelian',array('noNota'=>$this->input->post('nota',TRUE)))->row_array();
            $idDetailPembelian = $this->db->get_where('detailpembelian',array('idPembelian'=>$pembelian['id'],'idBarang'=>$kode['id']))->row_array();
      
            $data = array(
		'tanggal' => date('Y-m-d'),
		'idDetailBarang' => $kode['id'],
		'jumlah' => $this->input->post('jumlah',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
        'penyebab' => $this->input->post('penyebab',TRUE),
		'idDetailPembelian' => $idDetailPembelian['id'],
	    );
// print_r($data);
// die;
            $this->Barangrusak_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('barangrusak'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Barangrusak_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('barangrusak/update_action'),
		'id' => set_value('id', $row->id),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'idDetailBarang' => set_value('idDetailBarang', $row->idDetailBarang),
		'jumlah' => set_value('jumlah', $row->jumlah),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'penyebab' => set_value('penyebab', $row->penyebab),
	    );
            $this->template->load('template','barangrusak/barangrusak_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barangrusak'));
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
		'idDetailBarang' => $this->input->post('idDetailBarang',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'penyebab' => $this->input->post('penyebab',TRUE),
	    );

            $this->Barangrusak_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('barangrusak'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Barangrusak_model->get_by_id($id);

        if ($row) {
            $this->Barangrusak_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('barangrusak'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barangrusak'));
        }
    }

    public function _rules() 
    {
	// $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	// $this->form_validation->set_rules('idDetailBarang', 'iddetailbarang', 'trim|required');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
	$this->form_validation->set_rules('kodeBarang', 'kodeBarang', 'trim|required');
	$this->form_validation->set_rules('penyebab', 'penyebab', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Barangrusak.php */
/* Location: ./application/controllers/Barangrusak.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-03-01 11:40:02 */
/* http://harviacode.com */
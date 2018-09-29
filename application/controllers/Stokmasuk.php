<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Stokmasuk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Stokmasuk_model');
        $this->load->library('form_validation');
    }    
function data() {
        $table = 'view_updatestok';
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
array('db' => 'username', 'dt' => 5),
array('db' => 'status', 'dt' => 6),
array(
                'db' => 'id',
                'dt' => 7,
                'formatter' => function( $d, $row ) {
            // return anchor('Stokmasuk/read/'.$d,'<i class="fa fa-eye"></i>',"class='btn btn-sm btn-danger'").' '.
                   // anchor('Stokmasuk/update/'.$d,'<i class="fa fa-edit"></i>',"class='btn btn-sm btn-danger'").' '.
                   // anchor('Stokmasuk/delete/'.$d,'<i class="fa fa-trash"></i>',"class='btn btn-sm btn-danger'");
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
        $stokmasuk = $this->Stokmasuk_model->get_all();

        $data = array(
            'stokmasuk_data' => $stokmasuk
        );

        $this->template->load('template','stokmasuk/stokmasuk_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Stokmasuk_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'tanggal' => $row->tanggal,
		'idDetalBarang' => $row->idDetalBarang,
		'jumlah' => $row->jumlah,
		'keterangan' => $row->keterangan,
		'idAdmin' => $row->idAdmin,
		'status' => $row->status,
	    );
            $this->load->view('stokmasuk/stokmasuk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('stokmasuk'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('stokmasuk/create_action'),
            // 'action_keluar' => site_url('stokmasuk/create_action_keluar'),
	    'id' => set_value('id'),
	    'tanggal' => set_value('tanggal'),
	    'idDetalBarang' => set_value('idDetalBarang'),
	    'jumlah' => set_value('jumlah'),
	    'keterangan' => set_value('keterangan'),
	    'idAdmin' => set_value('idAdmin'),
	    'status' => set_value('status'),
	);
        $data['barang']=$this->db->get_where('detailbarang',array('idCabang'=>$this->session->userdata('idCabang')))->result();
        $this->template->load('template','stokmasuk/stokmasuk_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $admin=$this->db->get_where('admin',array('username'=>$this->session->userdata('username')))->row_array();
            $detailbarang = $this->db->get_where('detailbarang',array('kodeBarang'=>$this->input->post('idDetalBarang',TRUE)))->row_array();
            $data = array(
        'tanggal' => date('Y-m-d'),
        'idDetalBarang' => $detailbarang['id'],
        'jumlah' => $this->input->post('jumlah',TRUE),
        'keterangan' => $this->input->post('keterangan',TRUE),
        'idAdmin' => $admin['id'],
        'status' => $this->input->post('status',TRUE),
        );

            $this->Stokmasuk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('stokmasuk'));
        }
    }

  //   public function create_action_keluar() 
  //   {
  //       $this->_rules();

  //       if ($this->form_validation->run() == FALSE) {
  //           $this->create();
  //       } else {
  //           $admin=$this->db->get_where('admin',array('username'=>$this->session->userdata('username')))->row_array();
  //           $detailbarang = $this->db->get_where('detailbarang',array('kodeBarang'=>$this->input->post('idDetalBarang',TRUE)))->row_array();
  //           $data = array(
		// 'tanggal' => date('Y-m-d'),
		// 'idDetalBarang' => $detailbarang['id'],
		// 'jumlah' => $this->input->post('jumlah',TRUE),
		// 'keterangan' => $this->input->post('keterangan',TRUE),
		// 'idAdmin' => $admin['id'],
		// 'status' => 'KELUAR',
	 //    );

  //           $this->Stokmasuk_model->insert($data);
  //           $this->session->set_flashdata('message', 'Create Record Success');
  //           redirect(site_url('stokmasuk'));
  //       }
  //   }
    
    public function update($id) 
    {
        $row = $this->Stokmasuk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('stokmasuk/update_action'),
		'id' => set_value('id', $row->id),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'idDetalBarang' => set_value('idDetalBarang', $row->idDetalBarang),
		'jumlah' => set_value('jumlah', $row->jumlah),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'idAdmin' => set_value('idAdmin', $row->idAdmin),
		'status' => set_value('status', $row->status),
	    );
            $this->template->load('template','stokmasuk/stokmasuk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('stokmasuk'));
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
		'idDetalBarang' => $this->input->post('idDetalBarang',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'idAdmin' => $this->input->post('idAdmin',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Stokmasuk_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('stokmasuk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Stokmasuk_model->get_by_id($id);

        if ($row) {
            $this->Stokmasuk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('stokmasuk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('stokmasuk'));
        }
    }

    public function _rules() 
    {
	// $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('idDetalBarang', 'iddetalbarang', 'trim|required');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	// $this->form_validation->set_rules('idAdmin', 'idadmin', 'trim|required');
	// $this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Stokmasuk.php */
/* Location: ./application/controllers/Stokmasuk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-24 15:43:30 */
/* http://harviacode.com */
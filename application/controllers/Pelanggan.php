<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pelanggan_model');
        $this->load->library('form_validation');
    }    
function data() {
        $table = 'view_pelanggan';
        $primaryKey = 'id';
        $columns = array(
         array('db' => 'id', 'dt' => 0),array('db' => 'id', 'dt' => 0),
array('db' => 'nama', 'dt' => 1),
array('db' => 'tanggaldaftar', 'dt' => 2,
  'formatter' => function( $d, $row ) {
            return date( 'l, j F Y', strtotime($d));
        }



    ),
array('db' => 'alamat', 'dt' => 3),
array('db' => 'keterangan', 'dt' => 4),
array('db' => 'noHP', 'dt' => 5),
array(
                'db' => 'id',
                'dt' => 6,
                'formatter' => function( $d, $row ) {
            return 
            // anchor('Pelanggan/read/'.$d,'<i class="fa fa-eye"></i>',"class='btn btn-sm btn-danger'").' '.
                   anchor('Pelanggan/update/'.$d,'<i class="fa fa-edit"></i>',"class='btn btn-sm btn-danger'");
                   // .' '.
                   // anchor('Pelanggan/delete/'.$d,'<i class="fa fa-trash"></i>',"class='btn btn-sm btn-danger'");
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
        $pelanggan = $this->Pelanggan_model->get_all();

        $data = array(
            'pelanggan_data' => $pelanggan
        );

        $this->template->load('template','pelanggan/pelanggan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Pelanggan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama' => $row->nama,
		'tanggaldaftar' => $row->tanggaldaftar,
		'alamat' => $row->alamat,
		'keterangan' => $row->keterangan,
		'noHP' => $row->noHP,
	    );
            $this->load->view('pelanggan/pelanggan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pelanggan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pelanggan/create_action'),
	    'id' => set_value('id'),
	    'nama' => set_value('nama'),
	    // 'tanggaldaftar' => set_value('tanggaldaftar'),
	    'alamat' => set_value('alamat'),
	    'keterangan' => set_value('keterangan'),
	    'noHP' => set_value('noHP'),
	);
        $this->template->load('template','pelanggan/pelanggan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'tanggaldaftar' => date('Y-m-d'),
		'alamat' => $this->input->post('alamat',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
        'noHP' => $this->input->post('noHP',TRUE),
		'status' => 'pelanggan',
	    );

            $this->Pelanggan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pelanggan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pelanggan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pelanggan/update_action'),
		'id' => set_value('id', $row->id),
		'nama' => set_value('nama', $row->nama),
		'tanggaldaftar' => set_value('tanggaldaftar', $row->tanggaldaftar),
		'alamat' => set_value('alamat', $row->alamat),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'noHP' => set_value('noHP', $row->noHP),
	    );
            $this->template->load('template','pelanggan/pelanggan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pelanggan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'tanggaldaftar' => $this->input->post('tanggaldaftar',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'noHP' => $this->input->post('noHP',TRUE),
	    );

            $this->Pelanggan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pelanggan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pelanggan_model->get_by_id($id);

        if ($row) {
            $this->Pelanggan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pelanggan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pelanggan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	// $this->form_validation->set_rules('tanggaldaftar', 'tanggaldaftar', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	// $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('noHP', 'nohp', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pelanggan.php */
/* Location: ./application/controllers/Pelanggan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-07 12:47:07 */
/* http://harviacode.com */
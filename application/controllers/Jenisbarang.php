<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenisbarang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jenisbarang_model');
        $this->load->library('form_validation');
    }    
function data() {
        $table = 'view_jenisbarang';
        $primaryKey = 'id';
        $columns = array(
         array('db' => 'id', 'dt' => 0),array('db' => 'id', 'dt' => 0),
array('db' => 'Barang', 'dt' => 1),
array('db' => 'Kode', 'dt' => 2),
array('db' => 'idKategori', 'dt' => 3),
array(
                'db' => 'id',
                'dt' => 4,
                'formatter' => function( $d, $row ) {
            return 
            // anchor('Jenisbarang/read/'.$d,'<i class="fa fa-eye"></i>',"class='btn btn-sm btn-danger'").' '.
                   anchor('Jenisbarang/update/'.$d,'<i class="fa fa-edit"></i>',"class='btn btn-sm btn-danger'");
                   // .' '.
                   // anchor('Jenisbarang/delete/'.$d,'<i class="fa fa-trash"></i>',"class='btn btn-sm btn-danger'");
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
        $jenisbarang = $this->Jenisbarang_model->get_all();

        $data = array(
            'jenisbarang_data' => $jenisbarang
        );

        $this->template->load('template','jenisbarang/jenisbarang_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Jenisbarang_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'Barang' => $row->Barang,
		'Kode' => $row->Kode,
		'idKategori' => $row->idKategori,
	    );
            $this->load->view('jenisbarang/jenisbarang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenisbarang'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenisbarang/create_action'),
	    'id' => set_value('id'),
	    'Barang' => set_value('Barang'),
	    'Kode' => set_value('Kode'),
	    'idKategori' => set_value('idKategori'),
    );
        $data['kategori']=$this->db->get('kategori')->result();
        $this->template->load('template','jenisbarang/jenisbarang_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $kategori=$this->db->get_where('kategori',array('kategori'=>$this->input->post('idKategori',TRUE)))->row_array();
            $data = array(
		'Barang' => $this->input->post('Barang',TRUE),
		'Kode' => $this->input->post('Kode',TRUE),
		'idKategori' =>$kategori['id'],
	    );

            $this->Jenisbarang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenisbarang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jenisbarang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenisbarang/update_action'),
		'id' => set_value('id', $row->id),
		'Barang' => set_value('Barang', $row->Barang),
		'Kode' => set_value('Kode', $row->Kode),
		'idKategori' => set_value('idKategori', $row->idKategori),
	    );
            $this->template->load('template','jenisbarang/jenisbarang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenisbarang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'Barang' => $this->input->post('Barang',TRUE),
		'Kode' => $this->input->post('Kode',TRUE),
		'idKategori' => $this->input->post('idKategori',TRUE),
	    );

            $this->Jenisbarang_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenisbarang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenisbarang_model->get_by_id($id);

        if ($row) {
            $this->Jenisbarang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenisbarang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenisbarang'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Barang', 'barang', 'trim|required|is_unique[jenisbarang.Barang]');
	$this->form_validation->set_rules('Kode', 'kode', 'trim|required|is_unique[jenisbarang.Kode]');
	$this->form_validation->set_rules('idKategori', 'idkategori', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jenisbarang.php */
/* Location: ./application/controllers/Jenisbarang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-03-21 01:15:16 */
/* http://harviacode.com */
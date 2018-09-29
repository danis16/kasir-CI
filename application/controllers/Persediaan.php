<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Persediaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Persediaan_model');
        $this->load->library('form_validation');
    }    
function data() {
        $table = 'persediaan';
        $primaryKey = 'id';
        $columns = array(
         array('db' => 'id', 'dt' => 0),array('db' => 'id', 'dt' => 0),
array('db' => 'idBarang', 'dt' => 1),
array('db' => 'stok', 'dt' => 2),
array(
                'db' => 'id',
                'dt' => 3,
                'formatter' => function( $d, $row ) {
            return anchor('Persediaan/read/'.$d,'<i class="fa fa-eye"></i>',"class='btn btn-sm btn-danger'").' '.
                   anchor('Persediaan/update/'.$d,'<i class="fa fa-edit"></i>',"class='btn btn-sm btn-danger'").' '.
                   anchor('Persediaan/delete/'.$d,'<i class="fa fa-trash"></i>',"class='btn btn-sm btn-danger'");
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
        $persediaan = $this->Persediaan_model->get_all();

        $data = array(
            'persediaan_data' => $persediaan
        );

        $this->template->load('template','persediaan/persediaan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Persediaan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'idBarang' => $row->idBarang,
		'stok' => $row->stok,
	    );
            $this->load->view('persediaan/persediaan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('persediaan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('persediaan/create_action'),
	    'id' => set_value('id'),
	    'idBarang' => set_value('idBarang'),
	    'stok' => set_value('stok'),
	);
        $this->template->load('template','persediaan/persediaan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idBarang' => $this->input->post('idBarang',TRUE),
		'stok' => $this->input->post('stok',TRUE),
	    );

            $this->Persediaan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('persediaan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Persediaan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('persediaan/update_action'),
		'id' => set_value('id', $row->id),
		'idBarang' => set_value('idBarang', $row->idBarang),
		'stok' => set_value('stok', $row->stok),
	    );
            $this->template->load('template','persediaan/persediaan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('persediaan'));
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
		'stok' => $this->input->post('stok',TRUE),
	    );

            $this->Persediaan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('persediaan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Persediaan_model->get_by_id($id);

        if ($row) {
            $this->Persediaan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('persediaan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('persediaan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idBarang', 'idbarang', 'trim|required');
	$this->form_validation->set_rules('stok', 'stok', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Persediaan.php */
/* Location: ./application/controllers/Persediaan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-11 14:32:13 */
/* http://harviacode.com */
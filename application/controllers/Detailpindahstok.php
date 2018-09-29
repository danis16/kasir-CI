<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detailpindahstok extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Detailpindahstok_model');
        $this->load->library('form_validation');
    }    
function data() {
        $table = 'detailpindahstok';
        $primaryKey = 'id';
        $columns = array(
         array('db' => 'id', 'dt' => 0),array('db' => 'id', 'dt' => 0),
array('db' => 'idPindahStok', 'dt' => 1),
array('db' => 'idDetailBarang', 'dt' => 2),
array('db' => 'jumlah', 'dt' => 3),
array(
                'db' => 'id',
                'dt' => 4,
                'formatter' => function( $d, $row ) {
            return anchor('Detailpindahstok/read/'.$d,'<i class="fa fa-eye"></i>',"class='btn btn-sm btn-danger'").' '.
                   anchor('Detailpindahstok/update/'.$d,'<i class="fa fa-edit"></i>',"class='btn btn-sm btn-danger'").' '.
                   anchor('Detailpindahstok/delete/'.$d,'<i class="fa fa-trash"></i>',"class='btn btn-sm btn-danger'");
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
        $detailpindahstok = $this->Detailpindahstok_model->get_all();

        $data = array(
            'detailpindahstok_data' => $detailpindahstok
        );

        $this->template->load('template','detailpindahstok/detailpindahstok_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Detailpindahstok_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'idPindahStok' => $row->idPindahStok,
		'idDetailBarang' => $row->idDetailBarang,
		'jumlah' => $row->jumlah,
	    );
            $this->load->view('detailpindahstok/detailpindahstok_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailpindahstok'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('detailpindahstok/create_action'),
	    'id' => set_value('id'),
	    'idPindahStok' => set_value('idPindahStok'),
	    'idDetailBarang' => set_value('idDetailBarang'),
	    'jumlah' => set_value('jumlah'),
	);
        $this->template->load('template','detailpindahstok/detailpindahstok_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idPindahStok' => $this->input->post('idPindahStok',TRUE),
		'idDetailBarang' => $this->input->post('idDetailBarang',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
	    );

            $this->Detailpindahstok_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('detailpindahstok'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Detailpindahstok_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('detailpindahstok/update_action'),
		'id' => set_value('id', $row->id),
		'idPindahStok' => set_value('idPindahStok', $row->idPindahStok),
		'idDetailBarang' => set_value('idDetailBarang', $row->idDetailBarang),
		'jumlah' => set_value('jumlah', $row->jumlah),
	    );
            $this->template->load('template','detailpindahstok/detailpindahstok_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailpindahstok'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'idPindahStok' => $this->input->post('idPindahStok',TRUE),
		'idDetailBarang' => $this->input->post('idDetailBarang',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
	    );

            $this->Detailpindahstok_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('detailpindahstok'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Detailpindahstok_model->get_by_id($id);

        if ($row) {
            $this->Detailpindahstok_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('detailpindahstok'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailpindahstok'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idPindahStok', 'idpindahstok', 'trim|required');
	$this->form_validation->set_rules('idDetailBarang', 'iddetailbarang', 'trim|required');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }


    public function cetak_pdf()
    {
        
    }

}

/* End of file Detailpindahstok.php */
/* Location: ./application/controllers/Detailpindahstok.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-12-07 14:38:13 */
/* http://harviacode.com */
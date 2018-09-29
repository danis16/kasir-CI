<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detailpiutang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Detailpiutang_model');
        $this->load->library('form_validation');
    }    
function data() {
        $table = 'detailpiutang';
        $primaryKey = 'id';
        $columns = array(
         array('db' => 'id', 'dt' => 0),array('db' => 'id', 'dt' => 0),
array('db' => 'idPiutang', 'dt' => 1),
array('db' => 'idAdmin', 'dt' => 2),
array('db' => 'date', 'dt' => 3),
array('db' => 'jumlah', 'dt' => 4),
array(
                'db' => 'id',
                'dt' => 5,
                'formatter' => function( $d, $row ) {
            return anchor('Detailpiutang/read/'.$d,'<i class="fa fa-eye"></i>',"class='btn btn-sm btn-danger'").' '.
                   anchor('Detailpiutang/update/'.$d,'<i class="fa fa-edit"></i>',"class='btn btn-sm btn-danger'").' '.
                   anchor('Detailpiutang/delete/'.$d,'<i class="fa fa-trash"></i>',"class='btn btn-sm btn-danger'");
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
        $detailpiutang = $this->Detailpiutang_model->get_all();

        $data = array(
            'detailpiutang_data' => $detailpiutang
        );

        $this->template->load('template','detailpiutang/detailpiutang_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Detailpiutang_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'idPiutang' => $row->idPiutang,
		'idAdmin' => $row->idAdmin,
		'date' => $row->date,
		'jumlah' => $row->jumlah,
	    );
            $this->load->view('detailpiutang/detailpiutang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailpiutang'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('detailpiutang/create_action'),
	    'id' => set_value('id'),
	    'idPiutang' => set_value('idPiutang'),
	    'idAdmin' => set_value('idAdmin'),
	    'date' => set_value('date'),
	    'jumlah' => set_value('jumlah'),
	);
        $this->template->load('template','detailpiutang/detailpiutang_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idPiutang' => $this->input->post('idPiutang',TRUE),
		'idAdmin' => $this->input->post('idAdmin',TRUE),
		'date' => $this->input->post('date',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
	    );

            $this->Detailpiutang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('detailpiutang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Detailpiutang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('detailpiutang/update_action'),
		'id' => set_value('id', $row->id),
		'idPiutang' => set_value('idPiutang', $row->idPiutang),
		'idAdmin' => set_value('idAdmin', $row->idAdmin),
		'date' => set_value('date', $row->date),
		'jumlah' => set_value('jumlah', $row->jumlah),
	    );
            $this->template->load('template','detailpiutang/detailpiutang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailpiutang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'idPiutang' => $this->input->post('idPiutang',TRUE),
		'idAdmin' => $this->input->post('idAdmin',TRUE),
		'date' => $this->input->post('date',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
	    );

            $this->Detailpiutang_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('detailpiutang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Detailpiutang_model->get_by_id($id);

        if ($row) {
            $this->Detailpiutang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('detailpiutang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailpiutang'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idPiutang', 'idpiutang', 'trim|required');
	$this->form_validation->set_rules('idAdmin', 'idadmin', 'trim|required');
	$this->form_validation->set_rules('date', 'date', 'trim|required');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Detailpiutang.php */
/* Location: ./application/controllers/Detailpiutang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-21 15:40:03 */
/* http://harviacode.com */
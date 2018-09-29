<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detailhutang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Detailhutang_model');
        $this->load->library('form_validation');
    }    
function data() {
        $table = 'detailhutang';
        $primaryKey = 'id';
        $columns = array(
         array('db' => 'id', 'dt' => 0),array('db' => 'id', 'dt' => 0),
array('db' => 'idHutang', 'dt' => 1),
array('db' => 'tanggal', 'dt' => 2),
array('db' => 'bayar', 'dt' => 3),
array(
                'db' => 'id',
                'dt' => 4,
                'formatter' => function( $d, $row ) {
            return anchor('Detailhutang/read/'.$d,'<i class="fa fa-eye"></i>',"class='btn btn-sm btn-danger'").' '.
                   anchor('Detailhutang/update/'.$d,'<i class="fa fa-edit"></i>',"class='btn btn-sm btn-danger'").' '.
                   anchor('Detailhutang/delete/'.$d,'<i class="fa fa-trash"></i>',"class='btn btn-sm btn-danger'");
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
        $detailhutang = $this->Detailhutang_model->get_all();

        $data = array(
            'detailhutang_data' => $detailhutang
        );

        $this->template->load('template','detailhutang/detailhutang_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Detailhutang_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'idHutang' => $row->idHutang,
		'tanggal' => $row->tanggal,
		'bayar' => $row->bayar,
	    );
            $this->load->view('detailhutang/detailhutang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailhutang'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('detailhutang/create_action'),
	    'id' => set_value('id'),
	    'idHutang' => set_value('idHutang'),
	    'tanggal' => set_value('tanggal'),
	    'bayar' => set_value('bayar'),
	);
        $this->template->load('template','detailhutang/detailhutang_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idHutang' => $this->input->post('idHutang',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'bayar' => $this->input->post('bayar',TRUE),
	    );

            $this->Detailhutang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('detailhutang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Detailhutang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('detailhutang/update_action'),
		'id' => set_value('id', $row->id),
		'idHutang' => set_value('idHutang', $row->idHutang),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'bayar' => set_value('bayar', $row->bayar),
	    );
            $this->template->load('template','detailhutang/detailhutang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailhutang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'idHutang' => $this->input->post('idHutang',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'bayar' => $this->input->post('bayar',TRUE),
	    );

            $this->Detailhutang_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('detailhutang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Detailhutang_model->get_by_id($id);

        if ($row) {
            $this->Detailhutang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('detailhutang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailhutang'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idHutang', 'idhutang', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('bayar', 'bayar', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Detailhutang.php */
/* Location: ./application/controllers/Detailhutang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-19 15:33:14 */
/* http://harviacode.com */
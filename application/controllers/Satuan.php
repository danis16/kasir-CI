<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Satuan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Satuan_model');
        $this->load->library('form_validation');
    }    
function data() {
        $table = 'satuan';
        $primaryKey = 'id';
        $columns = array(
         array('db' => 'id', 'dt' => 0),array('db' => 'id', 'dt' => 0),
array('db' => 'satuan', 'dt' => 1),
array('db' => 'jumlah', 'dt' => 2),
array(
                'db' => 'id',
                'dt' => 3,
                'formatter' => function( $d, $row ) {
            return anchor('Satuan/read/'.$d,'<i class="fa fa-eye"></i>',"class='btn btn-sm btn-danger'").' '.
                   anchor('Satuan/update/'.$d,'<i class="fa fa-edit"></i>',"class='btn btn-sm btn-danger'").' '.
                   anchor('Satuan/delete/'.$d,'<i class="fa fa-trash"></i>',"class='btn btn-sm btn-danger'");
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
        $satuan = $this->Satuan_model->get_all();

        $data = array(
            'satuan_data' => $satuan
        );

        $this->template->load('template','satuan/satuan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Satuan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'satuan' => $row->satuan,
		'jumlah' => $row->jumlah,
	    );
            $this->load->view('satuan/satuan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('satuan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('satuan/create_action'),
	    'id' => set_value('id'),
	    'satuan' => set_value('satuan'),
	    'jumlah' => set_value('jumlah'),
	);
        $this->template->load('template','satuan/satuan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'satuan' => $this->input->post('satuan',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
	    );

            $this->Satuan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('satuan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Satuan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('satuan/update_action'),
		'id' => set_value('id', $row->id),
		'satuan' => set_value('satuan', $row->satuan),
		'jumlah' => set_value('jumlah', $row->jumlah),
	    );
            $this->template->load('template','satuan/satuan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('satuan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'satuan' => $this->input->post('satuan',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
	    );

            $this->Satuan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('satuan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Satuan_model->get_by_id($id);

        if ($row) {
            $this->Satuan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('satuan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('satuan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('satuan', 'satuan', 'trim|required|is_unique[satuan.satuan]');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Satuan.php */
/* Location: ./application/controllers/Satuan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-10 18:58:36 */
/* http://harviacode.com */
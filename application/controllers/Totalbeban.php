<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Totalbeban extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Totalbeban_model');
        $this->load->library('form_validation');
    }    
function data() {
        $table = 'view_totalbeban';
        $primaryKey = 'id';
        $columns = array(
         array('db' => 'id', 'dt' => 0),array('db' => 'id', 'dt' => 0),
array('db' => 'beban', 'dt' => 1),
array('db' => 'tanggal', 'dt' => 2,

  'formatter' => function( $d, $row ) {
            return date( 'l, j F Y', strtotime($d));
        }


    ),
array('db' => 'jumlah', 'dt' => 3,
 'formatter'=>function($d, $row){
                return 'Rp '.number_format($d,2,",",".");
            }
 

    ),
array('db' => 'nonota', 'dt' => 4),
array(
                'db' => 'id',
                'dt' => 5,
                'formatter' => function( $d, $row ) {
            return 
            // anchor('Totalbeban/read/'.$d,'<i class="fa fa-eye"></i>',"class='btn btn-sm btn-danger'").' '.
                   anchor('Totalbeban/update/'.$d,'<i class="fa fa-edit"></i>',"class='btn btn-sm btn-danger'");
                   // .' '.
                   // anchor('Totalbeban/delete/'.$d,'<i class="fa fa-trash"></i>',"class='btn btn-sm btn-danger'");
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
        $totalbeban = $this->Totalbeban_model->get_all();

        $data = array(
            'totalbeban_data' => $totalbeban
        );

        $this->template->load('template','totalbeban/totalbeban_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Totalbeban_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'idBeban' => $row->idBeban,
		'tanggal' => $row->tanggal,
		'jumlah' => $row->jumlah,
		'noNota' => $row->noNota,
	    );
            $this->load->view('totalbeban/totalbeban_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('totalbeban'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('totalbeban/create_action'),
        'id' => set_value('id'),
        'idBeban' => set_value('idBeban'),
        'tanggal' => set_value('tanggal'),
        'jumlah' => set_value('jumlah'),
        'noNota' => set_value('noNota'),
    );
        $data['beban']=$this->db->get('beban')->result();
        $this->template->load('template','totalbeban/totalbeban_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $beban=$this->db->get_where('beban',array('beban'=>$this->input->post('idBeban',TRUE)))->row_array();
            $data = array(
		'idBeban' => $beban['id'],
		'tanggal' => date('Y-m-d'),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'noNota' => $this->input->post('noNota',TRUE),
        'idAdmin'=>$this->session->userdata('id'),
	    );

            $this->Totalbeban_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('totalbeban'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Totalbeban_model->get_by_id($id);

        if ($row) {
            $beban = $this->db->get_where('beban',array('id'=>$row->idBeban))->row_array();
            $data = array(
                'button' => 'Update',
                'action' => site_url('totalbeban/update_action'),
		'id' => set_value('id', $row->id),
		'idBeban' => set_value('idBeban', $beban['beban']),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'jumlah' => set_value('jumlah', $row->jumlah),
		'noNota' => set_value('noNota', $row->noNota),
	    );
            $this->template->load('template','totalbeban/totalbeban_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('totalbeban'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $beban=$this->db->get_where('beban',array('beban'=>$this->input->post('idBeban',TRUE)))->row_array();
            $data = array(
		'idBeban' => $beban['id'],
		'tanggal' => $this->input->post('tanggal',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'noNota' => $this->input->post('noNota',TRUE),
	    );

            $this->Totalbeban_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('totalbeban'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Totalbeban_model->get_by_id($id);

        if ($row) {
            $this->Totalbeban_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('totalbeban'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('totalbeban'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idBeban', 'idbeban', 'trim|required');
	// $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
	$this->form_validation->set_rules('noNota', 'nonota', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Totalbeban.php */
/* Location: ./application/controllers/Totalbeban.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-03-01 12:11:17 */
/* http://harviacode.com */
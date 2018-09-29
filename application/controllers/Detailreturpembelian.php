<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detailreturpembelian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Detailreturpembelian_model');
        $this->load->library('form_validation');
    }    
function data() {
        $table = 'detailreturpembelian';
        $primaryKey = 'id';
        $columns = array(
         array('db' => 'id', 'dt' => 0),array('db' => 'id', 'dt' => 0),
array('db' => 'idReturpembelian', 'dt' => 1),
array('db' => 'idDetailBarang', 'dt' => 2),
array('db' => 'jumlah', 'dt' => 3),
array('db' => 'kondisi', 'dt' => 4),
array('db' => 'alasan', 'dt' => 5),
array(
                'db' => 'id',
                'dt' => 6,
                'formatter' => function( $d, $row ) {
            return anchor('Detailreturpembelian/read/'.$d,'<i class="fa fa-eye"></i>',"class='btn btn-sm btn-danger'").' '.
                   anchor('Detailreturpembelian/update/'.$d,'<i class="fa fa-edit"></i>',"class='btn btn-sm btn-danger'").' '.
                   anchor('Detailreturpembelian/delete/'.$d,'<i class="fa fa-trash"></i>',"class='btn btn-sm btn-danger'");
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
        $detailreturpembelian = $this->Detailreturpembelian_model->get_all();

        $data = array(
            'detailreturpembelian_data' => $detailreturpembelian
        );

        $this->template->load('template','detailreturpembelian/detailreturpembelian_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Detailreturpembelian_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'idReturpembelian' => $row->idReturpembelian,
		'idDetailBarang' => $row->idDetailBarang,
		'jumlah' => $row->jumlah,
		'kondisi' => $row->kondisi,
		'alasan' => $row->alasan,
	    );
            $this->load->view('detailreturpembelian/detailreturpembelian_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailreturpembelian'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('detailreturpembelian/create_action'),
	    'id' => set_value('id'),
	    'idReturpembelian' => set_value('idReturpembelian'),
	    'idDetailBarang' => set_value('idDetailBarang'),
	    'jumlah' => set_value('jumlah'),
	    'kondisi' => set_value('kondisi'),
	    'alasan' => set_value('alasan'),
	);
        $this->template->load('template','detailreturpembelian/detailreturpembelian_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idReturpembelian' => $this->input->post('idReturpembelian',TRUE),
		'idDetailBarang' => $this->input->post('idDetailBarang',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'kondisi' => $this->input->post('kondisi',TRUE),
		'alasan' => $this->input->post('alasan',TRUE),
	    );

            $this->Detailreturpembelian_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('detailreturpembelian'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Detailreturpembelian_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('detailreturpembelian/update_action'),
		'id' => set_value('id', $row->id),
		'idReturpembelian' => set_value('idReturpembelian', $row->idReturpembelian),
		'idDetailBarang' => set_value('idDetailBarang', $row->idDetailBarang),
		'jumlah' => set_value('jumlah', $row->jumlah),
		'kondisi' => set_value('kondisi', $row->kondisi),
		'alasan' => set_value('alasan', $row->alasan),
	    );
            $this->template->load('template','detailreturpembelian/detailreturpembelian_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailreturpembelian'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'idReturpembelian' => $this->input->post('idReturpembelian',TRUE),
		'idDetailBarang' => $this->input->post('idDetailBarang',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'kondisi' => $this->input->post('kondisi',TRUE),
		'alasan' => $this->input->post('alasan',TRUE),
	    );

            $this->Detailreturpembelian_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('detailreturpembelian'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Detailreturpembelian_model->get_by_id($id);

        if ($row) {
            $this->Detailreturpembelian_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('detailreturpembelian'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailreturpembelian'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idReturpembelian', 'idreturpembelian', 'trim|required');
	$this->form_validation->set_rules('idDetailBarang', 'iddetailbarang', 'trim|required');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
	$this->form_validation->set_rules('kondisi', 'kondisi', 'trim|required');
	$this->form_validation->set_rules('alasan', 'alasan', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Detailreturpembelian.php */
/* Location: ./application/controllers/Detailreturpembelian.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-16 05:23:15 */
/* http://harviacode.com */
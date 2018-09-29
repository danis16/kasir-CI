<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detailreturpenjualan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Detailreturpenjualan_model');
        $this->load->library('form_validation');
    }    
function data() {
        $table = 'detailreturpenjualan';
        $primaryKey = 'id';
        $columns = array(
         array('db' => 'id', 'dt' => 0),array('db' => 'id', 'dt' => 0),
array('db' => 'idRetur', 'dt' => 1),
array('db' => 'idDetailBarang', 'dt' => 2),
array('db' => 'jumlah', 'dt' => 3),
array('db' => 'kondisi', 'dt' => 4),
array('db' => 'alasan', 'dt' => 5),
array(
                'db' => 'id',
                'dt' => 6,
                'formatter' => function( $d, $row ) {
            return anchor('Detailreturpenjualan/read/'.$d,'<i class="fa fa-eye"></i>',"class='btn btn-sm btn-danger'").' '.
                   anchor('Detailreturpenjualan/update/'.$d,'<i class="fa fa-edit"></i>',"class='btn btn-sm btn-danger'").' '.
                   anchor('Detailreturpenjualan/delete/'.$d,'<i class="fa fa-trash"></i>',"class='btn btn-sm btn-danger'");
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
        $detailreturpenjualan = $this->Detailreturpenjualan_model->get_all();

        $data = array(
            'detailreturpenjualan_data' => $detailreturpenjualan
        );

        $this->template->load('template','detailreturpenjualan/detailreturpenjualan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Detailreturpenjualan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'idRetur' => $row->idRetur,
		'idDetailBarang' => $row->idDetailBarang,
		'jumlah' => $row->jumlah,
		'kondisi' => $row->kondisi,
		'alasan' => $row->alasan,
	    );
            $this->load->view('detailreturpenjualan/detailreturpenjualan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailreturpenjualan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('detailreturpenjualan/create_action'),
	    'id' => set_value('id'),
	    'idRetur' => set_value('idRetur'),
	    'idDetailBarang' => set_value('idDetailBarang'),
	    'jumlah' => set_value('jumlah'),
	    'kondisi' => set_value('kondisi'),
	    'alasan' => set_value('alasan'),
	);
        $this->template->load('template','detailreturpenjualan/detailreturpenjualan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idRetur' => $this->input->post('idRetur',TRUE),
		'idDetailBarang' => $this->input->post('idDetailBarang',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'kondisi' => $this->input->post('kondisi',TRUE),
		'alasan' => $this->input->post('alasan',TRUE),
	    );

            $this->Detailreturpenjualan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('detailreturpenjualan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Detailreturpenjualan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('detailreturpenjualan/update_action'),
		'id' => set_value('id', $row->id),
		'idRetur' => set_value('idRetur', $row->idRetur),
		'idDetailBarang' => set_value('idDetailBarang', $row->idDetailBarang),
		'jumlah' => set_value('jumlah', $row->jumlah),
		'kondisi' => set_value('kondisi', $row->kondisi),
		'alasan' => set_value('alasan', $row->alasan),
	    );
            $this->template->load('template','detailreturpenjualan/detailreturpenjualan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailreturpenjualan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'idRetur' => $this->input->post('idRetur',TRUE),
		'idDetailBarang' => $this->input->post('idDetailBarang',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'kondisi' => $this->input->post('kondisi',TRUE),
		'alasan' => $this->input->post('alasan',TRUE),
	    );

            $this->Detailreturpenjualan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('detailreturpenjualan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Detailreturpenjualan_model->get_by_id($id);

        if ($row) {
            $this->Detailreturpenjualan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('detailreturpenjualan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailreturpenjualan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idRetur', 'idretur', 'trim|required');
	$this->form_validation->set_rules('idDetailBarang', 'iddetailbarang', 'trim|required');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
	$this->form_validation->set_rules('kondisi', 'kondisi', 'trim|required');
	$this->form_validation->set_rules('alasan', 'alasan', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Detailreturpenjualan.php */
/* Location: ./application/controllers/Detailreturpenjualan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-16 11:18:10 */
/* http://harviacode.com */
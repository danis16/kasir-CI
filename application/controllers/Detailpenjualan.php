<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detailpenjualan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Detailpenjualan_model');
        $this->load->library('form_validation');
    }    
function data() {
        $table = 'view_detailpenjualan';
        $primaryKey = 'id';
        $columns = array(
         array('db' => 'id', 'dt' => 0),array('db' => 'id', 'dt' => 0),
array('db' => 'idpenjualan', 'dt' => 1),
array('db' => 'kodebarang', 'dt' => 2),
array('db' => 'jumlahjual', 'dt' => 3),
array('db' => 'potongan', 'dt' => 4),
array('db' => 'username', 'dt' => 5),
array(
                'db' => 'id',
                'dt' => 6,
                'formatter' => function( $d, $row ) {
            return anchor('Detailpenjualan/read/'.$d,'<i class="fa fa-eye"></i>',"class='btn btn-sm btn-danger'").' '.
                   anchor('Detailpenjualan/update/'.$d,'<i class="fa fa-edit"></i>',"class='btn btn-sm btn-danger'").' '.
                   anchor('Detailpenjualan/delete/'.$d,'<i class="fa fa-trash"></i>',"class='btn btn-sm btn-danger'");
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
        $detailpenjualan = $this->Detailpenjualan_model->get_all();

        $data = array(
            'detailpenjualan_data' => $detailpenjualan
        );

        $this->template->load('template','detailpenjualan/detailpenjualan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Detailpenjualan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'idPenjualan' => $row->idPenjualan,
		'idBarang' => $row->idBarang,
		'jumlahJual' => $row->jumlahJual,
		'potongan' => $row->potongan,
		'idAdmin' => $row->idAdmin,
	    );
            $this->load->view('detailpenjualan/detailpenjualan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailpenjualan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('detailpenjualan/create_action'),
	    'id' => set_value('id'),
	    'idPenjualan' => set_value('idPenjualan'),
	    'idBarang' => set_value('idBarang'),
	    'jumlahJual' => set_value('jumlahJual'),
	    'potongan' => set_value('potongan'),
	    'idAdmin' => set_value('idAdmin'),
	);
        $this->template->load('template','detailpenjualan/detailpenjualan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idPenjualan' => $this->input->post('idPenjualan',TRUE),
		'idBarang' => $this->input->post('idBarang',TRUE),
		'jumlahJual' => $this->input->post('jumlahJual',TRUE),
		'potongan' => $this->input->post('potongan',TRUE),
		'idAdmin' => $this->input->post('idAdmin',TRUE),
	    );

            $this->Detailpenjualan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('detailpenjualan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Detailpenjualan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('detailpenjualan/update_action'),
		'id' => set_value('id', $row->id),
		'idPenjualan' => set_value('idPenjualan', $row->idPenjualan),
		'idBarang' => set_value('idBarang', $row->idBarang),
		'jumlahJual' => set_value('jumlahJual', $row->jumlahJual),
		'potongan' => set_value('potongan', $row->potongan),
		'idAdmin' => set_value('idAdmin', $row->idAdmin),
	    );
            $this->template->load('template','detailpenjualan/detailpenjualan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailpenjualan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'idPenjualan' => $this->input->post('idPenjualan',TRUE),
		'idBarang' => $this->input->post('idBarang',TRUE),
		'jumlahJual' => $this->input->post('jumlahJual',TRUE),
		'potongan' => $this->input->post('potongan',TRUE),
		'idAdmin' => $this->input->post('idAdmin',TRUE),
	    );

            $this->Detailpenjualan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('detailpenjualan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Detailpenjualan_model->get_by_id($id);

        if ($row) {
            $this->Detailpenjualan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('detailpenjualan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailpenjualan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idPenjualan', 'idpenjualan', 'trim|required');
	$this->form_validation->set_rules('idBarang', 'idbarang', 'trim|required');
	$this->form_validation->set_rules('jumlahJual', 'jumlahjual', 'trim|required');
	$this->form_validation->set_rules('potongan', 'potongan', 'trim|required');
	$this->form_validation->set_rules('idAdmin', 'idadmin', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Detailpenjualan.php */
/* Location: ./application/controllers/Detailpenjualan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-03-27 05:14:10 */
/* http://harviacode.com */
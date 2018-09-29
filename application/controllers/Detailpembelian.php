<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detailpembelian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Detailpembelian_model');
        $this->load->library('form_validation');
    }    
function data() {
        $table = 'view_detailpembelian';
        $primaryKey = 'nonota';
        $columns = array(
         array('db' => 'nonota', 'dt' => 0),
array('db' => 'barang', 'dt' => 1),
array('db' => 'kodebarang', 'dt' => 2),
array('db' => 'hargaBeliSatuan', 'dt' => 3),
array('db' => 'jumlahBeli', 'dt' => 4),
array(
                'db' => 'nonota',
                'dt' => 5,
                'formatter' => function( $d, $row ) {
            return anchor('Detailpembelian/read/'.$d,'<i class="fa fa-eye"></i>',"class='btn btn-sm btn-danger'").' '.
                   anchor('Detailpembelian/update/'.$d,'<i class="fa fa-edit"></i>',"class='btn btn-sm btn-danger'").' '.
                   anchor('Detailpembelian/delete/'.$d,'<i class="fa fa-trash"></i>',"class='btn btn-sm btn-danger'");
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
        $detailpembelian = $this->Detailpembelian_model->get_all();

        $data = array(
            'detailpembelian_data' => $detailpembelian
        );

        $this->template->load('template','detailpembelian/detailpembelian_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Detailpembelian_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'idBarang' => $row->idBarang,
		'idPembelian' => $row->idPembelian,
		'hargaBeliSatuan' => $row->hargaBeliSatuan,
		'jumlahBeli' => $row->jumlahBeli,
	    );
            $this->load->view('detailpembelian/detailpembelian_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailpembelian'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('detailpembelian/create_action'),
	    'id' => set_value('id'),
	    'idBarang' => set_value('idBarang'),
	    'idPembelian' => set_value('idPembelian'),
	    'hargaBeliSatuan' => set_value('hargaBeliSatuan'),
	    'jumlahBeli' => set_value('jumlahBeli'),
	);
        $this->template->load('template','detailpembelian/detailpembelian_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idBarang' => $this->input->post('idBarang',TRUE),
		'idPembelian' => $this->input->post('idPembelian',TRUE),
		'hargaBeliSatuan' => $this->input->post('hargaBeliSatuan',TRUE),
		'jumlahBeli' => $this->input->post('jumlahBeli',TRUE),
	    );

            $this->Detailpembelian_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('detailpembelian'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Detailpembelian_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('detailpembelian/update_action'),
		'id' => set_value('id', $row->id),
		'idBarang' => set_value('idBarang', $row->idBarang),
		'idPembelian' => set_value('idPembelian', $row->idPembelian),
		'hargaBeliSatuan' => set_value('hargaBeliSatuan', $row->hargaBeliSatuan),
		'jumlahBeli' => set_value('jumlahBeli', $row->jumlahBeli),
	    );
            $this->template->load('template','detailpembelian/detailpembelian_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailpembelian'));
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
		'idPembelian' => $this->input->post('idPembelian',TRUE),
		'hargaBeliSatuan' => $this->input->post('hargaBeliSatuan',TRUE),
		'jumlahBeli' => $this->input->post('jumlahBeli',TRUE),
	    );

            $this->Detailpembelian_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('detailpembelian'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Detailpembelian_model->get_by_id($id);

        if ($row) {
            $this->Detailpembelian_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('detailpembelian'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailpembelian'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idBarang', 'idbarang', 'trim|required');
	$this->form_validation->set_rules('idPembelian', 'idpembelian', 'trim|required');
	$this->form_validation->set_rules('hargaBeliSatuan', 'hargabelisatuan', 'trim|required');
	$this->form_validation->set_rules('jumlahBeli', 'jumlahbeli', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Detailpembelian.php */
/* Location: ./application/controllers/Detailpembelian.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-01-17 04:12:35 */
/* http://harviacode.com */
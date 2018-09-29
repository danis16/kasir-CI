<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detailpesanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Detailpesanan_model');
        $this->load->library('form_validation');
    }    
function data() {
        $table = 'detailpesanan';
        $primaryKey = 'id';
        $columns = array(
         array('db' => 'id', 'dt' => 0),array('db' => 'id', 'dt' => 0),
array('db' => 'idPemesan', 'dt' => 1),
array('db' => 'idBarang', 'dt' => 2),
array('db' => 'jumlah', 'dt' => 3),
array('db' => 'keterangan', 'dt' => 4),
array(
                'db' => 'id',
                'dt' => 5,
                'formatter' => function( $d, $row ) {
            return anchor('Detailpesanan/read/'.$d,'<i class="fa fa-eye"></i>',"class='btn btn-sm btn-danger'").' '.
                   anchor('Detailpesanan/update/'.$d,'<i class="fa fa-edit"></i>',"class='btn btn-sm btn-danger'").' '.
                   anchor('Detailpesanan/delete/'.$d,'<i class="fa fa-trash"></i>',"class='btn btn-sm btn-danger'");
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
        $detailpesanan = $this->Detailpesanan_model->get_all();

        $data = array(
            'detailpesanan_data' => $detailpesanan
        );

        $this->template->load('template','detailpesanan/detailpesanan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Detailpesanan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'idPemesan' => $row->idPemesan,
		'idBarang' => $row->idBarang,
		'jumlah' => $row->jumlah,
		'keterangan' => $row->keterangan,
	    );
            $this->load->view('detailpesanan/detailpesanan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailpesanan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('detailpesanan/create_action'),
	    'id' => set_value('id'),
	    'idPemesan' => set_value('idPemesan'),
	    'idBarang' => set_value('idBarang'),
	    'jumlah' => set_value('jumlah'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->template->load('template','detailpesanan/detailpesanan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idPemesan' => $this->input->post('idPemesan',TRUE),
		'idBarang' => $this->input->post('idBarang',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Detailpesanan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('detailpesanan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Detailpesanan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('detailpesanan/update_action'),
		'id' => set_value('id', $row->id),
		'idPemesan' => set_value('idPemesan', $row->idPemesan),
		'idBarang' => set_value('idBarang', $row->idBarang),
		'jumlah' => set_value('jumlah', $row->jumlah),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->template->load('template','detailpesanan/detailpesanan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailpesanan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'idPemesan' => $this->input->post('idPemesan',TRUE),
		'idBarang' => $this->input->post('idBarang',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Detailpesanan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('detailpesanan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Detailpesanan_model->get_by_id($id);

        if ($row) {
            $this->Detailpesanan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('detailpesanan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailpesanan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idPemesan', 'idpemesan', 'trim|required');
	$this->form_validation->set_rules('idBarang', 'idbarang', 'trim|required');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Detailpesanan.php */
/* Location: ./application/controllers/Detailpesanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-21 18:26:55 */
/* http://harviacode.com */
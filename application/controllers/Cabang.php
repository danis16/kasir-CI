<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cabang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Cabang_model');
        $this->load->library('form_validation');
    }    
function data() {
        $table = 'cabang';
        $primaryKey = 'id';
        $columns = array(
         array('db' => 'id', 'dt' => 0),array('db' => 'id', 'dt' => 0),
array('db' => 'Cabang', 'dt' => 1),
array('db' => 'kode', 'dt' => 2),
array(
                'db' => 'id',
                'dt' => 3,
                'formatter' => function( $d, $row ) {
            return anchor('Cabang/read/'.$d,'<i class="fa fa-eye"></i>',"class='btn btn-sm btn-danger'").' '.
                   anchor('Cabang/update/'.$d,'<i class="fa fa-edit"></i>',"class='btn btn-sm btn-danger'").' '.
                   anchor('Cabang/delete/'.$d,'<i class="fa fa-trash"></i>',"class='btn btn-sm btn-danger'");
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
        $cabang = $this->Cabang_model->get_all();

        $data = array(
            'cabang_data' => $cabang
        );

        $this->template->load('template','cabang/cabang_list', $data);
    }

  //   public function read($id) 
  //   {
  //       $row = $this->Cabang_model->get_by_id($id);
  //       if ($row) {
  //           $data = array(
		// 'id' => $row->id,
		// 'Cabang' => $row->Cabang,
		// 'kode' => $row->kode,
	 //    );
  //           $this->load->view('cabang/cabang_read', $data);
  //       } else {
  //           $this->session->set_flashdata('message', 'Record Not Found');
  //           redirect(site_url('cabang'));
  //       }
  //   }

 //    public function create() 
 //    {
 //        $data = array(
 //            'button' => 'Create',
 //            'action' => site_url('cabang/create_action'),
	//     'id' => set_value('id'),
	//     'Cabang' => set_value('Cabang'),
	//     'kode' => set_value('kode'),
	// );
 //        $this->template->load('template','cabang/cabang_form', $data);
 //    }
    
 //    public function create_action() 
 //    {
 //        $this->_rules();

 //        if ($this->form_validation->run() == FALSE) {
 //            $this->create();
 //        } else {
 //            $data = array(
	// 	'Cabang' => $this->input->post('Cabang',TRUE),
	// 	'kode' => $this->input->post('kode',TRUE),
	//     );

 //            $this->Cabang_model->insert($data);
 //            $this->session->set_flashdata('message', 'Create Record Success');
 //            redirect(site_url('cabang'));
 //        }
 //    }
    
    public function update($id) 
    {
        $row = $this->Cabang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('cabang/update_action'),
		'id' => set_value('id', $row->id),
		'Cabang' => set_value('Cabang', $row->Cabang),
		'kode' => set_value('kode', $row->kode),
	    );
            $this->template->load('template','cabang/cabang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('cabang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'Cabang' => $this->input->post('Cabang',TRUE),
		'kode' => $this->input->post('kode',TRUE),
	    );

            $this->Cabang_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('cabang'));
        }
    }
    
    // public function delete($id) 
    // {
    //     $row = $this->Cabang_model->get_by_id($id);

    //     if ($row) {
    //         $this->Cabang_model->delete($id);
    //         $this->session->set_flashdata('message', 'Delete Record Success');
    //         redirect(site_url('cabang'));
    //     } else {
    //         $this->session->set_flashdata('message', 'Record Not Found');
    //         redirect(site_url('cabang'));
    //     }
    // }

    public function _rules() 
    {
	$this->form_validation->set_rules('Cabang', 'cabang', 'trim|required');
	$this->form_validation->set_rules('kode', 'kode', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Cabang.php */
/* Location: ./application/controllers/Cabang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-12-07 14:31:01 */
/* http://harviacode.com */
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('Mainlib');
        $this->load->library('form_validation');
        $this->load->model('Admin_model');
         $this->mainlib->logged_in();//inisialisasi
        

    }    


function data() {
     $this->mainlib->logged_in();
        $table = 'admin';
        $primaryKey = 'id';
        $columns = array(
         array('db' => 'id', 'dt' => 0),array('db' => 'id', 'dt' => 0),
array('db' => 'username', 'dt' => 1),
array('db' => 'password', 'dt' => 2),
array('db' => 'idCabang', 'dt' => 3),
array('db' => 'tanggal', 'dt' => 4),
array('db' => 'idJabatan', 'dt' => 5),
array(
                'db' => 'id',
                'dt' => 6,
                'formatter' => function( $d, $row ) {
            return 
    // anchor('Admin/read/'.$d,'<i class="fa fa-eye"></i>',"class='btn btn-sm btn-danger'").' '.
                   anchor('Admin/update/'.$d,'<i class="fa fa-edit"></i>',"class='btn btn-sm btn-danger'");
                   // .' '.
                   // anchor('Admin/delete/'.$d,'<i class="fa fa-trash"></i>',"class='btn btn-sm btn-danger'");
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
         $this->mainlib->logged_in();
        $admin = $this->Admin_model->get_all();

        $data = array(
            'admin_data' => $admin
        );

        $this->template->load('template','admin/admin_list', $data);
     

    }
    function a(){
        print_r($this->session->userdata());
    }


    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/create_action'),
	    'id' => set_value('id'),
	    'username' => set_value('username'),
        'password' => set_value('password'),
	    'idCabang' => set_value('idCabang'),
        'idJabatan'=> set_value('idJabatan'),
	);
            // $data['jabatan']=$this->db->get('jabatan')->result();
            // $this->db->get('jabatan')->result();
        $this->template->load('template','admin/admin_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
               $this->load->model('Admin_model');
            $this->Admin_model->user_register($this->input->post(NULL,TRUE));
            $this->template->load('template','admin/admin_list');
  //           $data = array(
		// 'username' => $this->input->post('username',TRUE),
		// 'password' => $this->input->post('password',TRUE),
	 //    );


  //           $this->Admin_model->insert($data);
  //           $this->session->set_flashdata('message', 'Create Record Success');
  //           redirect(site_url('admin'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Admin_model->get_by_id($id);

        if ($row) {
            $data = array(
              'button'=>'update',
                'action' => site_url('admin/update_action'),
		'id' => set_value('id', $row->id),
		'username' => set_value('username', $row->username),
		'password' => set_value('password'),
        'idCabang'=> set_value('idCabang',$row->idCabang),
        'idJabatan'=> set_value('idJabatan',$row->idJabatan),
	    );

            // $data['cabang']=$this->db->get('admin')->result();
            // $data['jabatan']=$this->db->get('jabatan')->result();
            $this->template->load('template','admin/admin_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
             $this->load->helper('site_helper');
             $encrypt_password = bCrypt($this->input->post('password',TRUE),12);
            $data = array(
		'username' => $this->input->post('username',TRUE),
        'password' => $encrypt_password,
		'tanggal' => date('Y-m-d'),
        'idJabatan'=> $this->input->post('idJabatan',TRUE),
        'idCabang'=>$this->input->post('idCabang',TRUE)
	    );
            $this->Admin_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin'));

            //    $this->load->model('Admin_model');
            // $this->Admin_model->user_update($this->input->post(null,TRUE));
            // $this->template->load('template','admin/admin_list');
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Admin_model->get_by_id($id);

        if ($row) {
            $this->Admin_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('username', 'username', 'trim|required');
    $this->form_validation->set_rules('password', 'password', 'trim|required');
    // $this->form_validation->set_rules('idJabatan', 'jabatan', 'trim|required');
	$this->form_validation->set_rules('idCabang', 'cabang', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }


public function manual()
{

    $this->load->helper('download');
    force_download('MANUAL_BOOK.pdf',NULL);
    // $this->load->view('MANUAL BOOK.pdf');

}



}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-06 12:39:07 */
/* http://harviacode.com */
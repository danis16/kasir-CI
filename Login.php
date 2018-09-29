<?php 


/**
* 
*/
class Login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
        $this->load->library('Mainlib');
        $this->load->model('Admin_model');
        $this->load->library('form_validation');
	}



    protected $username_temp;
    
    public function login()
    { 
       
        $input=$this->input->post(NULL,TRUE);
        $this->username_temp = @$input['username'];
        

        $this->form_validation->set_rules('username','username','required');
        $this->form_validation->set_rules('password','password','required|callback_password_check');

        if ($this->form_validation->run() == FALSE) {
            
        $this->load->view('form_login');
            # code...
        }
        else {
            $admin=$this->db->get_where('admin',array('username'=>$input['username']))->row_array();
            $this->load->library('session');
            $login_data = array(
                'username' => $input['username'],
                'id' => $admin['id'],
                'idCabang'=>$admin['idCabang'],

                'login_status' => TRUE

                );

            $this->session->set_userdata($login_data);
            redirect(base_url('index.php/admin'));

        }


        # code...
    }


    public function password_check($str)
    {
        $this->load->model('Admin_model');
        $user_detail = $this->Admin_model->get_user_detail($this->username_temp);

        if($user_detail->password == crypt($str,$user_detail->password)){
            return TRUE;

        }
        else {
            $this->form_validation->set_message('password_check','Password salah :) ');
            return FALSE;
        }

        # code...
    }


    public function logout()
    {
        $this->load->library('session');
        $this->session->sess_destroy();
        redirect(base_url('index.php/login/login'));
    }


}

 ?>
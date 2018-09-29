<?php 

class Mainlib{

	public function logged_in()
	{
		$_this =& get_instance();
		$_this->load->helper('url');
		if($_this->session->userdata('login_status') !=TRUE){
			redirect(base_url('index.php/login/login'));
		}
		# code...
	}
}

 ?>
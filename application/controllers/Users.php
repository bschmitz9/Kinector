<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
	}

	public function add_new_user() //adds a new user from the admin dashboard / add new user page
	{	
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules("email", "Email", "trim|required|is_unique[users.email]");
		$this->form_validation->set_rules("first_name", "First Name", "trim|required");
		$this->form_validation->set_rules("last_name", "Last Name", "trim|required");
		$this->form_validation->set_rules("password", "Password", "tim|required|matches[passconf]");
		$this->form_validation->set_rules("passconf", "Password Confirmation", "trim|required");
		if($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata('login_error', validation_errors());
			redirect('/dashboard');

		}
		else
		{
			$this->load->model('Login_Reg');
			$this->Login_Reg->new_user($this->input->post());
		}
		redirect('/dashboard');			
	}



	
}






<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
		// $this->session->sess_destroy();
		// 	die();
	}

	public function index ()
	{
		$this->load->view('index');
	}

	//takes the user to the sign in page 
	public function go_to_sign_in()
	{
		$this->load->view('login/sign_in');
	}
	
	//takes the user to the registration page
	public function go_to_register()
	{
		$this->load->view('login/registration');	
	}

	//validates the user sign_in
	public function sign_in()
	{
		$this->load->model('Login_Reg');
		$person = $this->Login_Reg->get_user($this->input->post());
	
		if($person)
		{
			$user = array(
				'user_id'=> $person['id'],
				'first_name' => $person['first_name'],
				'last_name' => $person['last_name'],
				'email' => $person['email'],
				'full_name' => $person['first_name'] . ' ' . $person['last_name'],
				'is_logged_in' => true
				);
		
			$this->session->set_userdata($user);
			redirect('/dashboard/dashboard');// change this to dashboard/user_dashboard after we merge
		}
		else
		{
			$this->session->set_flashdata('user_error', "Invalid Email or Password!");
			redirect('/login/go_to_sign_in');
		}
	}

	//validates the new user registration
	public function registration ()
	{
		//add validation for first user to add min level 9 when we do the merge

		//runs if there are errors in the registration fields
		$this->load->library("form_validation");
		$this->form_validation->set_rules("first_name", "First Name", "trim|required"); 
		$this->form_validation->set_rules("last_name", "Last Name", "trim|required"); 
		$this->form_validation->set_rules("email", "Email", "trim|required|valid_email|is_unique[users.email] "); 
		$this->form_validation->set_rules("password", "Password", "trim|min_length[8]|required|matches[passconf]"); 
		$this->form_validation->set_rules("passconf", "Password Confirmation", "trim|required"); 

		if ($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata('form_validation', validation_errors());
			redirect('/login/go_to_register');
		}
		else 
		{
		//if the user passes validations and has inputed the right information then we run this statement that puts from the model and puts the
		//info in an array where we can access it in a session 
		$this->load->model('Login_Reg');
		$person = $this->Login_Reg->new_user($this->input->post());
	
		$user = array(
			'user_id' => $person['id'],
			'first_nmae' => $person['first_name'],
			'last_name' => $person['last_name'],
			'email' => $person['email'],
			'full_name' => $person['first_name'] . ' ' . $person['last_name'],
			'is_logged_in' => true
			);

		$this->session->set_userdata($user);

		redirect('/dashboard/dashboard'); //make this dashboard/user_dashboard once we do the merge 
		}
	}
}

?>
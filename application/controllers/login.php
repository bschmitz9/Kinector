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
		$customer = $this->Login_Reg->get_user($this->input->post());

	//if our query comes back with a user we run the following code and set the array to a session so we can access throughout the site.
		if($customer)
		{
			$user = array(
				'user_id'=> $customer['id'],
				'user_level' => $customer['user_level'],
				'first_name' => $customer['first_name'],
				'last_name' => $customer['last_name'],
				'email' => $customer['email'],
				'full_name' => $customer['first_name'] . ' ' . $customer['last_name'],
				'is_logged_in' => true
				);

			$this->session->set_userdata($user);
			redirect('/dashboard/user_dashboard'); 
		}
		
		else
		{
			$this->session->set_flashdata('user_error', "Invalid Email or Password! Please try again!");
			redirect('/login/go_to_sign_in');
		}
	}

	public function guest_login ()
	{
		$guest = array(
				'user_id'=> 0,
				'first_name' => "Guest",
				'full_name' => "Guest",
				'is_logged_in' => true
				);

			$this->session->set_userdata($guest);
			redirect('/dashboard/user_dashboard'); 

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
		//we get the get users method in our model and then store any records in $customer. If is null then the user level is set to 9, otherwise it 
		//stays at 1 and is stored in the database.
			$this->load->model("User_model");
			$customer = $this->User_model->get_all_users();
			$data = $this->input->post();

			if($customer == null)
			{		
				$data['user_level'] = 9;
			}
			else
			{
				$data['user_level'] = 1;
			}
			// var_dump($data);
			// die();

			$this->load->model('Login_Reg');
			$user=$this->Login_Reg->new_user($data);


		//if we don't get a record back in our database, then its the first user and we set the first user's admin level to 9, and redirect to the 
		//admin dashboard. If $customer is not null we know there are previous customers and we redirect to the user dashboard. The admin user
		//can set other users up as admins.
		// $customer = $this->input->post();
			$customer = $this->Login_Reg->get_user($this->input->post());
		
			$user = array(
				'user_id'=> $customer['id'],
				'user_level' => $customer['user_level'],
				'first_name' => $customer['first_name'],
				'last_name' => $customer['last_name'],
				'email' => $customer['email'],
				'full_name' => $customer['first_name'] . ' ' . $customer['last_name'],
				'is_logged_in' => true
				);

			$this->session->set_userdata($user);

			redirect('/dashboard'); 
	  }
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}









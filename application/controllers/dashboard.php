<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
	}

	public function index ()
	{
		
		// $this->load->view('/dashboard/dashboard');
		// $this->load->view('/dashboard/admin');
		// $this->load->view('/users/new');
		// $this->load->view('/users/edit');
		// $this->load->view('/user/edit_admin');
		// $this->load->view('/users/show');
		// $this->admin_dashboard();
		$this->user_dashboard();

	}

	public function add_user()
	{
		$this->load->view('/user/new');  // directs admin to add a new user page
	}
//==========If user logs in with user_level less than 9, directs to user dashboard
	public function user_dashboard()
	{
		$this->load->model('User_model');
		$users = $this->User_model->get_all_users();
		$values = array(
			'users' => $users
			);
		$this->load->view('dashboard/dashboard', $values);
	}

//=======If user logs in with user_level 9, directs to admin dashboard
	public function admin_dashboard()
	{
		$this->load->model('User_model');
		$users = $this->User_model->get_all_users();
		$values = array(
			'users' => $users
			);
		$this->load->view('dashboard/admin', $values);
	}
	
}






<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('Dash_model');
	}

	public function show($id)
	{
		$comments = $this->User_model->get_comments();
		$messages = $this->User_model->get_messages();
		$user = $this->Dash_model->get_one_user($id);
		$data = array(
			'comments' => $comments,
			'messages' => $messages,
			'user' => $user			
			);
		$this->load->view('user/show', $data);

	}

	public function post_message()
	{
		$this->Users_model->post_message($this->input->post());
		$this->show($this->input->post('user_id'));
	}

	public function post_comment()
	{
		$this->Users_model->post_comment($this->input->post());
		$this->show($this->input->post('profile_id'));
	}

//admin sends post info from the views/users/new page =========================
//adds a new user from the admin dashboard / add new user page  ===============
	public function add_new_user()
	{	
	
		$this->form_validation->set_rules("email", "Email", "trim|required|is_unique[users.email]");
		$this->form_validation->set_rules("first_name", "First Name", "trim|required");
		$this->form_validation->set_rules("last_name", "Last Name", "trim|required");
		$this->form_validation->set_rules("password", "Password", "tim|required|matches[passconf]");
		$this->form_validation->set_rules("passconf", "Password Confirmation", "trim|required");
		if($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata('login_error', validation_errors());
			redirect('/dashboard/admin_dashboard');

		}
		else
		{
			$this->load->model('Login_Reg');
			$this->Login_Reg->new_user($this->input->post());
		}
		redirect('/dashboard/admin_dashboard');			
	}

// user sends post info from the views/user/edit page here to change their name or email
//redirects back to the edit page=======================
	public function update_info()
	{
		$id = $this->input->post('id');
		$url = "/dashboard/edit/".$id;
		$this->form_validation->set_rules("email", "Email", "trim|required");
		$this->form_validation->set_rules("first_name", "First Name", "trim|required");
		$this->form_validation->set_rules("last_name", "Last Name", "trim|required");
		if($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata('login_error', validation_errors());
			redirect($url);
		}
		else
		{
			$this->session->set_flashdata('success', 'Your information has been updated!');
			$this->User_model->update_info($this->input->post());
		}
		redirect($url);
	}

//user sends updated password here from the views/user/edit page, and is redirected back to the user page	
	public function update_password()
	{
		$id = $this->input->post('id');
		$url = "/dashboard/edit/".$id;
		$this->form_validation->set_rules("password", "Password", "tim|required|matches[passconf]");
		$this->form_validation->set_rules("passconf", "Password Confirmation", "trim|required");
		if($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata('login_error', validation_errors());
			redirect($url);
		}
		else
		{
			$this->User_model->update_pass($this->input->post());
			$this->session->set_flashdata('success', 'Your information has been updated!');
		}
		redirect($url);
	}

//user can edit description from the views/user/edit that will show up on the profile page
	public function update_description()
	{
		$id = $this->input->post('id');
		$url = "/dashboard/edit/".$id;
		if($this->input->post('description'))
		{
			$this->User_model->update_description($this->input->post());
			$this->session->set_flashdata('success', 'Your information has been updated!');
		}
		redirect($url);
	}
//admin can change the name / email of a user and posts the data to this method
//from the views/user/edit_admin page==========================================
	public function update_info_admin()
	{
		$id = $this->input->post('id');
		$url = "/dashboard/edit_admin/".$id;
		$this->form_validation->set_rules("email", "Email", "trim|required");
		$this->form_validation->set_rules("first_name", "First Name", "trim|required");
		$this->form_validation->set_rules("last_name", "Last Name", "trim|required");
		if($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata('login_error', validation_errors());
			redirect($url);
		}
		else
		{
			$this->session->set_flashdata('success', 'Your information has been updated!');
			$this->User_model->update_info($this->input->post());
		}
		redirect($url);
	}

// admin can provide user a temporary password change from edit_admin page	
//from the views/user/edit_admin page=====================================
	public function update_password_admin()
	{
		$id = $this->input->post('id');
		$url = "/dashboard/edit_admin/".$id;
		$this->form_validation->set_rules("password", "Password", "tim|required|matches[passconf]");
		$this->form_validation->set_rules("passconf", "Password Confirmation", "trim|required");
		if($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata('login_error', validation_errors());
			redirect($url);
		}
		else
		{
			$this->User_model->update_pass($this->input->post());
			$this->session->set_flashdata('success', 'Your information has been updated!');
		}
		redirect($url);
	}
//this is the delete confirmation check method from the dashboard/admin/dashboard page
	//prompts the admin to verify deletion of a user=================================
	public function delete_conf($id)
	{
		 $this->load->model('Dash_model');
		 $this->session->set_userdata('delete', $this->Dash_model->get_one_user($id));
		 redirect('/dashboard/admin_dashboard');
	}
//following prompt, this deletes the user the admin wishes to delete from the 
//dashboard/admin_dashboard===================================================
	public function delete($id)
	{
		$this->User_model->delete($id);
		redirect('/dashboard/admin_dashboard');
	}


}







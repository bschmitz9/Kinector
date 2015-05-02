<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class User_model extends CI_Model
{
	public function add_user($id)
	{
		$query = "SELECT * FROM users WHERE id =".$id;
		return $this->db->query($query) -> row_array();

	}

	public function get_all_users()
	{
		$query = "SELECT * FROM users";
		return $this->db->query($query) -> result_array();
	}

	public function update_info($data)
	{
		$query = "UPDATE users SET first_name=?, last_name=?, email=?, user_level=? WHERE id=?";

		$first = $data['first_name'];
		$last = $data['last_name'];
		$email = $data['email'];
		$user_level = $data['user_level'];
		$id= $data['id'];
		$user = array($first, $last, $email, $user_level, $id);
		return $this->db->query($query, $user);
	}

	public function update_pass($data)
	{
		$password = md5($data['password']);
		$query = "UPDATE users SET password='".$password."'WHERE id=".$data['id'];
		$this->db->query($query);

	}
	public function update_description($data)
	{
		$query = "UPDATE users SET description=? WHERE id=?";
		$values = array($data['description'], $data['id']);
		$this->db->query($query, $values);
	}
	public function delete($id)
	{
		$query = "DELETE FROM users WHERE id=".$id;
		$this->db->query($query);
	}
}
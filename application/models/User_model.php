<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class User_model extends CI_Model
{
	public function add_user()
	{
		// $query = "INSERT INTO "

	}

	public function get_all_users()
	{
		$query = "SELECT * FROM users";
		return $this->db->query($query) -> result_array();
	}



}
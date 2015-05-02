<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Dash_model extends CI_Model
{
	public function get_one_user($id)
	{
		$query = "SELECT * FROM users WHERE id = ".$id;
		return $this->db->query($query)->row_array();
	}


}
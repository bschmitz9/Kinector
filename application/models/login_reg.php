<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_Reg extends CI_Model 
{

	function new_user($post)
	{	
		$password = md5($post['password']);

		$query = "INSERT INTO users (first_name, last_name, email, password, created_at) VALUES (?,?,?,?,?)";
		$values = array($post['first_name'], $post['last_name'], $post['email'], $password, date("Y-m-d, H:i:s"));
		return $this->db->query($query, $values);
	}

	function get_user($post)
	{
		$password = md5($post['password']);

		return $this->db->query("SELECT * FROM users WHERE email = ? AND password = ?", array($post['email'], $password)) -> row_array();
	}









}
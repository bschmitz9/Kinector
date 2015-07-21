<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_Reg extends CI_Model 
{
	//inserts a new user into the database upon registration
	function new_user($post)
	{	
		$password = md5($post['password']);


		$query = "INSERT INTO users (first_name, last_name, email, password, created_at, user_level ) VALUES (?,?,?,?,NOW(),?)";
		$values = array($post['first_name'], $post['last_name'], $post['email'], $password, $post['user_level']);
		// var_dump($values);
		// die();
		return $this->db->query($query, $values);
	}

	//get a specific user
	function get_user($post)
	{
		$password = md5($post['password']);

		return $this->db->query("SELECT * FROM users WHERE email = ? AND password = ?", array($post['email'], $password)) -> row_array();
	}

	









}
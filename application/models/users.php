<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Model
{
	
	public function login($email, $password)
	{
		$query = "SELECT * FROM users WHERE email = ? AND password = ?";
		$values = array($email, $password);
		$user = $this->db->query($query, $values)->row_array();
		if ($user){
			return $user;
		}
		else
		{
			return false;
		}
	}

	public function registration($email, $first_name, $last_name, $password)
	{
		$query = "INSERT INTO users (email, first_name, last_name, password) VALUES (?, ?, ?, ?);";
		$values = array($email, $first_name, $last_name, $password);
		return $this->db->query($query, $values);
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {
	public function register($data) {
		if ($this->db->query("SELECT * FROM users WHERE email = '{$data['email']}'")->row_array()==NULL) {
			$query = "INSERT INTO users (name, alias, email, password, created_at, updated_at) VALUES (?, ?, ?, ?, now(), now())";
			$values = array($data['name'], $data['alias'], $data['email'], $data['password']);
			$this->db->query($query, $values);
		} else {
			// tell user already registered
		}
	}
	public function login($data) {
		$loggedUser = $this->db->query("SELECT * FROM users WHERE email = '{$data['email']}' AND password = '{$data['password']}'")->row_array();
		if ($loggedUser) {
			return $loggedUser;
		} else {
			// tell user bad password or no email
		}
	}
}
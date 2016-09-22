<?php defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Model {
	public $user;
	public function __construct() {
		parent::__construct();
	}
	public function get_user($data) {
		return $this->db->query("SELECT * FROM users WHERE email = '{$data["email"]}' AND password = '{$data["password"]}'")->row_array();
	}
	public function register($data) {
		if ($this->db->query("SELECT * FROM users WHERE email = '{$data['email']}'")->row_array() == NULL) {
			$query = "INSERT INTO users (first_name, last_name, email, password, created_at, updated_at) VALUES (?, ?, ?, ?, now(), now())";
			$values = array($data['first_name'], $data['last_name'], $data['email'], $data['password']);
			$this->db->query($query, $values);
			return $this->db->insert_id();
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
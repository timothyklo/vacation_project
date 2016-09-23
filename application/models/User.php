<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {
	public function register($post) {
		$query = "INSERT INTO users (name, username, password, created_at, updated_at)
		VALUES (?,?,?,?,?)";
		$values = array($post['name'], $post['username'], md5($post['password']), date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
		$id = $this->db->insert_id($this->db->query($query, $values));
		return $this->find($id);
	}
	public function find($id) {
		return $this->db->query("SELECT * FROM users WHERE id = ?", array($id))->row_array();
	}
	public function registerValidate($post) {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[password_check]');
		$this->form_validation->set_rules('password_check', 'Password Confirmation', 'trim|required');
		if($this->form_validation->run()) {
			return "valid";
		} else {
			return array(validation_errors());
		}
	}
	public function login($post) {
		$query = "SELECT * FROM users WHERE username = ? AND password = ?";
		$values = array($post['username'], md5($post['password']));
		return $this->db->query($query, $values)->row_array();
	}
	public function loginValidate($post) {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'username', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		if($this->form_validation->run()) {
			return "valid";
		} else {
			return array(validation_errors());
		}
	}
}
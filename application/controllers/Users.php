<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function index(){
		$this->load->view('main');
	}
	public function register() {
		$this->load->model('User');
		$result = $this->User->registerValidate($this->input->post());
		if($result == "valid") {
			$user = $this->User->register($this->input->post());
			$this->session->set_userdata(array('username' => $user['username']));
			redirect('travels');
		} else {
			$errors = array(validation_errors());
			$this->session->set_flashdata('errors', $errors);
			redirect('/');
		}
	}
	public function login() {
		$this->load->model('User');
		$result = $this->User->loginValidate($this->input->post());
		if($result == "valid") {
			$user = $this->User->login($this->input->post());
			$this->session->set_userdata(array('username' => $user['username']));
			if($user){
				redirect('travels');
			}
			else {
				$errors2 = array('No such user exists. Try retyping your info or registering');
				$this->session->set_flashdata('errors2', $errors2);
				redirect('/');
			}
		} 
		else {
			$errors2 = array(validation_errors());
			$this->session->set_flashdata('errors2', $errors2);
			redirect('/');
		}
	}
	public function logout() {
		$this->session->sess_destroy();
		redirect('/');
	}
}
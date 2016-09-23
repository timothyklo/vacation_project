<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Session extends CI_Controller {
	public function index() {
// 		$this->output->enable_profiler(TRUE);
		
		$params = [];
		
		$this->load->view("index", $params);
	}
	
	public function register() {
		$this->load->model("User");
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[confirmPassword]');
		$this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'trim|required');
		
		if ($this->form_validation->run()) {
			$user = $this->User->registerUser($this->input->post());
			
			if ($user) {
				$this->session->set_userdata("currentUser", $user);
				
				redirect('books');
			}
			else {
				$errors = array("An error occured while registering, please try again");
				$this->session->set_flashdata('errors', $errors);
				
				redirect('/');
			}
		}
		else {
			$errors = array(validation_errors());
			$this->session->set_flashdata('regErrors', $errors);
			
			redirect('/');
		}
	}
	
	public function login() {
		$this->load->model("User");
		
		if (strlen($this->input->post('email')) == 0 || strlen($this->input->post('password')) == 0) {
			redirect("/");
		}
		else {
			$user = $this->User->login($this->input->post());
			
			if ($user) {
				$this->session->set_userdata("currentUser", $user);
				
				redirect('books');
			}
			else {
				$this->session->set_flashdata("loginErrors", "Email/Password not found. Please try again.");
				
				redirect("/");
			}
		}
	}
	
	public function logout() {
		$this->session->sess_destroy();
		
		redirect("/");
	}
}
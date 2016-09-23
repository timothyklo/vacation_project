<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('welcomeView');
	}

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User');
		$this->output->enable_profiler();
	}
	public function register() {
		$this->input->post();
		$this->User->register($this->input->post());
		redirect('/');
	}
	public function login() {
		$user = $this->User->login($this->input->post());
		$this->session->set_userdata(array('id' => $user['id'], 'alias' => $user['alias']));
		redirect('/books');
	}
	public function logout() {
		session_destroy();
		redirect('/');
	}

}

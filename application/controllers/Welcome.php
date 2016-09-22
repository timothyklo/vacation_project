<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	protected $view_data = array();
	protected $user_session = NULL;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User');
//		$this->output->enable_profiler();
	}
	public function index()
	{
		$this->load->view('welcomeView');
	}
	public function register() {
		$this->load->library("form_validation");
		$this->form_validation->set_rules("first_name", "First Name", "trim|required");
		$this->form_validation->set_rules("last_name", "Last Name", "trim|required");
		$this->form_validation->set_rules("email", "Email", "trim|valid_email|required");
		$this->form_validation->set_rules("password", "Password", "trim|min_length[8]|required|matches[confirm_password]|md5");
		$this->form_validation->set_rules("confirm_password", "Confirm Password", "trim|required|md5");
		if($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata("registration_errors", validation_errors());
			redirect(base_url());
		}
		else
		{
			$this->load->model("User");
			$insert_user = $this->User->register($this->input->post());
			$this->session->set_userdata("user_session", $user_input);
			redirect('/');
		}
	}
	public function login() {
		$this->load->library("form_validation");
		$this->form_validation->set_rules("email", "Email", "trim|valid_email|required");
		$this->form_validation->set_rules("password", "Password", "trim|min_length[8]|required|md5");	
		if($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata("login_errors", validation_errors());
			redirect('/');
		}
		else
		{
			$this->load->model("User");							   
			$get_user = $this->user_model->get_user($this->input->post());
			$this->session->set_userdata("user_session", $get_user);
			redirect('/');
		}
	}
	public function logout() {
		session_destroy();
		redirect('/');
	}
}
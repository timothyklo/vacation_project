<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Masters extends CI_Controller {
	public function addbooks() {
		$this->load->view('review');
	}
	public function user($id) {
		$this->load->view('profile');
	}
	public function newBook() {
		$this->load->model('Master');
		$post = $this->input->post();
		$this->Master->review($post);
		$this->load->view('book');
	}
	public function kill() {
        $this->session->sess_destroy();
        redirect('/');
    }
}
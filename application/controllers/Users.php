<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
	public function detail($userID) {
		$this->load->model("User");
		
		$user = $this->User->getUser($userID);
		
		$this->load->model("Book");
		
		$user['reviewedBooks'] = $this->Book->getReviewedBooksByUser($userID);
		
		$this->load->view("userDetailView", ["user" => $user]);
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller {

	public function index()
	{
		$this->load->view('booksHomeView', array('recent' => $this->Book->getRecentReviews(), 'other' => $this->Book->getRecentAfterThree()));
	}
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Book');
		$this->output->enable_profiler();
	}

	public function add() {
		$this->load->view("addBookAndReviewView"); // goes to page 3
	}
	public function bookreview($bookId) {
		$this->load->view("bookReviewView", $this->Book->getBook($bookId)); // goes to page 4
	}
	public function userreviews($userId) { 
		$this->load->view("userReviewsView", $this->Book->getUserInfo($userId));  // goes to page 5
	}

	public function addBook() {
		$bookId = $this->Book->addBookReview($this->input->post());
		redirect("books/$bookId");
	}
	public function addReview() {
		$this->Book->addReview($this->input->post());
		$bookId = $this->input->post('book_Id');
		redirect("books/$bookId");
	}
}

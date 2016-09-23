<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Books extends CI_Controller {
	public function index() {
// 		$this->output->enable_profiler(TRUE);
		
		$params = [];
		
		$this->load->model("Book");
		
		$params['reviewedBooks'] = $this->Book->getReviewedBooks();
		
		$this->load->model("BookReview");
		
		//	Get the latest 3 reviews
		$params['recentReviews'] = $this->BookReview->getReviews(3);
		
		$this->load->view("booksView", $params);
	}
	
	public function add() {
		$this->load->model("Author");
		
		$allAuthors = $this->Author->getAuthors();
		
		$this->load->view("addBookView", ["authorArray" => $allAuthors]);
	}
	
	public function addBook() {
		$this->load->model("Book");
		
		$newBookID = $this->Book->addBook($this->input->post());
		
		$this->load->model("BookReview");
		
		$reviewData = [
				"userID" => $this->session->userdata('currentUser')['id'],
				"bookID" => $newBookID,
				"review" => $this->input->post("review"),
				"rating" => $this->input->post("rating")
		];
		
		$this->BookReview->addReview($reviewData);
		
		if ($newBookID) {
			redirect('/books/' . $newBookID);
		}
		else {
			$errors = array("An error occured, please try again");
			$this->session->set_flashdata('errors', $errors);
		
			redirect('/books/add');
		}
	}
	
	public function addReview() {
		$this->load->model("BookReview");
		
		$params = $this->input->post();
		$params["userID"] = $this->session->userdata('currentUser')['id'];
		
		$this->BookReview->addReview($params);
		
		redirect("/books/" . $params['bookID']);
	}
	
	public function deleteReview($reviewID) {
		$this->load->model("BookReview");
		
		$this->BookReview->deleteReview($reviewID);
		
		redirect("/books");
	}
	
	public function detail($bookID) {
		$this->load->model("Book");
		
		$book = $this->Book->getBook($bookID);
		
		$this->load->model("BookReview");
		$reviews = $this->BookReview->getReviewsForBook($book['id']);
		
		$book['reviews'] = $reviews;

		$this->load->view("bookDetailView", ["book" => $book]);
	}
}
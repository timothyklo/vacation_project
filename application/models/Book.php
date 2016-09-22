<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Model {
	public function addBookReview($data) {
		$values = array($data['title'], $data['author']); // book query
		$this->db->query("INSERT INTO books (title, author, created_at, updated_at) VALUES (?, ?, now(), now())", $values);
		$bookId = $this->db->insert_id();
		$this->db->query("INSERT INTO reviews (comment, rating, book_id, user_id, created_at, updated_at) VALUES (?, ?, ?, ?, now(), now())", array($data['comment'], intval($data['rating']), $bookId, intval($data['user_Id'])));
		return $bookId;
	}
	public function addReview($data) {
		$this->db->query("INSERT INTO reviews (comment, rating, book_id, user_id, created_at, updated_at) VALUES (?, ?, ?, ?, now(), now())", array($data['comment'], $data['rating'], $data['book_Id'], $data['user_Id']));
	}
	public function getBook($id) { 
		$bookInfo = $this->db->query("SELECT title, author, id FROM books WHERE books.id = $id")->row_array();
		$reviews = $this->db->query("SELECT users.id, reviews.rating, reviews.comment, reviews.created_at, users.alias FROM reviews JOIN books ON reviews.book_id = books.id JOIN users ON reviews.user_id = users.id WHERE books.id = $id")->result_array();
		return array('bookinfo' => $bookInfo, 'reviews' => $reviews);
	}
	public function getRecentReviews() {
		return $this->db->query("SELECT users.id uid, books.id, books.title, reviews.rating, reviews.comment, reviews.created_at, users.alias FROM books JOIN reviews ON reviews.book_id = books.id JOIN users ON reviews.user_id = users.id ORDER BY reviews.created_at DESC LIMIT 3")->result_array();
	}
	public function getRecentAfterThree() {
		return $this->db->query("SELECT DISTINCT title, id FROM (SELECT books.title, books.id FROM books JOIN reviews ON reviews.book_id = books.id ORDER BY reviews.created_at DESC LIMIT 3, 9999) AS T")->result_array();
	}
	public function getUserInfo($id) {
		$userInfo = $this->db->query("SELECT users.alias, users.name, users.email, count(reviews.id) numreviews FROM reviews JOIN users ON users.id=reviews.user_id WHERE users.id = $id GROUP BY users.alias")->row_array();
		$usersReviews = $this->db->query("SELECT DISTINCT title, id FROM (SELECT title, books.id FROM books JOIN reviews ON reviews.book_id=books.id JOIN users ON users.id=reviews.user_id WHERE users.id = $id) AS T")->result_array();
		return array('userInfo' => $userInfo, 'usersReviews' => $usersReviews);
	}
}
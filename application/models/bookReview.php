<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class BookReview extends CI_Model {
		function getReviews($numToFetch) {
			$query = "SELECT br.*, b.title title, u.alias reviewer_name FROM book_review br JOIN book b ON br.book_id = b.id JOIN user u ON br.user_id = u.id ORDER BY br.created_at DESC";

			if ($numToFetch) {
				$query .= " LIMIT $numToFetch";
			}

			return $this->db->query($query)->result_array();
		}

		function getReviewsForBook($bookID) {
			return $this->db->query("SELECT br.*, b.title title, u.alias reviewer_name FROM book_review br JOIN book b ON br.book_id = b.id JOIN user u ON br.user_id = u.id WHERE b.id = ? ORDER BY br.created_at DESC", array($bookID))->result_array();
		}

		function getReview($reviewID) {
			return $this->db->query("SELECT * FROM book_review WHERE id = ?", array($reviewID))->row_array();
		}

		function addReview($reviewData) {
			$query = "INSERT INTO book_review (user_id, book_id, review, rating) VALUES (?,?,?,?)";
			$values = array($reviewData['userID'], $reviewData['bookID'], $reviewData['review'], $reviewData['rating']);

			$this->db->query($query, $values);
			return $this->db->insert_id();
		}

		public function deleteReview($reviewID) {
			return $this->db->query("DELETE FROM book_review WHERE id = ?", array($reviewID));
		}
	}
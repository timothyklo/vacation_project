<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Book extends CI_Model {
		function getBooks() {
			return $this->db->query("SELECT * FROM book ORDER BY name")->result_array();
		}

		function getBook($bookID) {
			return $this->db->query("SELECT b.*, a.name author FROM book b JOIN author a ON b.author_id = a.id WHERE b.id = ?", array($bookID))->row_array();
		}

		function addBook($bookData) {
			$authorID = $bookData['authorID'];

			if (strlen($bookData['authorName']) > 0) {
				$this->load->model("Author");

				$authorID = $this->Author->addAuthor($bookData['authorName']);
			}

			if ($authorID) {
				$query = "INSERT INTO book (author_id, title) VALUES (?,?)";
				$values = array($authorID, $bookData['title']);

				$this->db->query($query, $values);

				return $this->db->insert_id();
			}

			return FALSE;
		}

		function getReviewedBooks() {
			return $this->db->query("SELECT * FROM book WHERE id IN (SELECT DISTINCT book_id FROM book_review) ORDER BY title")->result_array();
		}

		function getReviewedBooksByUser($userID) {
			return $this->db->query("SELECT b.* FROM book b JOIN book_review br ON br.book_id = b.id WHERE br.user_id = ?", array($userID))->result_array();
		}
	}
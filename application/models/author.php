<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Author extends CI_Model {
		function getAuthors() {
			return $this->db->query("SELECT * FROM author ORDER BY name")->result_array();
		}

		function getAuthor($authorID) {
			return $this->db->query("SELECT * FROM author WHERE id = ?", array($authorID))->row_array();
		}

		function addAuthor($authorName) {
			if (strlen($authorName) > 0) {
				$query = "INSERT INTO author (name) VALUES (?)";
				$values = array($authorName);

				$this->db->query($query, $values);
				return $this->db->insert_id();
			}

			return FALSE;
		}
	}
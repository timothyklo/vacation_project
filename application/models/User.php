<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class User extends CI_Model {
		function getUsers() {
			return $this->db->query("SELECT * FROM user ORDER BY name")->result_array();
		}

		function getUser($userID) {
			return $this->db->query("SELECT * FROM user WHERE id = ?", array($userID))->row_array();
		}

		function registerUser($userData) {
			$query = "INSERT INTO user (name, alias, email, password) VALUES (?,?,?,?)";
			$values = array($userData['name'], $userData['alias'], $userData['email'], $userData['password']);

			$this->db->query($query, $values);
			$newUserID = $this->db->insert_id();

			if ($newUserID) {
				$query = "SELECT * FROM user WHERE id=$newUserID";

				return $this->db->query($query)->row_array();
			}

			return FALSE;
		}

		function login($userData) {
			$query = "SELECT * FROM user WHERE email=? AND password=?";
			$values = array($userData['email'], $userData['password']);

			return $this->db->query($query, $values)->row_array();
		}
	}
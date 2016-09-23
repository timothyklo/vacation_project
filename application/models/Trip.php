<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Trip extends CI_Model {
	public function getAllTrips($username) {
		return $this->db->query("SELECT users.name, trips.id tid, destination, description, travel_date_from, travel_date_to FROM trips JOIN users_trips ON users_trips.trips_id = trips.id JOIN users ON users_trips.user_id = users.id WHERE users.username='{$username['username']}'")->result_array();
	}
	public function getOtherTrips($username) {
		return $this->db->query("SELECT users.name, trips.id tid, destination, description, travel_date_from, travel_date_to FROM trips JOIN users_trips ON users_trips.trips_id = trips.id JOIN users ON users_trips.user_id = users.id WHERE users.username!='{$username['username']}' LIMIT 7")->result_array();
	}
	public function getOneTrip($trip) { 
		return $this->db->query("SELECT destination, description, travel_date_from, travel_date_to, users.name name FROM trips JOIN users ON created_by=users.id WHERE trips.id='{$trip}'")->row_array();
	}
	public function getUsersOnTrip($trip) { 
		return $this->db->query("SELECT name FROM users JOIN users_trips ON users_trips.user_id=users.id JOIN trips ON trips.id = users_trips.trips_id WHERE trips.id='{$trip}'")->result_array();
	}
	public function addATrip($trip) {
		$userName = $this->session->userdata['username'];
		$loggedInId =  $this->db->query("SELECT id FROM users WHERE username = '{$userName}'")->row_array();
		$this->db->query("INSERT INTO trips (destination, description, travel_date_from, travel_date_to, created_by, created_at, updated_at) VALUES (?, ?, ?, ?, ?, now(), now())", array($trip['destination'], $trip['description'], $trip['travel_date_from'], $trip['travel_date_to'], $loggedInId));
		$newTripId = $this->db->query("SELECT id FROM trips WHERE id=(SELECT max(id) FROM trips)")->row_array();
		$this->db->query("INSERT INTO users_trips (user_id, trips_id) VALUES (?,?)", array($loggedInId, $newTripId));
	}
	public function joinTrip($trip) {
		$userName = $this->session->userdata['username'];
		$loggedInId =  $this->db->query("SELECT id FROM users WHERE username = '{$userName}'")->row_array();
		// if ("SELECT * FROM users_trip WHERE user_id = $loggedInId AND trips_id = $trip") 
		$this->db->query("INSERT INTO users_trips (user_id, trips_id) VALUES (?,?)", array($loggedInId, $trip));
	}
	public function tripValidate($post) {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('destination', 'Destination', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('description', 'Description', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('travel_date_from', 'Travel Date From', 'trim|required');
		$this->form_validation->set_rules('travel_date_to', 'Travel Date To', 'trim|required');
		if($this->form_validation->run()) {
			return "valid";
		} else {
			return array(validation_errors());
		}
	}
}











<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Travels extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Trip');
	}
	public function index() {
		$this->load->view('dashboard', array('upcoming' => $this->Trip->getAllTrips($this->session->userdata), 'others' => $this->Trip->getOtherTrips($this->session->userdata)));
	}
	public function destination($trip) {
		$this->load->view('destination', array('trip' => $this->Trip->getOneTrip($trip), 'others' => $this->Trip->getUsersOnTrip($trip)));
	}
	public function add() {
		$this->load->view('addtrip');
	}
	public function addatrip() {
		$result = $this->Trip->tripValidate($this->input->post());
		if($result == "valid") {
			$this->Trip->addATrip($this->input->post());
			redirect('travels');
		} else {
			$errors = array(validation_errors());
			$this->session->set_flashdata('errors', $errors);
			redirect('travels/add');
		}
	}
	public function join($trip) {
		$this->Trip->joinTrip($trip);
		redirect('travels');
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Travels extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Trip');
	}
	public function index(){
		$this->load->view('dashboard', array('upcoming' => $this->Trip->getAllTrips($this->session->userdata), 'others' => $this->Trip->getOtherTrips($this->session->userdata)));
	}
	public function destination($trip){
		$this->load->view('destination', array('trip' => $this->Trip->getOneTrip($trip), 'others' => $this->Trip->getUsersOnTrip($trip)));
	}
	public function add(){
		$this->load->view('addplan');
	}
	public function addATrip(){
		$this->Trip->addATrip($this->input->post());
		redirect('travels');
	}
}
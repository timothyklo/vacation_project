<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	public function checkUserLogin($userCredentials)
	{

	}
	public function registerNewUser($userCredentials)
	{
		// input into database
	}
}
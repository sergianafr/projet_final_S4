<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class back_office extends CI_Controller {
    /**
     * login page for back-office login 
     */
	function login() {
		// Recuperation du template de login
		$this->load->view('back_office/login');
	}
}
?>
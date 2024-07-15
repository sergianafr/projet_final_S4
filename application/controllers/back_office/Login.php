<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    /**
     * Index page for back-office login 
     */
	function index() {
		// Recuperation du template de login
		$this->load->view('templates/template');
	}
}
?>
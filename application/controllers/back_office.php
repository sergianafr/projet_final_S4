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

	/**
	 * athentification du admin
	 */
	function auth_admin(){
		$data['contents'] = "back_office/home";
		$chemin_redirection = "templates/back_office_template";
		// Verification du compte
		
		// Redirection
		redirect($chemin_redirection,$data);
	}
}
?>
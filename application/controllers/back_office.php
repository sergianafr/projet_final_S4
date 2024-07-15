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
		$chemin_redirection = "back_office/home"; 
		// Verification du compte
		
		// Redirection
		redirect($chemin_redirection);
	}
	function home(){
		$data['contents'] = "front_office/home";
		$chemin_view= "templates/front_office_template";
		$this->load->view($chemin_view,$data);
	}
}
?>
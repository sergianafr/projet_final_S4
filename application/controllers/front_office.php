<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class front_office extends CI_Controller {
    /**
     * Login page for front-office login 
     */
	function login() {
		// La liste des types de voitures
		$data['types_voiture'] = [
			'Leger','4x4','Utilitaire'
		];
		// Recuperation du template de login
		$this->load->view('front_office/login',$data);
	}

	/**
	 * athentification du client
	 */
	function auth_client(){
		$chemin_redirection = "front_office/home";
		// Verification du compte

		// Redirection
		redirect($chemin_redirection);
	}
}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FrontOffice extends CI_Controller {
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
}
?>
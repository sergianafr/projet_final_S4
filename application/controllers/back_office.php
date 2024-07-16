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
		$data['contents'] = "back_office/home";
		$chemin_view= "templates/back_office_template";
		$this->load->view($chemin_view,$data);
	}
	/**
	 * Acces a la page de service
	 */
	function service(){
		// La liste des services
		$data['services'] = ['servic1','servic2','servic3'];
		$data['contents'] = "back_office/service/service";
		$this->load->view('templates/back_office_template',$data);
	}
	/**
	 * Acces a la page de dvis
	 */
	function devis(){
		// La liste des services
		$data['devis'] = ['devis1','devis2','devis3'];
		$data['contents'] = "back_office/devis";
		$this->load->view('templates/back_office_template',$data);
	}
	/**
	 * Acces a la page de calendrier de rendez-vous
	 */
	function rendez_vous(){
		// La liste des services
		// La liste des services
		$data['services'] = ['Simple','Standard','Complexe','Entretient'];
		// Heure d'ouverture (min)
		$data['heure_debut'] = "08:00";
		// Heure de fermeture (max)
		$data['heure_fin'] = "18:00";
		$data['clients'] = ['user1','user2','user3'];
		$data['rdv'] = ['rdv1','rdv2','rdv3'];
		$data['contents'] = "back_office/rendez_vous";
		$this->load->view('templates/back_office_template',$data);
	}
	/**
	 * Acces a la page de date reference
	 */
	function date_reference(){
		// La date de reference actuelle
		$data['date_actuelle'] = "7/16/2024";

		// Affichage de la view
		$data['contents']= 'back_office/date_reference' ;
		$this->load->view('templates/back_office_template',$data);
	}

	/**
	 * Reinitialisation des donnees
	*/
	function reset_data(){
		
	}
}
?>
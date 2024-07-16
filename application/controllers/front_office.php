<?php
defined('BASEPATH') or exit('No direct script access allowed');

class front_office extends CI_Controller
{
	/**
	 * Login page for front-office login 
	 */
	function login()
	{
		$this->session->sess_destroy();
		// La liste des types de voitures
		$data['types_voiture'] = [
			'Leger', '4x4', 'Utilitaire'
		];
		
		$this->load->view('front_office/login', $data);
	}

	/**
	 * Page d'accueil du front office
	 */
	function home()
	{
		$data['contents'] = "front_office/home";
		$chemin_view = "templates/front_office_template";
		$this->load->view($chemin_view, $data);
	}

	/**
	 * Prendre rendez-vouz
	 */
	function rendez_vous()
	{
		$this->load->model("type_service_model", "ts");
		$data['services'] = $this->ts->get_all();

		// Heure d'ouverture (min)
		$data['heure_debut'] = "08:00";
		// Heure de fermeture (max)
		$data['heure_fin'] = "18:00";

		// Chemin page rendez-vouz
		$data['contents'] = "front_office/rendez_vous";
		// Template Front Office
		$chemin_view = "templates/front_office_template";
		$this->load->view($chemin_view, $data);
	}
}

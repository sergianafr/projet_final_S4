<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Front_office extends CI_Controller
{
	/**
	 * Login page for front-office login 
	 */
	function login()
	{
		$this->session->sess_destroy();

		$this->load->model('CRUD_model', 'crud');
		$data['types_voiture'] = $this->crud->get_all('garage_type_vehicule');
		
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

		$data['heure_debut'] = "08:00";
		$data['heure_fin'] = "18:00";

		$data['contents'] = "front_office/rendez_vous";
		$chemin_view = "templates/front_office_template";
		$this->load->view($chemin_view, $data);
	}
}

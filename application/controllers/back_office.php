<?php
defined('BASEPATH') or exit('No direct script access allowed');

class back_office extends CI_Controller
{
	public $form_validation;
	public $admin;
	public $ts;
	public $crud;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model', 'admin');
		$this->load->model('CRUD_model', 'crud');
		$this->load->model("type_service_model", "ts");
		$this->load->library('form_validation');
	}

	function login()
	{
		$this->load->view('back_office/login');
	}

	function auth()
	{
		$this->form_validation->set_rules('login', 'Login', 'required');
		$this->form_validation->set_rules('pwd', 'Password', 'required');

		header('Content-Type: application/json');
		if ($this->form_validation->run() == FALSE) {
			http_response_code(412);
			echo json_encode(['status' => 'error', 'errors' => validation_errors()]);
		} else {
			$login = $this->input->post('login');
			$password = $this->input->post('pwd');
			$admin = $this->admin->ok_login($login, $password);

			if ($this->admin->existe_login($login) == null) {
				echo json_encode(['status' => 'error-login']);
			} else if ($admin == null) {
				echo json_encode(['status' => 'error-pwd']);
			} else {
				$id_admin = intval($admin['id']);
				$this->session->set_userdata('id_admin', $id_admin);
				echo json_encode(['status' => 'success']);
			}
		}
	}

	function home()
	{
		$data['contents'] = "back_office/home";
		$chemin_view = "templates/back_office_template";
		$this->load->view($chemin_view, $data);
	}

	function service()
	{
		$data['services'] = $this->ts->get_all();
		$data['contents'] = "back_office/service/service";
		$this->load->view('templates/back_office_template', $data);
	}

	function devis()
	{
		$data['devis'] = $this->crud->get_all('v_devis');
		$data['contents'] = "back_office/devis";
		$this->load->view('templates/back_office_template', $data);
	}

	function rendez_vous()
	{
		$data['services'] = $this->crud->get_all('type_service');
		$data['clients'] = $this->crud->get_all('client');

		$heure_travail = $this->crud->get_all('heure_travail')[0];
		$data['heure_debut'] = $heure_travail['debut'];
		$data['heure_fin'] = $heure_travail['fin'];

		$data['rdv'] = [
			// Un crochet correspond a un rdv
			// title -> le contenu a afficher ( l'heure du rendez vous + service) 
			// start -> le jour de rendez-vous
			[
				'title' => "08h - Standard",
				'start' => "2024-07-16"
			],
			[
				'title' => "09h - Meeting",
				'start' => "2024-07-17"
			]
		];
		$data['contents'] = "back_office/rendez_vous";
		$this->load->view('templates/back_office_template', $data);
	}

	function date_reference()
	{
		$this->load->model('date_reference_model', 'date_ref');
		$dt = $this->date_ref->get_last();
		if ($dt != null) {
			$data['date_actuelle'] = $dt['date_reference'];
		} else {
			$data['date_actuelle'] = null;
		}

		$data['contents'] = 'back_office/date_reference';
		$this->load->view('templates/back_office_template', $data);
	}

	function reset_data()
	{
		$this->crud->clear_tables_data();
		redirect('back_office/home');
	}

	function sign_out()
	{
		$this->session->sess_destroy();
		redirect('back_office/login');
	}	

	/**
	 * Formulaire d'importation de donnees
	 */
	function donnees_csv()
	{
		$data['contents'] = 'back_office/donnees';
		$this->load->view('templates/back_office_template', $data);
	}
	/**
	 * Recupere le contenu des fichiers et insertion dans la base de donnee
	 */
	function import_files()
	{
		// Recuperation du chemin des fichiers

		// Recuperation des contenus

		// Tentative d'insertion

		// Redirection
		redirect('back_office/donnees_csv');
	}

	function slot()
	{
		// Recuperation de date filtre
		$date_filtre = null;
		// La liste des slots
		// Les details sur les slots
		$data['slots'] = ['A', 'B', 'C'];

		// Filtrer par date et slot
		if ($date_filtre == null) {
			// La date filter est la date de reference
			$date_filtre = '2024-07-16';
		}
		// Recuperation de la liste des voitures qui utilisent le slot pour la date donnee
		foreach ($data['slots'] as $index => $slot) {
			// La liste des voitures d'une slot par son id et la date de filtre
			$data['voitures'][$index] = ['voiture1', 'voiture2', 'voiture3'];
		}
		// Affichage de la view
		$data['contents'] = 'back_office/slot';
		$this->load->view('templates/back_office_template', $data);
	}
	/**
	 * Affichage du dashbord
	 */
	function dashbord(){
		// Recuperation des variables necessaires
		$data['contents'] = "back_office/dashbord";
		$this->load->view('templates/back_office_template',$data);
	}
}

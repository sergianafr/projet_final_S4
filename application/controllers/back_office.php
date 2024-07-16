<?php
defined('BASEPATH') or exit('No direct script access allowed');

class back_office extends CI_Controller
{
	public $form_validation;
	public $admin;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model', 'admin');
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

	/**
	 * Acces a la page de service
	 */
	function service()
	{
		// La liste des services
		$data['services'] = ['servic1', 'servic2', 'servic3'];
		$data['contents'] = "back_office/service/service";
		$this->load->view('templates/back_office_template', $data);
	}
	/**
	 * Acces a la page de dvis
	 */
	function devis()
	{
		// La liste des services
		$data['devis'] = ['devis1', 'devis2', 'devis3'];
		$data['contents'] = "back_office/devis";
		$this->load->view('templates/back_office_template', $data);
	}
	/**
	 * Acces a la page de calendrier de rendez-vous
	 */
	function rendez_vous()
	{
		$this->load->model("type_service_model", "ts");
		$data['services'] = $this->ts->get_all();

		$data['heure_debut'] = "08:00";
		$data['heure_fin'] = "18:00";
		$data['clients'] = ['user1','user2','user3'];
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
	 * Reinitialisation des donnees de la base
	 */
	function reset_data(){
		// Suppression des donnees de la base

		// Retour a la page d'accueil ou dashbord
		redirect('back_office/home');
	}
	/**
	 * Formulaire d'importation de donnees
	 */
	function donnees_csv(){
		$data['contents']= 'back_office/donnees' ;
		$this->load->view('templates/back_office_template',$data);
	}
	/**
	 * Recupere le contenu des fichiers et insertion dans la base de donnee
	 */
	function import_files(){
		// Recuperation du contenu
	}
}

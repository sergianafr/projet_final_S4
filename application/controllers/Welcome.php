<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function about()
	{
		$this->load->view('welcome_message');
	}
	
	function index(){  
		// définition des données variables du template
		$data['title'] = 'Le titre de la page';
		$data['description'] = 'La description de la page pour les moteurs de recherche';
		$data['keywords'] = 'les, mots, clés, de, la, page';
		// on charge la view qui contient le corps de la page
		$data['contents'] = 'bellePage';
		// on charge la page dans le template
		$this->load->view('templates/template', $data);
	}

	function services(){ 
		// définition des données variables du template
		$data['title'] = 'Le titre de la page';
		$data['description'] = 'La description de la page pour les moteurs de recherche';
		$data['keywords'] = 'les, mots, clés, de, la, page';
		// on charge la view qui contient le corps de la page
		$data['contents'] = 'services';
		// on charge la page dans le template
		$this->load->view('templates/services', $data);
	}

}

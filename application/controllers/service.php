<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class service extends CI_Controller {
    /**
	 * Redirection vers la page d'insertion
	 */
    function formulaire(){
        $data['service'] = null;
        $data['contents'] = "back_office/service/formulaire_service";
		$this->load->view('templates/back_office_template',$data);
    }
    /**
     * Insertion 
     */
    function insertion(){
        // Recuperation des donneess

        // Insertion

        // Redirection vers la liste des services
        redirect('back_office/service');
    }
    /**
     * Redirection vers la page d'insertion avec le service a modifier
     */
    function modifier() {
        // Recuperation de l'id par l'url

        // Recuperation du service par l'id
        $service = "null";
        // Afficher le formulaire preremplie
        $data['service'] = $service;
        $data['contents'] = "back_office/service/formulaire_service";
        $this->load->view('templates/back_office_template',$data);
    }
    /**
     * Modification d'un service
     */
    function modification() {
        // Recuperation des informations du service
        
        // Redirection vers la liste des services
		redirect('back_office/service');
	}
    function supprimer() {
        // Recuperation de l'id par l'url

        // Suppression du service

        // Redirection vers la liste des services
        redirect('back_office/service');

    }
}
?>
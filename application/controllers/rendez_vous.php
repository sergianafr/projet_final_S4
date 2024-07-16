<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Controller pour les actions sur le rendez-vous
 */
class rendez_vous extends CI_Controller {
    
    /**
     * Utiliser pour qu'un client prenne rendez-vous
    */
    function prendre_rendez_vous(){
        // Recuperation des variables

        // Logique de prise de rendez-vous

        // Redirection vers la page d'insertion
        redirect('front_office/rendez_vous');
    }
    /**
     * Recuperation de pdf du devis des services
     */
    function  devis_pdf(){
        // Generer pdf

        
        redirect('front_office/rendez_vous');
    }
	
}
?>
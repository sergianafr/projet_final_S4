<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Controller pour les actions sur le rendez-vouz
 */
class rendez_vouz extends CI_Controller {
    
    /**
     * Utiliser pour qu'un client prenne rendez-vouz
    */
    function prendre_rendez_vous(){
        // Recuperation des variables

        // Logique de prise de rendez-vouz

        // Redirection vers la page d'insertion
        redirect('front_office/rendez_vouz');
    }
    /**
     * Recuperation de pdf du devis des services
     */
    function  devis_pdf(){
        // Generer pdf

        
        redirect('front_office/rendez_vouz');
    }
	
}
?>
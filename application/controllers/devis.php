<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class devis extends CI_Controller {
    
    function payement(){
        // Recuperation de l'id et la date de payement

        // Redirection vers la liste des devis
        redirect('back_office/devis');
    }
}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class type_vehicule_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->helper('csvimport');
        $this->load->helper('dateformat');
        $this->load->model('travaux_temp_model');
    }
    
    public function import_csv($fileName){
        
        $query = "INSERT INTO type_vehicule(libelle) SELECT DISTINCT type_voiture FROM travaux_temp";
        $this->db->query($query);
    }


}
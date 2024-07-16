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
        
        $query = "INSERT INTO garage_type_vehicule(libelle) SELECT DISTINCT type_voiture FROM garage_travaux_temp";
        $this->db->query($query);
    }

    public function get_by_name($name){
        $query = $this->db->query('SELECT * FROM garage_type_vehicule WHERE libelle=?', $name);
        $res = $query->row_array();

        return $res;
    }

}
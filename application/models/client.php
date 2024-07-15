<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class client extends CI_Model {

    /* Creation compte client qui prend comme argument un tableau associatif 
    ayant comme données le numero matricule et l'id du type de la voiture*/
    public function creer_compte($user){
        $this->db->insert('client', $user);
    }

    // recuperation client
    public function login($num_matricule){
        $num_matricule = $this->db->escape($num_matricule);
        // $num_matricule = "'".$num_matricule."'";
        $query=$this->db->query('SELECT * FROM client WHERE num_matricule=' . $num_matricule);
        $res=$query->row_array();

        
        return $res;
    }



}
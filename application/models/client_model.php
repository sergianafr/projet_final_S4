<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class client_model extends CI_Model {

    /* Creation compte client qui prend comme argument un tableau associatif 
    ayant comme données le numero matricule et l'id du type de la voiture*/
    public function creer_compte($user){
        if(!isset($user['id'])){
            $user['id'] = 'default';
        }
        $this->db->insert('client', $user);

        return $this->db->insert_id();
    }

    // recuperation client
    public function login($num_matricule){
        $num_matricule = $this->db->escape($num_matricule);
        // $num_matricule = "'".$num_matricule."'";
        $query=$this->db->query('SELECT * FROM garage_client WHERE num_matricule = ' . $num_matricule);
        $res=$query->row_array();

        // return null si le client n'existe pas
        // return un tableau associatif representant chaque colonne de la table et leur donnees respectifs
        return $res;
    }

    public function import_csv(){
        
        $query = "INSERT INTO garage_client(num_matricule, id_type_vehicule) SELECT DISTINCT voiture, type_vehicule.id as id from garage_travaux_temp join garage_type_vehicule on garage_type_vehicule.libelle = garage_travaux_temp.type_voiture";
        $this->db->query($query);
    }
}
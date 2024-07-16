<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class admin_model extends CI_Model {

    public function login($pseudo){
        $num_matricule = $this->db->escape($pseudo);
        
        $query=$this->db->query('SELECT * FROM admin WHERE =' . $pseudo);
        $res=$query->row_array();

        // return null si l'user n'existe pas
        // return un tableau associatif representant chaque colonne de la table et leur donnees respectifs
        return $res;
    }
}
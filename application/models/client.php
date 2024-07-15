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
        $sql = "SELECT * FROM client WHERE num_matricule='$num_matricule'";
        $query=$this->db->query($sql);
        $res=null;

        // retourne un tableau associatif ayant comme colonne chaque colonne de la table client
        foreach($query->result_array() as $r) {
            $res=$r;
        }
        return $res;
    }



}
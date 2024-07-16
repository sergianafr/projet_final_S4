<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin_model extends CI_Model
{
    public function existe_login($pseudo)
    {
        $query = $this->db->query("SELECT * FROM garage_admin WHERE pseudo = '$pseudo'");
        $res = $query->row_array();

        // return null si l'user n'existe pas
        // return un tableau associatif representant chaque colonne de la table et leur donnees respectifs
        return $res;
    }

    public function ok_login($pseudo, $password)
    {
        $query = $this->db->query("SELECT * FROM garage_admin WHERE pseudo = '$pseudo' AND mdp = '$password' ");
        $res = $query->row_array();

        // return null si l'user n'existe pas
        // return un tableau associatif representant chaque colonne de la table et leur donnees respectifs
        return $res;
    }
}

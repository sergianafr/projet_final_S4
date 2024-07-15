<?php
defined('BASEPATH') or exit('No direct script access allowed');

class type_service_model extends CI_Model
{

    // fonction qui recupere une ligne a partir de l'id
    public function get_by_id($id)
    {
        $query = $this->db->query('SELECT * FROM type_service WHERE id=?', $id);
        $res = $query->row_array();

        // retourne un tableau associatif de type 
        // $res['id'], $res['libelle], $res['duree'], $res['prix']
        return $res;
    }

    // fonction qui recupere tout les elements de type_service
    public function get_all()
    {
        $query = $this->db->get('type_service');
        return $query->result_array();
    }
}

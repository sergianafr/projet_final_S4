<?php
defined('BASEPATH') or exit('No direct script access allowed');

class date_reference_model extends CI_Model
{

    // fonction qui recupere la date de reference actuelle
    public function get_last()
    {
        $query = $this->db->query('SELECT * FROM date_reference WHERE id=(select max(id) from date_reference)');
        $res = $query->row_array();

        // retourne un tableau associatif de type 
        // $res['id'], $res['date_reference']
        return $res;
    }
}

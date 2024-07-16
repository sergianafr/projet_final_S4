<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Date_reference_model extends CI_Model
{
    public function get_last()
    {
        $query = $this->db->query('SELECT * FROM garage_date_reference WHERE id=(select max(id) from garage_date_reference)');
        $res = $query->row_array();

        // retourne un tableau associatif de type 
        // $res['id'], $res['date_reference']
        return $res;
    }
}

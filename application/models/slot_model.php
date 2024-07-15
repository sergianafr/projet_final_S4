<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class rendez_vous_model extends CI_Model {

    public function get_slots_disponibles($date_debut, $date_fin) {
        $query=$this->db->query('call slots_disponibles(?, ?)', $date_debut, $date_fin);
        $result = $$query->result();
        
        $res = [];
        foreach($result as $row){
            $res[]=$row;
        }

        return $res;
    }
    
}
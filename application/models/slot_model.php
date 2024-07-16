<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Slot_model extends CI_Model
{

    public function get_slots_disponibles($date_debut, $date_fin)
    {
        $my = "call garage_slots_disponibles('$date_debut', '$date_fin')";
        $query=$this->db->query($my);
        $result = $query->result();

        $res = [];
        foreach($result as $row){
            $res[]=$row;
        }

        return $res;
    }

    public function get_all()
    {
        $query = $this->db->get('slot');
        return $query->result_array();
    }

    // $slot['libelle']
    public function insert($slot)
    {
        if (!isset($slot['id'])) {
            $slot['id'] = 'default';
        }
        $this->db->insert('garage_slot', $slot);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('garage_slot');
        return $this->db->affected_rows();
    }

    // $new_data est un tableau associatif ayant comme colonnes les nouveaux donnees
    public function update($id, $new_data)
    {
        $this->db->where('id', $id);
        $this->db->update('garage_slot', $new_data);
    }
}

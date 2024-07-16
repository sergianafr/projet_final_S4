<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CRUD_model extends CI_Model
{
    public function clear_tables_data() {
        $tables = array('slot', 'type_service', 'type_vehicule', 'client', 'rendez_vous', 'date_reference', 'details_rdv');
        foreach ($tables as $table) {
            $this->db->empty_table($table);
        }
        echo "Toutes les tables ont été vidées.";
    }

    public function get_all($table_name)
    {
        $query = $this->db->get($table_name);
        return $query->result_array();
    }

    
    public function get_by_id($id, $table_name)
    {
        $query = $this->db->query("SELECT * FROM $table_name WHERE id = $id");
        return $query->row_array();
    }

    // $data est un tableau associatif dont chaque colonne correspond aux colonnes de la table 
    public function insert($data, $nom_table)
    {
        if (!isset($data['id'])) {
            $data['id'] = 'default';
        }
        $this->db->insert($nom_table, $data);
    }

    public function delete($id, $nom_table)
    {
        $this->db->where('id', $id);
        $this->db->delete($nom_table);
        return $this->db->affected_rows();
    }

    // $new_data est un tableau associatif ayant comme colonnes les nouveaux donnees
    public function update($id, $new_data, $nom_table)
    {
        $this->db->where('id', $id);
        $this->db->update($nom_table, $new_data);
    }
}

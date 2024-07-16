<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Type_service_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('CRUD_model');
        $this->load->model('services_temp_model', 's_temp');
    }
    // fonction qui recupere une ligne a partir de l'id
    public function get_by_id($id)
    {
        $query = $this->db->query('SELECT * FROM garage_type_service WHERE id=?', $id);
        $res = $query->row_array();

        // retourne un tableau associatif de type 
        // $res['id'], $res['libelle], $res['duree'], $res['prix']
        return $res;
    }

    // fonction qui recupere tout les elements de type_service
    public function get_all()
    {
        $query = $this->db->get('garage_type_service');
        return $query->result_array();
    }

    // La seule fonction a appeler pour importer un csv dans base 
    public function import_csv($fileName){
        $errors = $this->s_temp->save_to_temp($fileName);
        if (count($errors) > 0) return $errors;

        $query = "INSERT INTO garage_type_service(libelle, duree) SELECT DISTINCT * FROM garage_services_temp";
        $this->db->query($query);
    }
    
    public function update($id, $new_data){
        $this->db->where('id', $id);
        $this->db->update('garage_type_service', $new_data);
    }
}

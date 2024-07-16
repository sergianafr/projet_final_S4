<?php
defined('BASEPATH') or exit('No direct script access allowed');

class montant_type_service_model extends CI_Model
{
    public function get_montant_actu($id_service){
        $query = "SELECT max(id) as id, id_type_service, montant, date_debut FROM garage_montant WHERE id_service = $id_service";
        $this->db->query($query);
    }

    public function import_csv($fileName){
        
        $query = "INSERT INTO garage_montant_type_service(id_type_service, montant) SELECT DISTINCT type_service.id,  montant from garage_travaux_temp join garage_type_service on garage_type_service.libelle = garage_travaux_temp.type_service";
        $this->db->query($query);
    }
}
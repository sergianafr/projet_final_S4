<?php
defined('BASEPATH') or exit('No direct script access allowed');

class montant_type_service_model extends CI_Model
{
    public function get_montant_actu($id_service){
        $query = "SELECT max(id) as id, id_type_service, montant, date_debut FROM montant WHERE id_service = $id_service";
        $this->db->query($query);
    }

    public function import_csv($fileName){
        
        $query = "INSERT INTO montant_type_service(id_type_service, montant) SELECT DISTINCT type_service.id,  montant from travaux_temp join type_service on type_service.libelle = travaux_temp.type_service";
        $this->db->query($query);
    }
}
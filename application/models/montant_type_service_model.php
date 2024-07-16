<?php
defined('BASEPATH') or exit('No direct script access allowed');

class montant_type_service_model extends CI_Model
{
    public function get_montant_actu($id_service){
        $query = "SELECT mt.id, mt.id_type_service, mt.montant, mt.date_debut
            FROM (
                SELECT MAX(id) as max_id, id_type_service
                FROM montant_type_service
                WHERE id_type_service = $id_service
                GROUP BY id_type_service
            ) AS subquery JOIN montant_type_service mt ON subquery.max_id = mt.id";
        $this->db->query($query);
    }

    public function import_csv($fileName){
        
        $query = "INSERT INTO montant_type_service(id_type_service, montant) SELECT DISTINCT type_service.id,  montant from travaux_temp join type_service on type_service.libelle = travaux_temp.type_service";
        $this->db->query($query);
    }
}
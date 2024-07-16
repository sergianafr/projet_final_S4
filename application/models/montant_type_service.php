<?php
defined('BASEPATH') or exit('No direct script access allowed');

class montant_type_service extends CI_Model
{
    public function get_montant_actu($id_service){
        $query = "SELECT max(id) as id, id_type_service, montant, date_debut FROM montant WHERE id_service = $id_service";
        $this->db->query($query);
    }
}
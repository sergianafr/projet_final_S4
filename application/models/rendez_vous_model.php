<?php
defined('BASEPATH') or exit('No direct script access allowed');

class rendez_vous_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('dateformat');
        $this->load->model('slot_model');
        $this->load->model('type_service_model'); 
        $this->load->model('date_reference_model');
        $this->load->model('montant_type_service_model');
    }

    // fonction qui crée un rendez-vous et insere les données dans la table details_rdv
    // Recuperer le id_slot a partir de la fonction slots_disponibles dans slot_model
    // Recuperer date_prise_rdv dans le model date_reference_model avec la fonction get_last()
    public function creer_rdv($id_client, $date_rdv, $date_prise_rdv, $id_type_service, $id_slot)
    {
        $rdv = [
            'id' => 'default',
            'id_client' => $id_client,
            'debut' => $date_rdv,
            'date_prise_rdv' => $date_prise_rdv,
            'id_type_service' => $id_type_service,
            'id_slot' => $id_slot
        ];

        // recuperation typeservice choisit
        $type_service = $this->type_service_model->get_by_id($id_type_service);
        $rdv['devis'] = $this->montant_type_model->get_montant_actu($id_type_service);

        $this->db->insert('rendez_vous', $rdv);

        // dernier id de rdv inseré
        $id_RDV = $this->db->insert_id();

        $details_rdv = [
            'id' => 'default',
            'idRDV' => $id_RDV,
            'date_heure_debut' => $date_rdv,
            'idSlot' => $id_slot,
            'duree' => $type_service['duree'],
            'date_heure_fin' => get_date_fin($date_rdv, $type_service['duree'])
        ];
        $this->db->insert('details_rdv', $details_rdv);
    }

    public function add_date_payement($id_rdv, $date)
    {
        $this->db->set('date_payement', $date);
        $this->db->where('id', $id_rdv);
        $this->db->update('rendez_vous');
    }
}

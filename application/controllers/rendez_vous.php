<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Controller pour les actions sur le rendez-vous
 */
class rendez_vouz extends CI_Controller
{
    public $form_validation;
    public $slot;
    public $type_service;
    public $input;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('slot_model', 'slot');
        $this->load->model('type_service_model', 'type_service');
        $this->load->helper('dateformat');
        $this->load->library('form_validation');
    }

    public function verify()
    {
        $this->form_validation->set_rules('date_rdv', 'Date Rendez-vous', 'required');
        $this->form_validation->set_rules('heure_rdv', 'Heure Rendez-vous', 'required');
        $this->form_validation->set_rules('service', 'Service', 'required');

        header('Content-Type: application/json');
        if ($this->form_validation->run() == FALSE) {
            http_response_code(412);
            echo json_encode(['status' => 'error', 'errors' => validation_errors()]);
        } else {
            $date_rdv = $this->input->post('date_rdv');
            $heure_debut = $this->input->post('heure_rdv');
            $service = intval($this->input->post('service'));

            $type_service = $this->type_service->get_by_id($service);
            $date_fin = get_date_fin($heure_debut, $type_service['duree']);
            $date_debut = get_date($date_rdv, $heure_debut);

            echo json_encode(['debut' => $date_debut, 'fin' => $date_fin]);

            $slot_dispo = $this->slot->get_slots_disponibles($date_debut, $date_fin);
            if (count($slot_dispo) > 0) {
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'impossible']);
            }

            // echo json_encode(['slot' => $slot_dispo]);
            // TODO
            // -- slot dipso
            // validation du rdv
        }
    }

    /**
     * Utiliser pour qu'un client prenne rendez-vouz
     */
    function prendre_rendez_vous()
    {
        // Recuperation des variables

        // Logique de prise de rendez-vous

        // Redirection vers la page d'insertion
        redirect('front_office/rendez_vous');
    }

    /**
     * Recuperation de pdf du devis des services
     */
    function  devis_pdf()
    {
        // Generer pdf
        redirect('front_office/rendez_vous');
    }
}

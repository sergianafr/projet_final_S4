<?php
defined('BASEPATH') or exit('No direct script access allowed');

class service extends CI_Controller
{
    public $ts;
    public $input;
    public $form_validation;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('type_service_model', 'ts');
        $this->load->library('form_validation');
    }

    /**
     * Redirection vers la page d'insertion
     */
    function formulaire()
    {
        $data['service'] = null;
        $data['contents'] = "back_office/service/formulaire_service";
        $this->load->view('templates/back_office_template', $data);
    }
    /**
     * Insertion 
     */
    function insertion()
    {
        // Recuperation des donneess

        // Insertion

        // Redirection vers la liste des services
        redirect('back_office/service');
    }

    /**
     * Redirection vers la page d'insertion avec le service a modifier
     */
    function modifier()
    {
        $id_service = intval($this->input->get('id_service'));
        $data['service'] = $this->ts->get_by_id($id_service);
        
        $data['contents'] = "back_office/service/formulaire_service";
        $this->load->view('templates/back_office_template', $data);
    }
    /**
     * Modification d'un service
     */
    function modification()
    {
        $this->form_validation->set_rules('libelle', 'Libelle', 'required');
        $this->form_validation->set_rules('duree', 'Duree', 'required');
        $this->form_validation->set_rules('prix', 'Prix', 'required');

        header('Content-Type: application/json');
        if ($this->form_validation->run() == FALSE) {
            http_response_code(412);
            echo json_encode(['status' => 'error', 'errors' => validation_errors()]);
        } else {
            $new = [
                'libelle' => $this->input->post('libelle'),
                'duree' => $this->input->post('duree'),
                'prix' => $this->input->post('prix'),
            ];
            $id_service = intval($this->input->post('id_service'));
            $this->ts->update($id_service, $new);  
        }
        redirect('back_office/service/service');
    }

    function supprimer()
    {
        // Recuperation de l'id par l'url

        // Suppression du service

        // Redirection vers la liste des services
        redirect('back_office/service');
    }
}

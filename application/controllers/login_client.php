<?php
defined('BASEPATH') or exit('No direct script access allowed');

class login_client extends CI_Controller
{

    public $form_validation;
    public $client;
    public $home_client = "front_office/home";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('client_model', 'client');
        $this->load->library('form_validation');
    }

    public function home_account()
    {
        $account = [
            'num_matricule' => $this->input->post('matricule'),
            'id_type_vehicule' => $this->input->post('type_voiture')
        ];

        $this->client->creer_compte($account);
        $this->session->set_userdata($account);
        $this->load->view($this->home_client);
    }

    public function home()
    {
        $account = [
            'num_matricule' => $this->input->post('matricule'),
            'id_type_vehicule' => $this->input->post('type_voiture')
        ];
        $this->session->set_userdata($account);
        $this->load->view($this->home_client);
    }

    public function verify()
    {
        $this->form_validation->set_rules('matricule', 'No Matricule', 'required');
        $this->form_validation->set_rules('type_voiture', 'Type voiture', 'required');

        header('Content-Type: application/json');
        if ($this->form_validation->run() == FALSE) {
            http_response_code(412);
            echo json_encode(['status' => 'error', 'errors' => validation_errors()]);
        } else {
            $matricule = $this->input->post('matricule');
            $type_voiture = $this->input->post('type_voiture');
            $result = $this->client->login($matricule);
            if ($result === null) {
                echo json_encode(['status' => 'create']);
            } else if ($result['id_type_vehicule'] != $type_voiture) {
                echo json_encode(['status' => 'wrong']);
            } else {
                echo json_encode(['status' => 'success']);
            }
        }
    }
}

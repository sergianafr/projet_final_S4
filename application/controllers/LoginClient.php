<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginClient extends CI_Controller
{

    public $form_validation;
    public $client;
    public $login_client = "welcome_message";
    public $home_client = "";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('client_model', 'client');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view($this->login_client);
    }

    public function home()
    {
        $this->client->creer_compte([
            'num_matricule' => $this->input->post('matricule'),
            'id_type_vehicule' => $this->input->post('type_voiture')
        ]);
        // set data in session
        $this->load->view($this->home_client);
    }

    public function verify()
    {
        $this->form_validation->set_rules('matricule', 'No Matricule', 'required');
        $this->form_validation->set_rules('type_voiture', 'Type voiture', 'required');

        header('Content-Type: application/json');
        if ($this->form_validation->run() == FALSE) { 
            // Validation des inputs
            http_response_code(412);
            echo json_encode(['status' => 'error', 'errors' => validation_errors()]);
        } else {
            $matricule = $this->input->post('matricule');
            $id_type_voiture = $this->input->post('type_voiture');
            $result = $this->client->login($matricule, $id_type_voiture);

            if ($result === null) {
                echo json_encode(['status' => 'create']);
            }
            else {
                echo json_encode(['status' => 'maybe', 'row' => $result]);
            }
        }
    }
}

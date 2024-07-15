<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginClient extends CI_Controller
{

    public $form_validation;
    public $auth;
    public $login_client = "welcome_message";
    public $home_client = "";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model', 'auth');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view($this->login_client);
    }

    public function home()
    {
        $this->load->view($this->home_client);
    }

    public function verify()
    {
        $this->form_validation->set_rules('no', 'Name', 'required');
        $this->form_validation->set_rules('type', 'Description', 'required');

        header('Content-Type: application/json');
        if ($this->form_validation->run() == FALSE) { // Validation des inputs
            http_response_code(412);
            echo json_encode(['status' => 'error', 'errors' => validation_errors()]);
        } else {
            if ($this->auth->authenticate()) {
                // On success -> send JSON ok to authorize redirection
                echo json_encode(['status' => 'success']);
            } else {
                // Else -> send JSON error to ask account creation
                echo json_encode(['status' => 'error', 'errors' => 'account_creation']);
            }
        }
    }
}

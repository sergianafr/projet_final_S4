<?php
defined('BASEPATH') or exit('No direct script access allowed');

class test_back extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('client_model'); 
        $this->load->model('type_service_model'); 
        $this->load->model('rendez_vous_model'); 
    }
    public function index(){
        var_dump($this->rendez_vous_model->add_date_payement(1, '2024-07-09'));
        
    }
}
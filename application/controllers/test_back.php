<?php
defined('BASEPATH') or exit('No direct script access allowed');

class test_back extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('client'); 
    }
    public function index(){
        $client = $this->client->login("6090TBB");
        echo($client);
        
    }
}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function authenticate()
    {
        $no = $this->input->post('no');
        $type = $this->input->post('type');
        return true;
    }
}

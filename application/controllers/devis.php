<?php
defined('BASEPATH') or exit('No direct script access allowed');

class devis extends CI_Controller
{

    public $rdv;
    public $crud;
    public $input;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('rendez_vous_model', 'rdv');
        $this->load->model('CRUD_model', 'crud');
    }

    function verify_pay_day()
    {
        $pay_day = $this->input->post('pay_day');
        $id_rdv = intval($this->input->post('id_rdv'));
        $rdv = $this->crud->get_by_id($id_rdv, 'garage_rendez_vous');

        $date_rdv = new DateTime($rdv['debut']);
        $date_rdv->setTime(0, 0, 0);
        $pay_day_date = new DateTime($pay_day);
        $pay_day_date->setTime(0,0,0);

        if ($date_rdv > $pay_day_date) {
            echo json_encode(['status' => 'no']);
        } elseif ($date_rdv <= $pay_day_date) {
            echo json_encode(['status' => 'ok']);
        }
    }

    function payement()
    {
        $id_rdv = intval($this->input->post('id_rdv'));
        $date = $this->input->post('pay_day');
        $this->rdv->add_date_payement($id_rdv, $date);

        redirect('back_office/devis');
    }
}

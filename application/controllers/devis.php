<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class devis extends CI_Controller {
    
    public $rdv;
    public $input;

    function payement(){
        $id_rdv = intval($this->input->post('id_rdv'));
        $date = $this->input->post('pay_day');

        $this->load->model('rendez_vous_model', 'rdv');
        $this->rdv->add_date_payement($id_rdv, $date);

        redirect('back_office/devis');
    }
}
?>
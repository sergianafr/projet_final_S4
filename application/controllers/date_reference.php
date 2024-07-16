<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Date_reference extends CI_Controller
{
    public $crud;
    public $input;

    /**
     * Modification de la date de reference
     */
    function modifier()
    {
        $this->load->model('CRUD_model', 'crud');
        $date_reference = $this->input->post('date_reference');
        $this->crud->insert(['date_reference' => $date_reference], 'garage_date_reference');

        // Redirection vers la page de formulaire
        redirect('back_office/date_reference');
    }
}

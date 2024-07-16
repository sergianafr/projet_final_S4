<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class services_temp_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->helper('csvimport');
        $this->load->model('CRUD_model');
    }

    public function save_to_temp($filename){
        // Step 1: Clear existing data
           
        $this->db->empty_table('services_temp');

        if (!is_readable($filename)) {
            throw new Exception("File not readable: " . $filename);
        }

        // Step 2: Insert data from csv into temp table
         // Adjust the file path accordinglyecho "midiiiiitra";
       
        if (($handle = fopen($filename, 'r')) !== FALSE) {

            if (($header = fgetcsv($handle, ',')) === FALSE) {
                throw new Exception("Failed to read the header row from the CSV file.");
            }

            
            while (($data = fgetcsv($handle,',')) !== FALSE) {
                if (count($data) == 2) {  // Ensure correct number of columns
                    $serv_data = array(
                        'service' => $data[0],  // Adjust the indexes according to the structure of your csv file
                        'duree' => $data[1]
                    );
                    
                    $this->db->insert('services_temp', $serv_data);
                }
            }
        }
        fclose($handle);
    }

   
    

   
}
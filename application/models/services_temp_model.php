<?php
defined('BASEPATH') or exit('No direct script access allowed');

class services_temp_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('csvimport');
        $this->load->model('CRUD_model');
    }

    public function save_to_temp($filename)
    {
        // Step 1: Clear existing data
        $errors = [];
        $this->db->empty_table('services_temp');

        if (!is_readable($filename)) {
            throw new Exception("File not readable: " . $filename);
        }

        $count_row = 1;
        // Step 2: Insert data from csv into temp table
        // Adjust the file path accordinglyecho "midiiiiitra";
        if (($handle = fopen($filename, 'r')) !== FALSE) {
            if (($header = fgetcsv($handle, 100000, ',')) === FALSE) {
                throw new Exception("Failed to read the header row from the CSV file.");
            }

            while (($data = fgetcsv($handle, 100000,',')) !== FALSE) {
                $insert = true;
                $count_row++;
                if (count($data) == 2) {  // Ensure correct number of columns
                    $serv_data = array(
                        'service' => $data[0],  // Adjust the indexes according to the structure of your csv file
                        'duree' => $data[1]
                    );
                    $pattern = '/^(?:[01]\d|2[0-3]):[0-5]\d$/';
                    if($serv_data['service'] == null){
                        $errors[] = "service null a la ligne ".$count_row;
                        $insert = false;
                    } 
                    if($serv_data['duree'] == null){
                        $errors[] = "duree null a la ligne ".$count_row;
                        $insert = false;
                    } else if(!preg_match($pattern, $serv_data['duree'])){
                        $errors['duree'] = "duree qui ne correspond pas au format d'heure".$count_row;
                        $insert = false;
                    }
                    if($insert){
                        $this->db->insert('services_temp', $serv_data);
                    }
                }
            }
        }
        fclose($handle);
        return $errors;
    }
}

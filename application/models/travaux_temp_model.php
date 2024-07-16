<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Travaux_temp_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->helper('csvimport');
        $this->load->helper('dateformat');
        $this->load->model('CRUD_model');
    }


    public function save_to_temp($filename){
        // Step 1: Clear existing data
        $errors = [];
        $this->db->empty_table('garage_travaux_temp');

        if (!is_readable($filename)) {
            throw new Exception("File not readable: " . $filename);
        }
        $count_row = 1;
        // Step 2: Insert data from csv into temp table
         // Adjust the file path accordinglyecho "midiiiiitra";
       
        if (($handle = fopen($filename, 'r')) !== FALSE) {
            
            if (($header = fgetcsv($handle, ',')) === FALSE) {
                throw new Exception("Failed to read the header row from the CSV file.");
            }

            
            while (($data = fgetcsv($handle,',')) !== FALSE) {
                $insert = true;
                $count_row++;
                if (count($data) == 7) { 
                    $trav_data = array(
                        'voiture' => $data[0],  // Adjust the indexes according to the structure of your csv file
                        'type_voiture' => $data[1],
                        'date_rdv' => $data[2],
                        'heure_rdv' => $data[3],
                        'type_service' => $data[4],
                        'montant' => $data[5],
                        'date_paiement' => $data[6]

                    );

                

                    // verification format data
                    $pattern = '/^(?:[01]\d|2[0-3]):[0-5]\d$/';

                    if($trav_data['voiture'] == null){
                        $errors[] = "voiture null a la ligne ".$count_row;
                        $insert = false;
                    } 
                    if($trav_data['type_voiture'] == null){
                        $errors[] = "type voiture null a la ligne ".$count_row;
                        $insert = false;
                    } 
                    if($trav_data['date_rdv'] == null){
                        $errors[] = "date rdv null a la ligne ".$count_row;
                        $insert = false;
                    } else if(!valid_format($trav_data['date_rdv'])){
                        $errors[] = "date rdv a format incompatible a jj/mm/aaaa ".$count_row;
                        $insert = false;
                    } 
                    $trav_data['date_rdv'] = transformDate($trav_data['date_rdv']);
                    $trav_data['date_paiement'] = transformDate($trav_data['date_paiement']);
                    if($trav_data['heure_rdv'] == null){
                        $errors[] = "heure rdv null a la ligne ".$count_row;
                        $insert = false;
                    } else if(!preg_match($pattern,$trav_data['heure_rdv'])){
                        $errors[] = "heure rdv a format incompatible ".$count_row;
                        $insert = false;
                    }
                    if($trav_data['type_service'] == null){
                        $errors[] = "type service null a la ligne ".$count_row;
                        $insert = false;
                    } 
                    if($trav_data['montant'] == null){
                        $errors[] = "montant null a la ligne ".$count_row;
                        $insert = false;
                    } 
                    
                    var_dump(($errors));
                    if($insert){
                        $this->db->insert('garage_travaux_temp', $trav_data);
                    }
                }
            }
        }
        fclose($handle);
        return $errors;
    }

   
    

   
}
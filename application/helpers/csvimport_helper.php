<?php if ( ! defined('BASEPATH')) exit('No direct script access 
allowed');
if ( ! function_exists('get_data_to_save')) {
    function get_data_to_save($tableName, $col_names, $fileName){
        $fp = fopen($fileName, "r+");
        $datas = [];
        $count = 1;
        if ($fp) {
            while (!feof($fp)) {
                $line = fgets($fp);
                $data = explode(",", $line);
                if($data == null){
                    $data = explode(";", $line);
                }
                if ($count > 1){
                    $to_save = array();
                    $i = 0;
                    foreach($col_names as $col){
                        $to_save[$col] = $data[$i];
                        $i++;
                    }
                    $datas[]=$to_save;
                }
                $count++;
            }
            fclose($fp);
        } else {
            // Error handling if fp cannot be opened
            echo "Unable to open fp.";
        }
        return $datas;
    }
}
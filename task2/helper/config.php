<?php

require_once __DIR__ . '/log.php';
require_once __DIR__ . "/../../../credential.php";

function db_connection(){
    try {
        // create connection using constants directly
        // The following DB_HOST,DB_USERNAME, DB_PASSWORD,DB_PASSWORD,DB_NAME are definned as constants inside credentials.php
        $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        logger(serialize($conn));
        // Check connection
        if ($conn->connect_error) {
           
            return null;
        }else{

            return $conn;
        }
    
        
    } catch (Exception $ex) {
        return null;
    }
}

?>
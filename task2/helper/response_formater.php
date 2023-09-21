<?php 

function response($data=null,$status = 200,$message = "Success"){
    $response = [
        "status"=> $status, 
        "message"=>$message,
        "data" =>$data,
       ];
    header('Content-Type: application/json');
    echo json_encode($response);
}


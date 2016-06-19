<?php
    // Connect to the database
    $db = new mysqli("localhost","root","","attmon");
    if($db->connect_error){
        $error= $db->connect_error;
    }
//  else{
//        echo "COnnection Succesfull";
//    }



<?php
    session_start();
    

    $conn = new mysqli("localhost","root","","crudphp");

    if($conn->connect_errno){
        die("Fail to connect mysql: ".$conn->connect_error);
    }
?>
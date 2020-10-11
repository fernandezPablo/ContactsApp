<?php
    session_start();

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "crudphp";

    $conn = new mysqli($host,$user,$pass,$db);

    if($conn->connect_errno){
        die("Fail to connect mysql: ".$conn->connect_error);
    }
?>
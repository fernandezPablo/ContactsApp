<?php
    session_start();

    $host = "qf5dic2wzyjf1x5x.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    $user = "t92ehk92dp4sdira";
    $pass = "x4c57qt0dmamvl72";
    $db = "kjl3o217yheevyn8";

    $conn = new mysqli($host,$user,$pass,$db);

    if($conn->connect_errno){
        die("Fail to connect mysql: ".$conn->connect_error);
    }
?>
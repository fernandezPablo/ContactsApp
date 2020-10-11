<?php
    include('connection.php');

    if(isset($_GET['id'])){

        $id = $_GET['id'];
        $stmt = $conn->prepare("DELETE FROM contacts WHERE id = ?");
        $stmt->bind_param("s",$id);
        if($stmt->execute()){
            $_SESSION['message'] = "The contact was successfuly deleted!";
            $_SESSION['message_type'] = "success";
        }
        else{
            $_SESSION['message'] = "Sorry, we cant delete the contact :(";
            $_SESSION['message_type'] = "danger";
        }
    }

    header("Location: index.php");

?>
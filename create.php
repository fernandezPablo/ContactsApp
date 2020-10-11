<?php
    include('connection.php');

    if(isset($_POST['new_contact'])){
        
        $name = $_POST['name'];
        $phone = $_POST['phone'];

        $stmt = $conn->prepare("INSERT INTO contacts(name,phone) VALUES(?,?)");
        $stmt->bind_param("ss",$name,$phone);

        if($stmt->execute()){
            $_SESSION['message'] = 'The conctact was succesfully created!';
            $_SESSION['message_type'] = 'success';
        }
        else{
            $_SESSION['message'] = 'Sorry, we cant create the contact :(!';
            $_SESSION['message_type'] = 'danger';
        }

        header("Location: index.php");
        
    }

?>
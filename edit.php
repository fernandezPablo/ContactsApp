<?php
    include('connection.php');


    if(isset($_GET['id'])){
        
        $id = $_GET['id'];

        if(isset($_POST['edit_contact'])){
            $name = $_POST['name'];
            $phone = $_POST['phone'];

            $stmt = $conn->prepare("UPDATE contacts SET name = ?, phone = ? WHERE id = ?");
            $stmt->bind_param("sss",$name,$phone,$id);

            if($stmt->execute()){
                $_SESSION['message'] = "The contact was successfuly updated!";
                $_SESSION['message_type'] = "success";
            }
            else{
                $_SESSION['message'] = "Sorry, we cant update the contact";
                $_SESSION['message_type'] = "success";
            }
        }
        else{
            $query = "SELECT * FROM contacts WHERE id = $id";
        
            if($result = $conn->query($query)){
                if($result->num_rows > 0){
                    $row = $result->fetch_row();
                    $_SESSION['id'] = $row[0];
                    $_SESSION['name'] = $row[1];
                    $_SESSION['phone'] = $row[2];
                }
            }
            else{
                $_SESSION['message'] = "Sorry, an error ocurred :(";
                $_SESSION['message_type'] = "danger";
            }

        }
            
        header("Location: index.php");
    }

?>
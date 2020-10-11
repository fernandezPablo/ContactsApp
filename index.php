<?php 
    include('connection.php');
    include('includes/header.php');
?>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-4">
                <?php
                    if(isset($_SESSION['message'])){ ?>
                    <div class="alert alert-<?php echo $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION['message'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php
                    }
                ?>
                <div class="card card-body mb-3">
                    <form action="<?php echo (isset($_SESSION['name']))? 'edit.php?id='.$_SESSION['id'] : 'create.php' ?>" method="post">
                        <div class="form-group">
                            <?php
                                if(isset($_SESSION['name'])){
                            ?>
                                <input type="text" name="name" id="name" placeholder="Contact name" class="form-control" value="<?php echo $_SESSION['name'] ?>" autofocus>                                
                            <?php  
                                }
                                else{
                            ?>
                                <input type="text" name="name" id="name" placeholder="Contact name" class="form-control" autofocus>
                            <?php 
                                }
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                                if(isset($_SESSION['phone'])){
                            ?>
                                <input type="num" name="phone" id="phone" placeholder="Phone number" class="form-control" value="<?php echo $_SESSION['phone'] ?>">
                            <?php  
                                }
                                else{
                            ?>
                                <input type="text" name="phone" id="phone" placeholder="Phone number" class="form-control">
                            <?php 
                                }
                            ?>
                        </div>
                            <?php
                                if(isset($_SESSION['name'])){
                            ?>
                                    <button type="submit" class="btn btn-info btn-block" name="edit_contact">
                                        Edit contact
                                    </button>
                                    <button type="submit" class="btn btn-danger btn-block" name="cancel" onClick=" event.preventDefault(); window.location.href = 'index.php'">
                                        Cancel
                                    </button>
                            <?php
                                }
                                else{
                            ?> 
                                    <button type="submit" class="btn btn-success btn-block" name="new_contact">
                                        Add contact
                                    </button>
                            <?php 
                                }
                            ?>
                    </form> 
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM contacts";
                            if($result = $conn->query($sql)){
                                while($row = $result->fetch_row()){
                        ?>
                                    <tr>
                                        <td><?php echo $row[1] ?></td>
                                        <td><?php echo $row[2] ?></td>
                                        <td class="text-center">
                                            <a href="edit.php?id=<?php echo $row[0]?>" class="btn btn-primary btn-sm">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <a href="delete.php?id=<?php echo $row[0] ?>" class="btn btn-danger btn-sm">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>                  
                        <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php
    session_unset();
    include('includes/footer.php');
?>
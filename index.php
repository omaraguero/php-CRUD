<?php include('includes/header.php');?>
<?php include('includes/db_connection.php');?>
<?php session_start(); ?>

<?php
    if(isset($_SESSION['uname'])){
        echo "<h4>"."Hello ". $_SESSION['uname']."</h4>";
    }else{
        header('location:login_page.php?message=You need to login to enter the site');
    }

?>


<h1 class=" text-center">All students</h1>

<div class="card-3d-wrap-students mx-auto">
    <div class="card-3d-wrapper">
        <div class="card-front">
            <div class="center-wrap">
                <div class="section text-center">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="mb-4 btn btn-outline-primary">Add students</button>
                        <table class="table table-bordered table-dark">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Age</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "select * from `students`";

                                    $result = mysqli_query($connection, $query);

                                    if(!$result){
                                        die("query Failed".mysqli_error());
                                    }
                                    else{
                                        while($row = mysqli_fetch_assoc($result)){
                                            ?>

                                                <tr>
                                                    <td><?php echo $row['id']; ?></td>
                                                    <td><?php echo $row['firstname']; ?></td>
                                                    <td><?php echo $row['lastname']; ?></td>
                                                    <td><?php echo $row['age']; ?></td>
                                                    <td><a href="update_page.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a></td>
                                                    <td><a href="content/delete_page.php?id=<?php echo $row['id']; ?>" class="btndanger btn-danger">Delete</a></td>
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
    </div>
</div>

<?php
    if(isset($_GET['message'])){
        echo '<div class="mt-4">';
        echo "<h6>".$_GET['message']."</h6>";
        echo '</div>';
    }
?>

<?php
    if(isset($_GET['insert_msg'])){
        echo '<div class="mt-4">';
        echo "<h6>".$_GET['insert_msg']."</h6>";
        echo '</div>';
    }
?>

<?php
    if(isset($_GET['update_msg'])){
        echo '<div class="mt-4">';
        echo "<h6>".$_GET['update_msg']."</h6>";
        echo '</div>';
    }
?>

<?php
    if(isset($_GET['delete_msg'])){
        echo '<div class="mt-4">';
        echo "<h6>".$_GET['delete_msg']."</h6>";
        echo '</div>';
    }
?>

<div class="text-center mt-4">
    <a href="actions/logout_process.php" class="btn btn-dangere text-center">Logout</a>
</div>




<form action="actions/insert_data.php" method="post">

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content bg-dark">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add student</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>                                    

    <div class="modal-body bg-dark">
        <form>
            <div class="form-group">
                <label for="f_name">First Name</label>
                <input type="text" name="f_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="l_name">Last Name</label>
                <input type="text" name="l_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="text" name="age" class="form-control">
            </div>
        </form>
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_students" value="Add">
    </div>
    </div>

</div>
</div>



    <?php include('includes/footer.php'); ?>
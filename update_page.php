<?php include('includes/header.php');?>
<?php include('includes/db_connection.php');?>


<?php

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "select * from `students` where `id` = '$id'";

        $result = mysqli_query($connection, $query);

        if(!$result){
            die("query failed".mysqli_error());
        }else{
            $row = mysqli_fetch_assoc($result);
        }
    }

    if(isset($_POST['update_students'])){

        if(isset($_GET['id_new'])){
            $idnew = $_GET['id_new'];
        }

        $fname = $_POST['f_name'];
        $lname = $_POST['l_name'];
        $age = $_POST['age'];

        if($fname == "" || empty($fname) || $lname == "" || empty($lname) || $age == "" || empty($age) ){
            header('location:index.php?message=You need to fill the values');
        }else{

            $query = "update `students` set `firstname` = '$fname', `lastname` = '$lname', `age` = '$age' where `id` = '$idnew' ";

            $result = mysqli_query($connection, $query);

            if(!$result){
                die("query failed".mysqli_error());
            }else{
                header('location:index.php?update_msg=You have successfully update the data');
            }
        }
    }

    ?>

<form action="update_page.php?id_new=<?php echo $id; ?>" method="post">
    <div class="form-group">
        <label for="f_name">First Name</label>
        <input type="text" name="f_name" class="form-control" value="<?php echo $row['firstname']?>">
    </div>
    <div class="form-group">
        <label for="l_name">Last Name</label>
        <input type="text" name="l_name" class="form-control" value="<?php echo $row['lastname']?>">
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="text" name="age" class="form-control" value="<?php echo $row['age']?>">
        <input type="submit" class="btn btn-success mt-4" name="update_students" value="Update">
    </div>
</form>



<?php include('includes/footer.php'); ?>
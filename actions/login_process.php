<?php include('../includes/dbcon.php'); ?>
<?php session_start(); ?>


<?php

    if(isset($_POST['login'])){
        $username = $_POST['uname'];
        $email = $_POST['email'];
    }

    $query = "select * from `users` where `username` = '$username' and `email_id` = '$email' ";

    $result = mysqli_query($connection, $query);

    if(!$result){
        die("Query Failed".mysqli_error());
    }else{
        $row = mysqli_num_rows($result);

        if($row == 1){
            $_SESSION['uname'] = $username;
            header('location:../index.php');
        }else{
            header('location:../loginpage.php?message=Sorry your username or email id is invalid');
        }

    }


 ?>
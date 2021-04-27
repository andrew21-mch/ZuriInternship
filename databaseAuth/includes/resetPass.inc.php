<?php
if(isset($_POST['reset'])){

    require_once "config.includes.php";

    $username = $_POST['newuname'];
    $newPass = $_POST['pass'];

    $hashedPass = password_hash($newPass, PASSWORD_DEFAULT); {

        $hashedPass = password_hash($newPass, PASSWORD_DEFAULT);
        $sql = "UPDATE UserInfo SET UserPass='$hashedPass' WHERE Username='$username'";
        $results = mysqli_query($conn, $sql);

        if(!$results){
           echo "<script>alert('An Error occured')</script>";
        }
        else{
            echo "<script>alert('Success')</script>";
            header('location: ../crud/home.php');
        }
        
    }
}




?>
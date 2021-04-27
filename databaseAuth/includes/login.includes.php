<?php 
require_once "config.includes.php";
session_start();
$errors = [];
$username = "";

// LOG USER IN
if (isset($_POST['login'])) {
  // getting username and password from form
  $username = $_POST['uname'];
  $password = $_POST['password'];
  // validating form
  if (empty($username) || empty($password))
  {
      array_push($errors, "missing fields");
      echo "<script>alert('Missing Credentials')</script>";
    } 

  // if no error in form, log user in
  if (count($errors) == 0) {
    $passhashed = password_hash($password, PASSWORD_DEFAULT);
    $sql = "SELECT * FROM UserInfo WHERE Username= '$username' OR Email = '$username' AND UserPass='$passhashed';";
    $results = mysqli_query($conn, $sql);

    if (mysqli_num_rows($results)==1) {
      $_SESSION['uname'] = $username;
      //$_SESSION['success'] = "You are now logged in";
      header('location: ../crud/home.php');
      echo "<script>alert('Success')</script>";
    }else {
      array_push($errors, "Wrong credentials");
      echo "<script>alert('Something Went Wrong')</script>";
    }
  }
}

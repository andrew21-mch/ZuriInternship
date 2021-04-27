<?php
//<--------------------Defined Usefull Functions------------------------------->
//function that checks to make sure that all fiels are filled
function emptyInputInSignup($name, $email, $username, $pass1, $pass2){
   
    if(empty($name) || empty($name)||empty($username)||empty($email)||empty($pass1)||empty($pass2)){
        $output = true;

    }
    else{
        $output = false;

    }

    return $output;
}

//function to check if username is valid to avoid sql Injection
function invalidUid($username){
    if(!preg_match("/^[a-zA-Z0-9]*$", $username)){
        $output = true;

    }
    else{
        $output = false;
    }
    return $output;
}

//functions to check if email is a valid email using email standard
function invalidEmail($email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $output = true;
    }
    else{
        $output = false;

    }
    return $output;
}

//Funciton to check if Passwords inputed match
function passwordMatch($pass1, $pass2){

    if($pass1 !== $pass2){
        $output = true;

    }
    else{
        $output = false;

    }
    return $output;
}


//Function to check if user already exist in the database
function userExist($conn, $username, $email){

    $sql = "SELECT * FROM UserInfo WHERE Username = ? OR Email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../signup.php?error=Existccured");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $res = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($res)){
        return $row;
    }
    else{
        $res = false;
        return $res;
    }
    mysqli_stmt_close($stmt);
    
}

//Function to create user
function createUser($conn, $name, $username, $email, $pass1){

    $sql = "INSERT INTO `UserInfo` (`FName`, `Username`, `Email`, `UserPass`) VALUES ( ?, ?, ?, ?)" ;
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../signup.php?error=Error_Occured");
        exit();
    }

    $passwordHashed = password_hash($pass1, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $username, $email, $passwordHashed);
    mysqli_stmt_execute($stmt); 
    mysqli_stmt_close($stmt);
    header("Location: ../signup.php?error=No Error");
    exit();
}



/*-------------------------------------ACTUAL WORKS------------------------------------------*/

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['uname'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];

    require_once "config.includes.php";



    if(emptyInputInSignup($name, $email, $username, $pass1, $pass2)!== false){
        header("Location: ../signup.php?error=emptyinput");
        exit();
    }
    /*if(invalidUid($username)!==false){
        header("Location: ../signup.php?error=InvalidUsername");
        exit();
        
    }*/
    if(invalidEmail($email)!== false){
        header("Location: ../signup.php?error=invalidEmail");
        exit();
    }
    if(passwordMatch($pass1, $pass2)!== false){
        header("Location: ../signup.php?error=Password Mismatch");
        exit();
    }
    if(userExist($conn, $username, $email)!== false){
        header("Location: ../signup.php?error=username already exist");
        exit();
    }
    createUser($conn, $name, $username, $email, $pass1);
}
if(isset($_POST['reset'])){
    header("Location: ../reset.php");
}
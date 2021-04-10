<?php  session_start(); 
// session starts with the help of this functio?> 
 
<?php
 // Check whether the session is already there or not if true then header redirect it to the home page directly 
if(isset($_SESSION['user']))  
 {
    header("Location:LandingPage.html"); 
 }
else
{
    include 'loginform.html';
}
 // // it checks whether the user clicked login button or not 
if(isset($_POST['login']))  
{
     $user = $_POST['user'];
     $pass = $_POST['pass'];
 
    if(isset($user) && isset($pass)){
    $file = fopen('data.txt', 'r');
    $good=false;
    while(!feof($file)){
        $line = fgets($file);
        $array = explode(";",$line);
    if(trim($array[0]) == $user && trim($array[1]) == $pass){
            $good=true;
            break;
        }
    }
 
    if($good){
    $_SESSION['user'] = $user;
        echo '<script type="text/javascript"> window.open("LandingPage.html","_self");</script>';  
    }else{
        echo '<script type = "text/javascript">alert("invalid UserName or Password")</script>';
    }
    fclose($file);
    }
    else{
        include 'login.html';
    }
 
}
//the code below resets password and username if user wishes to
elseif(isset($_POST['reset'])){
    header('Location: registerform.html');
}
?>

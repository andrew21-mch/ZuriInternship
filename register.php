<?php
if(isset($_POST["user"]) && isset($_POST["pass"]))
{
    //get info from form
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    // check if user exist.
    $file=fopen("data.txt","r");
    $user_registered = false;
    while(!feof($file))
    {
        $line = fgets($file);
        $array = explode(";",$line);
        if(trim($array[0]) == $user)
        {
            $user_registered=true;
            break;
        }
    }
    fclose($file);
 
    // register user or pop up message
    if( $user_registered )
    {
        echo $user. ' existed! \r\n';
        include 'register.html';
    }
    else
    {
        $file = fopen("data.txt", "a");
        fputs($file,$user.";".$pass."\r\n");
        fclose($file);
        echo $user."registered successfully!";
    }
}
else
{
    include 'registration.html';
}
?>

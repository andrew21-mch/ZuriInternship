<!DOCTYPE html>
<html>
    <head>
        <title>regsiter</title>
        <link rel = "stylesheet" href="css/style.css">
    </head>
    <body>
       <section class="signup-form"> <center>
           <table><form action="includes/signup.includes.php" method="POST">
       
           <h2>Sign Up </h2>     
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="uname"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="email" id=""></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="pass1"></td>
            </tr>
            <tr>
                <td>password Again: </td>
                <td><input type="password" name="pass2"></td>
            </tr>
            <tr>
                <td><button type="submit" value="Register" name="submit">Register</button></td>
                <td><button type="clear" value="Clear">Clear</button></td>
            </tr>
        </form>
    </table></center></section>

    <?php 
  /*  if(isset($_GET["error"])) {
        if(isset($_GET["error"])=="emptyinput"){
            echo "<p>you forgot to fill in al fields </p>";
        }
        else if(isset($_GET["error"]) == "invalidUid"){
            echo "<p>you forgot to fill in al fields </p>";
        }
    }*/
    ?>
    </body>
</html>
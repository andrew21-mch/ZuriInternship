<!DOCTYPE html>
<html>
    <head>
        <title>Password reset</title>
        <link rel = "stylesheet" href="css/style.css">
    </head>
    <body>
       <center>
        <table>
           <form action="includes/resetPass.inc.php" method="POST">
            
                <tr>
                    <td>Username</td>
                    <td><input type="text" placeholder="Username or Email Address" name = "newuname"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" placeholder="Password" name="pass"></td><br><br>
                </tr>
                <tr>
                    <td><button type="submit" name="reset" value="Reset">Reset</button></td>
                </tr>
            </form>
        </table>
    </center>
    </body>
</html>
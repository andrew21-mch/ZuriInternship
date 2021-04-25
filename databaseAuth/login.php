<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
       <center>
        <table>
           <form action="includes/login.includes.php" method="POST">
            
                <tr>
                    <td>Login</td>
                    <td><input type="text" placeholder="Username or Email Address" name = "uname"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" placeholder="Password" name="password"></td><br><br>
                </tr>
                <tr>
                    <td><button type="submit" name="login" value="Login">Login</button></td>
                </tr>
                <tr><td><br><br><a href="resetPass.php" style="padding: 8px 4px; text-decoration: none; color: blue;  border-style: solid grey" >Forgot Password? </a></td></tr>
            </form>
        </table>
    </center>
    </body>
</html>

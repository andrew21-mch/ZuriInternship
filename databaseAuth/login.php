<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <style>
            body{
                background-color: indigo;
                color: white;
            }
            nav{
                float: right;
            }
            a{
                padding: 4px;
                background-color: white;
                text-decoration: none;

            }
            a:hover{
                background-color: gray;
                color: blue;
            }
            h1{
                font-size: 40pt;
            }
            .container{
                width: 40%;
                text-align: center;
            }
            form{
                margin-top: 10%;
            }

        </style>
    </head>
    <body>
       <center>
        
           <form action="includes/login.includes.php" method="POST">
           <table>
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
                <tr><td></td><td><br><a href="resetPass.php" style="padding: 8px 4px; text-decoration: none; color: blue;  border-style: solid grey" >Forgot Password? </a></td></tr>
                </table></form>
        
    </center>
    </body>
</html>

<html>
    <head>
        <title>Registered courses</title>
        
    </head>
    <link rel="stylesheet" href="css/style.css">
    <body>
        <form>
            <?php
        require_once "includes/config.includes.php";
        require_once "includes/course_registration.includes.php";
        $sql  = "SELECT * FROM Course";
        $results = mysqli_query($conn, $sql); 
            
        ?>

        <table>
            <thead>
                <tr>
                    <th >Course Name</th>
                    <th >Course Code</th>
                    <th >Action</th>
                </tr>
            </thead>
            
        <?php 
            while ($row = mysqli_fetch_array($results)) { ?>
                <tr>
                    <td><?php echo $row['Course_name']; ?></td>
                    <td><?php echo $row['Course_code']; ?></td>
                    <td>
                        <a href="register.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
                    </td>
                    <td>
                        <a href="includes/config.includes.php?del =<?php echo $row['id']; ?>" class="del_btn">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>



    </body>
</html>
        </form>
        
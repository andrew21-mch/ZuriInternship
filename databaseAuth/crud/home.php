<?php 
    require_once "../includes/config.includes.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 90%;
            margin: 0 auto;
        }
        /*table tr td:last-child{
            width: 80%;
        }*/
        table{
            border:thin;
            width: 80%;
            background-color:royalblue;
            }
        tr{
            border: solid;

            }
        td{
            border: solid;
            height: 35px;
        }
        th{
            background-color: gray;
            height: 40px;
        }
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
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <nav>
        <a href="../logout.php">Logout</a>
    </nav>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Course Details</h2>
                        <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add Course</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "../includes/config.includes.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM `Course`";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<center><table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Course Name</th>";
                                        echo "<th>Course Code</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";

                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['Course_id'] . "</td>";
                                        echo "<td>" . $row['Course_name'] . "</td>";
                                        echo "<td>" . $row['course_code'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="read.php?id='. $row['Course_id'] .'"title="View Record"><span><img src = "../images/eye-solid.svg" height ="12"></span></a>';
                                            echo '<a href="update.php?id='. $row['Course_id'] .'"title="Update Record"><span><img src = "../images/pencil-alt-solid.svg" height ="12"</span></a>';
                                            echo '<a href="delete.php?id='. $row['Course_id'] .'" title="Delete Record"><span><img src = "../images/trash-alt-solid.svg" height ="12"</span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table> </center>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($conn);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
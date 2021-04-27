<?php
// Include config file
require_once "../includes/config.includes.php";
 
// Define variables and initialize with empty values
$course_name = $course_code ="";
$course_name_err = $course_code_err="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_course_name = $_POST["course_name"];
    if(empty($input_course_name)){
        $couse_name_err = "Please enter a course name.";
    } elseif(!filter_var($input_course_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $course_name_err = "Please enter a valid name.";
    } else{
        $name = $input_course_name;
    }
    
    // Validate address
    $input_course_code = $_POST["course_code"];
    if(empty($input_course_code)){
        $course_code_err = "Please select Course Code.";     
    } else{
        $code = $input_course_code;
    }
    
    
    // Check input errors before inserting in database
    if(empty($course_name_err) && empty($course_code_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO Course (Course_name, course_code) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_name, $param_code);
            
            // Set parameters
            $param_name = $name;
            $param_code = $code;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: home.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($conn);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                color: blue;

            }
            a:hover{
                background-color: blue;
                color: whitesmoke;
            }
            h1{
                font-size: 40pt;
            }
            .container{
                width: 40%;
                text-align: center;
            }
        .wrapper{
            width: 800px;
            margin: 0 auto;
        }
        select{
            width: 60%;
        }
        table{
            width: 70%;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5">Create Course</h1> <br><br>
                    <p><h2>Please fill this form and submit to add employee record to the database.</h2></p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                           <table>
                               <tr>
                                <td><label>Course Name</label></td>
                                <td colspan="6"> <select placeholder= "Select Course Name" name="course_name" class="form-control <?php echo (!empty($course_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $course_name; ?>">
                                    <option value="Select Course Name">Select Course Name</option>
                                    <option value="Computational Thinking">Computational Thinking</option>
                                    <option value="Computer Science">Computer Science</option>
                                    <option value="Engineering Drawing">Engineering Drawing</option>
                                    <option value="Mechatronics">Mechatronics</option>
                                    <option value="Logic Design">Logic Design</option>
                                    <option value="Software Engineering">Software Engineering</option>
                                    <option value="Engineering Mathematics">Engineering Mathematics</option>
                                    </select>
                               <span class="invalid-feedback"><?php echo $course_name_err;?></span></td></tr>
                           
                        </div>

                        <div class="form-group">

                        <tr>
                            <td> <label>Course Code</label></td>
                            <td colspan="6"> <select name="course_code" placeholder= "Select Course Code" class="form-control <?php echo (!empty($course_code_err)) ? 'is-invalid' : ''; ?>"><?php echo $course_code; ?>
                            
                            <option value="Select Course code">Select Course Code</option>
                            <option value="COME2101">MECE3101</option>
                            <option value="COME2101">MECE3104</option>
                            <option value="COME2101">COME3102</option>
                            <option value="COME2101">COME3103</option>
                            <option value="COME2101">COME2101</option>
                            <option value="COME2102">COME2102</option>
                            <option value="COME2203">COME2203</option></select>
                            <span class="invalid-feedback"><?php echo $course_code_err;?></span> <br><br></td>
                        </tr>
                           
                        </div>
                        <tr>
                            <td><input type="submit" class="btn btn-primary" value="Submit"><br><br></td>
                        </tr>
                        <tr><td><a href="home.php" class="btn btn-secondary ml-2">Cancel</a></td></tr>
                        </table>  
                        
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
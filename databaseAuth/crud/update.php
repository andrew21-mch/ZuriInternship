<?php
// Include config file
require_once "../includes/config.includes.php";
 
// Define variables and initialize with empty values
$course_name = $course_code = "";
$course_name_err = $course_code_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["course_id"]) && !empty($_POST["course_id"])){
    // Get hidden input value
    $course_id = $_POST["course_id"];
    
    // Validate name
    $input_course_name = trim($_POST["course_name"]);
    if(empty($input_course_name)){
        $course_name_err = "Please select Course.";
    } elseif(!filter_var($input_course_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $course_name_err = "Please select valid course.";
    } else{
        $name = $input_course_name;
    }
    
    // Validate address address
    $input_course_code = trim($_POST['course_code']);
    if(empty($input_course_code)){
        $course_code_err = "Please select valid course.";     
    } else{
        $code = $input_course_code;
    }
    
    // Check input errors before inserting in database
    if(empty($course_name_err) && empty($course_code_err)){
        // Prepare an update statement
        $sql = "UPDATE Course SET Course_name=?, course_code=? WHERE Course_id=?";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssi", $param_name, $param_code, $param_id);
            
            // Set parameters
            $param_name = $name;
            $param_code = $code;
            $param_id = $course_id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
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
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["course_id"]) && !empty(trim($_GET["course_id"]))){
        // Get URL parameter
        $course_id =  trim($_GET["course_id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM Course WHERE Course_id = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $course_id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $name = $row["Course_name"];
                    $code = $row["course_code"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($conn);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Course Record</h2>
                    <p>Please edit the input values and submit to update the Course record.</p>
                    <form action="update.php" method="post">
                        <div class="form-group">
                            <label>Course Name</label>
                            <input type="text" name="course_name" class="form-control <?php echo (!empty($course_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $course_name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Course Code</label>
                            <input name="course_code" class="form-control <?php echo (!empty($course_code_err)) ? 'is-invalid' : ''; ?>"><?php echo $code; ?> >
                            <span class="invalid-feedback"><?php echo $course_code_err;?></span>
                        </div>
                        <input type="hidden" name="course_id" value="<?php echo $course_id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="home.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
<?php 
	session_start();
	require_once "config.includes.php";

	if (isset($_POST['submit'])) {
		$course_code = $_POST['course_code'];
		$course_name = $_POST['course_name'];
		

		$sql  = "INSERT INTO `Course` (`Course_code`, `Course_name`) VALUES ('$course_code', '$course_name')" ; 
		$result = mysqli_query($conn, $sql);
		if(!$result){
			echo "<script>alert('Registration Error')</script>";
		}
		else{
			$_SESSION['message'] = "Course Registered"; 
		    header('Location: ../home.php');
			echo "<script>alert('Success')</script>";

	}
		
	}
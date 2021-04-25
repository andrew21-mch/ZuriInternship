<!DOCTYPE html>
<html>
<head>
<link rel = "stylesheet" href="css/style.css">
	<title>Register Course</title>
</head>
<body>
<form">
	<form method="POST" action="includes/course_registration.includes.php" >
		<div class="input-group">
			<label>Course Name</label><br>
			<select name="course_name" id="">
            <option value="Computational thinking">Computational thinking</option>
            <option value="Computer Organisation and Arhictecture">Computer Organisation and Arhictecture</option>
            <option value="Discrete Mathematics">Discrete Mathematics</option>
            <option value="Abstract Datatypes and structure">Abstract Datatypes and structure</option>
            <option value="Logic Design">Logic Design</option></select>
		</div>
		<div class="input-group">
			<label>Course Code</label> <br>
			<select name="course_code" id="">
            <option value="COME2101">COME2101</option>
            <option value="COME2102">COME2102</option>
            <option value="COME3104">COME3104</option>
            <option value="COME3106">COME3106</option>
            <option value="COME3109">COME3109</option></select>
		</div>
		<div class="input-group">
			<button class="btn" type="submit" name="submit" >Register</button>
		</div>
	</form>
</body>
</html>
<?php 
	$db = mysqli_connect('localhost', 'root', '', 'db_jobportal');
	
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
	    $username = $_POST['loginUser'];
	    $password = $_POST['loginPassword'];
	    $email = $_POST['email'];
		$gender = $_POST['gender'];
		$epass = sha1($password);

		$result = mysqli_query($db, "INSERT INTO `tblapplicants` (FNAME,LNAME,USERNAME,PASS,EMAILADDRESS,SEX) VALUES ('$fname','$lname','$username', '$epass', '$email', '$gender')");
		
		header('location: login.html');
?>
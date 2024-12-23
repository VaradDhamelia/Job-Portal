<?php 
	$db = mysqli_connect('localhost', 'root', '', 'db_jobportal');
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
session_start();
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
		$sessionstatus = $_POST['SESSIONSET'];
	if($sessionstatus == 0)
	{
	    $namef = $_POST['FNAME'];
	    $namel = $_POST['LNAME'];
	    $namem = $_POST['MNAME'];
	    $addressa = $_POST['ADDRESS'];
	    $sex = $_POST['optionsRadios'];
	    $montha = $_POST['month'];
	    $daya = $_POST['day'];
	    $yeara = $_POST['year'];
	    $bop = $_POST['BIRTHPLACE'];
	    $mob = $_POST['TELNO'];
	    $email = $_POST['EMAILADDRESS'];
	    $user = $_POST['USERNAME'];
	    $password = $_POST['PASS'];
	    $degreea = $_POST['DEGREE'];
	    $cst = $_POST['CIVILSTATUS'];
		$company = $_POST['COMPANYNAME'];
		$APPLIEDFOR = $_POST['OCCUPATIONTITLE'];
		$attachments = basename($_FILES["fileToUpload"]["name"]);
		$h_upass = sha1($password);
		
		$result = mysqli_query($db, "INSERT INTO `tblapplicants`(`FNAME`, `LNAME`, `MNAME`, `ADDRESS`, `SEX`, `CIVILSTATUS`, `BIRTHDATE`, `BIRTHPLACE`, `USERNAME`, `PASS`, `EMAILADDRESS`, `CONTACTNO`, `DEGREE`, `COMPANYNAME`, `APPLIEDFOR`,`PENDINGAPPLICATION`,`attachments`) VALUES ('$namef','$namel','$namem','$addressa','$sex','$cst','$yeara-$montha-$daya','$bop','$user','$h_upass','$email','$mob','$degreea','$company','$APPLIEDFOR','1', '$attachments')");

		if($result)
		{
			$_SESSION['ChkApplication'] = "Application Submitted";
			header('location:index2.php');
		}
		else
		{
			echo "FAILED!";
			echo mysqli_error($db);
		}
	}
	
	else
	{
		
	    $namef = $_POST['FNAME'];
	    $namel = $_POST['LNAME'];
	    $namem = $_POST['MNAME'];
	    $addressa = $_POST['ADDRESS'];
	    $sex = $_POST['optionsRadios'];
	    $montha = $_POST['month'];
	    $daya = $_POST['day'];
	    $yeara = $_POST['year'];
	    $bop = $_POST['BIRTHPLACE'];
	    $mob = $_POST['TELNO'];
	    $degreea = $_POST['DEGREE'];
	    $cst = $_POST['CIVILSTATUS'];
	    $APPLICANTIDCHK = $_POST['APPLICANTIDCHK'];
		$company = $_POST['COMPANYNAME'];
		$APPLIEDFOR = $_POST['OCCUPATIONTITLE'];
		$attachments = basename($_FILES["fileToUpload"]["name"]);
		$h_upass = sha1($password);
		
		$result = mysqli_query($db, "UPDATE `tblapplicants` SET `FNAME`='$namef',`LNAME`='$namel',`MNAME`='$namem',`ADDRESS`='$addressa',`SEX`='$sex',`CIVILSTATUS`='$cst',`BIRTHDATE`='$yeara-$montha-$daya',`BIRTHPLACE`='$bop',`CONTACTNO`='$mob',`DEGREE`='$degreea',`COMPANYNAME`='$company',`PENDINGAPPLICATION`='1',`REMARKS`='NONE',`APPLIEDFOR`='$APPLIEDFOR',`Attachments`='$attachments' WHERE `APPLICANTID` = $APPLICANTIDCHK");

		if($result)
		{
			$_SESSION['ChkApplication'] = "Application Submitted";
			header('location:index2.php');
		}
		else
		{
			echo "FAILED!";
			echo mysqli_error($db);
		}
	}
?>
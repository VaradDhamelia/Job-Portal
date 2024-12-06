<?php
require_once ("include/initialize.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="ex.css">
  <title>Login</title>
  <style>
 body {
  background: url('022.jpg') no-repeat center;
  background-size: cover;
 }
 .form .input-group input:focus + label,
.form .input-group input:valid + label {
  transform: translateY(-18px);
  color:  #5b86e5;
  font-size: .8rem;
}
 .wrap {
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.button {
  min-width: 20px;
  min-height: 20px;
  font-family: 'Nunito', sans-serif;
  font-size: 22px;
  text-transform: uppercase;
  letter-spacing: 1.3px;
  font-weight: 700;
  color: #313133;
  background: #FF6700;
background: linear-gradient(90deg, rgb(31 39 225) 0%, rgb(0 204 255) 100%);
  border: none;
  border-radius: 1000px;
  box-shadow: 12px 12px 24px rgb(0 204 255); 
  transition: all 0.3s ease-in-out 0s;
  cursor: pointer;
  outline: none;
  position: relative;
  padding: 10px;
  }

button::before {
content: '';
  border-radius: 1000px;
  min-width: calc(300px + 12px);
  min-height: calc(60px + 12px);
  border: 6px solid #00CCFF;
  box-shadow: 0 0 60px rgba(0 204 255);
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  opacity: 0;
  transition: all .3s ease-in-out 0s;
}

.button:hover, .button:focus {
  color: #FFFFFF;
  transform: translateY(-6px);
}

button:hover::before, button:focus::before {
  opacity: 1;
}

button::after {
  content: '';
  width: 30px; height: 30px;
  border-radius: 100%;
  border: 6px solid #0010FF;
  position: absolute;
  z-index: -1;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  animation: ring 1.5s infinite;
}

button:hover::after, button:focus::after {
  animation: none;
  display: none;
}

@keyframes ring {
  0% {
    width: 30px;
    height: 30px;
    opacity: 1;
  }
  100% {
    width: 350px;
    height: 350px;
    opacity: 0;
  }
}
#abc{
  width:100%;
  height:100vh;
  background-image: url(img2.jpg);
  background-size: cover;
}
nav{
  width: 100%;
  height: 50px;
  background-color: #00000047;
  line-height: 50px;
}
nav ul{
  float: left;
  margin-left: 0px;
}
nav ul li{
  list-style-type: none;
  display: inline-block;
  transition: 0.7s all;
}
nav ul li:hover{
  background-color:#00ccff;
}
nav ul li a{
  text-decoration: none;
  font-family:Georgia;
  font-weight: bold;
  color: #FFFFFF;
  padding: 30px;
}
  </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index2.php">Home</a></li>
        </ul>
    </nav>
  <div class="login-wrapper">
    <form action="login.php" method="POST" class="form">
      <img src="nl-2.png"  alt="">
      <h2 style="color: rgb(0 204 255);">Login</h2>
      <div class="input-group">
        <input type="text" name="loginUser" id="loginUser" required>
        <label for="loginUser">User Name</label>
      </div>
      <div class="input-group">
        <input type="password" name="loginPassword" id="loginPassword" required>
        <label for="loginPassword">Password</label>
      </div>
      <div class="wrap">
  <button type="submit" class="button">Login</button>
</div>
      <br><a href="#forgot-pw" class="forgot-pw">Forgot Password?</a><br>
      <br><a href="register.html" class="forgot-pw">Dont have an account?</a>
    
	  			  	  <?php
                    if(isset($_SESSION["error"])){
                        $error = $_SESSION["error"];
                        echo "<span style='color:red;font-weight:bold;float:right;padding-right: 30px;padding-top: 30px;'>$error</span>";
                    }
                ?> 
</form>
    <div id="forgot-pw">
      <form action="" class="form">
        <a href="#" class="close">&times;</a>
        <h2>Reset Password</h2>
        <div class="input-group">
          <input type="email" name="email" id="email" required>
          <label for="email">Email</label>
        </div>
        <input type="submit" value="Submit" class="submit-btn">
      </form>
    </div>
  </div>
</body>
</html> 
<?php
    unset($_SESSION["error"]);
?>
 
<?php 

$email = trim($_POST['loginUser']);
	$upass  = trim($_POST['loginPassword']);
	$h_upass = sha1($upass);
	$error = "Username/Password Is Incorrect";
 
  //it creates a new objects of member
    $applicant = new Applicants();
    //make use of the static function, and we passed to parameters
    $res = $applicant->applicantAuthentication($email, $h_upass);
    if ($res==true) { 

       	
       
       // $sql="INSERT INTO `tbllogs` (`USERID`,USERNAME, `LOGDATETIME`, `LOGROLE`, `LOGMODE`) 
       //    VALUES (".$_SESSION['USERID'].",'".$_SESSION['FULLNAME']."','".date('Y-m-d H:i:s')."','".$_SESSION['UROLE']."','Logged in')";
       //    mysql_query($sql) or die(mysql_error()); 
         redirect(web_root."index2.php");
     
    }else{
    	 $_SESSION["error"] = $error;
		 ?>
		
   <?php } ?>
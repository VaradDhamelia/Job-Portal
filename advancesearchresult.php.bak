<?php 
	$searchfor = (isset($_GET['searchfor']) && $_GET['searchfor'] != '') ? $_GET['searchfor'] : '';
	$server = 'http://' . $_SERVER['SERVER_NAME'] . '/Project101/';
?>
<link rel="stylesheet" href="css/style2.css">
<style>

</style>
<section>
<div class="hero-wrap js-fullheight" style="background-image: url(theme/4.jpg);background-size: cover;">
<nav>
						
                            <!-- Logo -->
                            
                                
               <ul style="float:left;">
			   <li><a href="index2.php"><img src="assets/img/logo/3.png" alt=""></a></li>
			   </ul>             
                       
        <ul class="indexing" style="float:left;font-size: 22px;">
											
											<li><a href="index2.php"><i class="fa fa-home" aria-hidden="true"> Home</i></a></li>
                                            <li><a href="job_listing.php"><i class="fa fa-book"> Jobs</i></a></li>
                                            <li><a href="about.php"><i class="fa fa-user"> About</i></a></li>                                           
                                            <li><a href="contact.php"><i class="fa fa-envelope"> Contact</i></a></li>
        
		</ul>
		<?php if (isset($_SESSION['APPLICANTID'])) { 

                    $sql = "SELECT count(*) as 'COUNTNOTIF' FROM `tbljob` ORDER BY `DATEPOSTED` DESC";
                    $mydb->setQuery($sql);
                    $showNotif = $mydb->loadSingleResult();
                    $notif =isset($showNotif->COUNTNOTIF) ? $showNotif->COUNTNOTIF : 0;


                    $applicant = new Applicants();
                    $appl  = $applicant->single_applicant($_SESSION['APPLICANTID']);

                    $sql ="SELECT count(*) as 'COUNT' FROM `tbljobregistration` WHERE `PENDINGAPPLICATION`=0 AND `HVIEW`=0 AND `APPLICANTID`='{$appl->APPLICANTID}'";
                    $mydb->setQuery($sql);
                    $showMsg = $mydb->loadSingleResult();
                    $msg =isset($showMsg->COUNT) ? $showMsg->COUNT : 0;
					?>
					<ul><li><a class="bn39" href="logout.php"><span class="bn39span">Logout</span></a></li></ul>
                    <ul><li><a title="View Profile" href="" style="font-size: 22px;font-family:Georgia;"> <i class="fa fa-user"></i> <?php echo $appl->FNAME. ' '.$appl->LNAME ?> </a> </li></ul>

                <?php    }else{ ?>
							<ul><li><a class="bn39" href="register.html"><span class="bn39span">Register</span></a></li></ul>
							<ul><li><a class="bn39 gotoleft" href="login.html"><span class="bn39span">Login</span></a></li></ul>
						<?php } ?>
						
    </nav>
            <div class="container">
    
                <div class="row">
								<?php 

$search = isset($_POST['SEARCH']) ? ($_POST['SEARCH']!='') ? $_POST['SEARCH'] : 'All' : 'All';
								 $company = isset($_POST['COMPANY']) ? ($_POST['COMPANY']!='') ? $_POST['COMPANY'] : 'All' : 'All';
								 $category = isset($_POST['CATEGORY']) ? ($_POST['CATEGORY']!='') ? $_POST['CATEGORY'] : 'All' : 'All';

								switch ($searchfor) {
									case 'bycompany':
										# code...
									echo 'Result : '  . $search . ' | Company : ' . $company;
										break;
									case 'advancesearch':
										# code... 
									echo 'Result : '  . $search . ' | Company : ' . $company . ' | Function : ' . $category; 
									    break;
									case 'byfunction':
										# code... 
									echo 'Result : '  . $search . ' | Function : ' . $category; 
									    break;

									case 'bytitle':
										# code... 
									echo 'Result : '  . $search; 
									    break;
									
									default:
										# code...
										break;
								}




								?>
							</div>
						</div>
						
						<div class="table-container">
							<table class="table table-filter">
								<tbody>	
									<div class="row main-section">
      <?php 
		$search = isset($_POST['SEARCH']) ? $_POST['SEARCH'] : '';
									 $company = isset($_POST['COMPANY']) ? $_POST['COMPANY'] : '';
									 $category = isset($_POST['CATEGORY']) ? $_POST['CATEGORY'] : '';

										$sql = "SELECT * FROM `tbljob` j, `tblcompany` c 
										WHERE j.`COMPANYID`=c.`COMPANYID` AND COMPANYNAME LIKE '%{$company}%' AND CATEGORY LIKE '%{$category}%' AND (`OCCUPATIONTITLE` LIKE '%{$search}%' OR `JOBDESCRIPTION` LIKE '%{$search}%' OR `QUALIFICATION_WORKEXPERIENCE` LIKE '%{$search}%')";
										$mydb->setQuery($sql);
										$cur = $mydb->executeQuery();
										$maxrow = $mydb->num_rows($cur);

										if ($maxrow > 0) {
											# code... 
										$res = $mydb->loadResultList();
										foreach ($res as $row) { 
										$COMPANYNAME = $row->COMPANYNAME;
										include('job.php');
		    }
		} else {
		    echo '<div class="container">No Jobs Available</div>';
		}
	?>
	</div></div>
								 
					 
			</div>
		</section> 
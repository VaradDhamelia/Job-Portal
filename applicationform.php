



 <?php
 if (isset($_GET['job'])) {
     # code...
    $jobid = $_GET['job'];
 }else{
     $jobid = '';

 }
    $sql = "SELECT * FROM `tblcompany` c,`tbljob` j WHERE c.`COMPANYID`=j.`COMPANYID` AND JOBID LIKE '%" . $jobid ."%' ORDER BY DATEPOSTED DESC" ;
    $mydb->setQuery($sql);
    $cur = $mydb->loadResultList();


    foreach ($cur as $result) {
        # code...
 
 // `OCCUPATIONTITLE`, `REQ_NO_EMPLOYEES`, `SALARIES`, `DURATION_EMPLOYEMENT`, `QUALIFICATION_WORKEXPERIENCE`, `PREFEREDSEX`, `SECTOR_VACANCY`, `DATEPOSTED`
  ?> 
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
        <div class="row d-flex mb-5 contact-info">



            <h2 class="page-header" >Job Details</h2>
           
        </div>
        <div class="row block-9">
          <div class="col-md-6 order-md-last d-flex" >
              <form class="form-horizontal span6  wow fadeInDown" action="process.php"  enctype="multipart/form-data"  method="POST" autocomplete="off">

               <?php require_once('applicantform.php') ?>  

            </form>
          </div>
          <div class="col-md-6 d-flex">
                     <div class="panel">
                         <div class="panel-header">
                              <div style="border-bottom: 1px solid #ddd;padding: 10px;font-size: 25px;font-weight: bold;color: #000;margin-bottom: 5px;"><?php echo $result->OCCUPATIONTITLE ;?></a> 
                              </div> 
                         </div>
                         <div class="panel-body">
                                  <div class="row contentbody">
                                        <div class="col-md-6">
                                            <ul>
                                                <li><i class="fp-ht-bed"></i>Required No. of Employee's : <?php echo $result->REQ_NO_EMPLOYEES; ?></li>
                                                <li><i class="fp-ht-food"></i>Salary : <?php echo number_format($result->SALARIES,2);  ?></li>
                                                <li><i class="fa fa-sun-"></i>Duration of Employment : <?php echo $result->DURATION_EMPLOYEMENT; ?></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <ul> 
                                                <li><i class="fp-ht-tv"></i>Prefered Sex : <?php echo $result->PREFEREDSEX; ?></li>
                                                <li><i class="fp-ht-computer"></i>Sector of Vacancy : <?php echo $result->SECTOR_VACANCY; ?></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-12">
                                            <p>Qualification/Work Experience :</p>
                                             <ul style="list-style: none;"> 
                                                <li><?php echo $result->QUALIFICATION_WORKEXPERIENCE ;?></li> 
                                            </ul> 
                                        </div>
                                        <div class="col-md-12"> 
                                            <p>Job Description:</p>
                                            <ul style="list-style: none;"> 
                                                 <li><?php echo $result->JOBDESCRIPTION ;?></li> 
                                            </ul> 
                                         </div>
                                        <div class="col-md-12">
                                            <p>Employer :  <?php echo  $result->COMPANYNAME; ?></p> 
                                            <p>Location :  <?php echo  $result->COMPANYADDRESS; ?></p>
                                        </div>
                                    </div>
                         </div>
                         <div class="panel-footer">
                              Date Posted :  <?php echo date_format(date_create($result->DATEPOSTED),'M d, Y'); ?>
                         </div>
                     </div> 

          </div>
        </div>
   <?php  } ?>    </div>
    </section>
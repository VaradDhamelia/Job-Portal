<style>
.bn39 {
  background-image: linear-gradient(90deg, #0525ff, #03fdfd);
  border-radius: 16px;
  box-sizing: border-box;
  color: #ffffff;
  display: block;
  height: 45px;
  font-size: 1.0em;
  font-weight: 600;
  padding: 4px;
  position: relative;
  text-decoration: none;
  width: 5em;
  z-index: 2;
  
 
}

.bn39:hover {
  color: #fff;
  
}

.bn39 .bn39span {
  align-items: center;
  background: #0e0e10;
  border-radius: 16px;
  display: flex;
  justify-content: center;
  height: 100%;
  transition: background 0.5s ease;
  width: 100%;
  
}

.bn39:hover .bn39span {
  background: transparent;
  
}

.indexing {
}
</style> 

    <div class="hero-wrap js-fullheight" style="background-image: url('theme/4.jpg');">
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
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-xl-10 ftco-animate mb-5 pb-5" data-scrollax=" properties: { translateY: '70%' }">
            <p class="mb-4 mt-5 pt-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><font face="georgia" color="#FFFFF">New <span class="number" data-number="57">0</span> jobs today!</p>
            <h1 class="mb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Job Is<br><span>Waiting For You!</font></span></h1>

            <div class="ftco-search" style="display:inline-block;">
              <div class="row">
                <div class="col-md-12 nav-link-wrap">
                  <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active mr-md-1 bg-myinfo" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true"><font color="#853774">Find a Job</font></a>  
                  </div>
                </div>
                <div class="col-md-12 tab-wrap">
                  
                  <div class="tab-content p-4 bg-myinfo" id="v-pills-tabContent">

                    <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
                   
                        <form  class="search-job" action="index.php?q=result&searchfor=advancesearch" method="POST"> 
                        <div class="row">
                          <div class="col-md">
                            <div class="form-group">
                              <div class="form-field">
                                <div class="icon"><span class="icon-briefcase"></span></div>
                                <input type="text"  name="SEARCH" class="form-control" placeholder="eg. Dev, Manager, etc.">
                              </div>
                            </div>
                          </div>
                          <div class="col-md">
                            <div class="form-group">
                              <div class="form-field">
                                <div class="select-wrap">
								
                                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                  <select  name="CATEGORY" class="form-control">
                                    <option disabled selected hidden>Category</option>
                                    <?php
                                      $sql = "SELECT * FROM `tblcategory` ORDER BY CATEGORY ASC";
                                      $mydb->setQuery($sql);
                                      $res = $mydb->loadResultList();
                                      foreach ($res as $row) { 
                                        echo '<option style="color:#007bff;">'.$row->CATEGORY.'</option>';
                                      }
                                    ?>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md">
                            <div class="form-group">
                              <div class="form-field">
                                <div class="icon"><span class="icon-map-marker"></span></div>
                                 <select  name="COMPANY" class="form-control">
                                    <option value="" disabled selected hidden>Company</option>
                                   <?php
                                      $sql = "SELECT * FROM tblcompany ORDER BY COMPANYNAME ASC";
                                      $mydb->setQuery($sql);
                                      $res = $mydb->loadResultList();
                                      foreach ($res as $row) { 
                                        echo '<option style="color:#007bff">'.$row->COMPANYNAME.'</option>';
                                      }
                                    ?>
                                  </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-md">
                            <div class="form-group">
                              <div class="form-field">
                                <input type="submit" value="Search" class="btncool">
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>

                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    
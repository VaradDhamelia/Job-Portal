<!-- <div class="form-group">
  <div class="col-md-11">
  <label class="col-md-4 control-label" for=
    "NATIONALID">NationalID:</label>

    <div class="col-md-8"> 
       <input class="form-control " id="NATIONALID" name="NATIONALID" placeholder=
          "00-000000000000" type="text" value=""  onkeyup="javascript:capitalize(this.id, this.value);" >
    </div>
  </div>
</div> -->
<style type="text/css">
.form-control-2 {
  display: inline-block;
  width: 25%;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  line-height: 1.5;
  color: #495057;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
  -webkit-transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
  transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
  -o-transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out; }
   
</style>
<?php if (!isset($_SESSION['APPLICANTID'])) { ?>

            <form action="" class="bg-white p-5 contact-form">
              <div class="form-group">
               <input name="JOBID" type="hidden" value="<?php echo $_GET['job'];?>">
			   <input name="COMPANYNAME" type="hidden" value="<?php echo $_GET['company'];?>">
			   <input name="OCCUPATIONTITLE" type="hidden" value="<?php echo $_GET['for'];?>">
			   <input name="SESSIONSET" type="hidden" value="0">
               <input class="form-control " id="FNAME" name="FNAME" placeholder=
                  "Firstname" type="text" value=""  onkeyup="javascript:capitalize(this.id, this.value);" >
              </div>
			  
              <div class="form-group">
                   <input  class="form-control " id="LNAME" name="LNAME" placeholder="Lastname"  onkeyup="javascript:capitalize(this.id, this.value);" >
              </div>
              <div class="form-group">
                <input  class="form-control " id="MNAME" name="MNAME" placeholder="Middle Name" onkeyup="javascript:capitalize(this.id, this.value);" > 
              </div>
              <div class="form-group"> 
                  <textarea class="form-control " id="ADDRESS" name="ADDRESS" placeholder="Address" type="text" value="" required  onkeyup="javascript:capitalize(this.id, this.value);" ></textarea>
              </div>

              <div class="form-group">   
                Sex:
				<input id="optionsRadios2"   name="optionsRadios" type="radio" value="Male"> Male 
                    <input checked id="optionsRadios1" checked="True" name="optionsRadios" type="radio" value="Female"> Female  
              </div>


    <div class="form-group">  Date of Birth  
        <select class="form-control-2" name="month">
          <option>Month</option>
          <?php

             $mon = array('Jan' => 1 ,'Feb'=> 2,'Mar' => 3 ,'Apr'=> 4,'May' => 5 ,'Jun'=> 6,'Jul' => 7 ,'Aug'=> 8,'Sep' => 9 ,'Oct'=> 10,'Nov' => 11 ,'Dec'=> 12 );    
          
        
            foreach ($mon as $month => $value ) {
              
                  # code...
                   echo '<option value='.$value.'>'.$month.'</option>';
                } 
          ?>
        </select> 
        <select class="form-control-2" name="day">
          <option>Day</option>
        <?php 
          $d = range(31, 1);
          foreach ($d as $day) {
            echo '<option value='.$day.'>'.$day.'</option>';
          }
        
        ?>
          
        </select> 
        <select class="form-control-2" name="year">
          <option>Year</option>
        <?php 
          $years = range(2021, 1900);
          foreach ($years as $yr) {
            echo '<option value='.$yr.'>'.$yr.'</option>';
          }
        
        ?>
        
        </select>
      </div> 
 
              <div class="form-group">  
                <textarea class="form-control " id="BIRTHPLACE" name="BIRTHPLACE" placeholder= "Place of Birth" type="text" value="" required  onkeyup="javascript:capitalize(this.id, this.value);" ></textarea>
              </div>
              <div class="form-group"> 
                 <input class="form-control " id="TELNO" name="TELNO" placeholder= "Contact No." type="text" any value="" required  onkeyup="javascript:capitalize(this.id, this.value);" >
              </div>
              <div class="form-group">
                    <select class="form-control " name="CIVILSTATUS" id="CIVILSTATUS">
                        <option value="none" >Select Civil Status</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Widow" >Widow</option> 
                    </select> 
                
              </div>
              <div class="form-group">
                   <input type="Email" class="form-control " id="EMAILADDRESS" name="EMAILADDRESS" placeholder="Email Address"   autocomplete="false"/>  
              </div>
              <div class="form-group">
                 <input  class="form-control " id="USERNAME" name="USERNAME" placeholder="Username"    onkeyup="javascript:capitalize(this.id, this.value);" >
                
              </div>
              <div class="form-group">
                   <input  class="form-control " id="PASS" name="PASS" placeholder="Password" type="password"   onkeyup="javascript:capitalize(this.id, this.value);" > 
                
              </div>
              <div class="form-group">
                  <input  class="form-control " id="DEGREE" name="DEGREE" placeholder="Educational Attainment"    onkeyup="javascript:capitalize(this.id, this.value);" >
                
              </div>


             <div class="form-group"> 
                 Attach your Resume here. 
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input name="MAX_FILE_SIZE" type="hidden" value="1000000"> 
            </div>  


              <div class="form-group">
                <input type="checkbox"> By Sign up you are agree with our <a href="#">terms and condition</a> 
              </div> 

              <div class="form-group">  
                <input type="submit" value="Submit Application at <?php echo $_GET['company'];?>" name="submit" class="btn btn-primary py-3 px-5">
              </div>
            </form>
<?php } 

else { 
					$applicant = new Applicants();
                    $appl  = $applicant->single_applicant($_SESSION['APPLICANTID']);

					
?>
	
	
	
	
	<form action="Company_Register2.php" class="bg-white p-5 contact-form">
              <div class="form-group">
               <input name="JOBID" type="hidden" value="<?php echo $_GET['job'];?>">
			   <input name="COMPANYNAME" type="hidden" value="<?php echo $_GET['company'];?>">
			   <input name="OCCUPATIONTITLE" type="hidden" value="<?php echo $_GET['for'];?>">
			   <input name="APPLICANTIDCHK" type="hidden" value="<?php echo $_SESSION['APPLICANTID'];?>">
			   <input name="SESSIONSET" type="hidden" value="1">
               <input class="form-control " id="FNAME" name="FNAME" placeholder=
                  "Firstname" type="text" value="<?php echo  $appl->FNAME ?>"  onkeyup="javascript:capitalize(this.id, this.value);">
              </div>
			  
              <div class="form-group">
                   <input  class="form-control " id="LNAME" name="LNAME" placeholder="Lastname" value="<?php echo  $appl->LNAME ?>" onkeyup="javascript:capitalize(this.id, this.value);">
              </div>
              <div class="form-group">
                <input  class="form-control " id="MNAME" name="MNAME" placeholder="Middle Name" onkeyup="javascript:capitalize(this.id, this.value);" > 
              </div>
              <div class="form-group"> 
                  <textarea class="form-control " id="ADDRESS" name="ADDRESS" placeholder="Address" type="text" value="" required  onkeyup="javascript:capitalize(this.id, this.value);" ></textarea>
              </div>

              <div class="form-group">   
                Sex:
				<input id="optionsRadios2"   name="optionsRadios" type="radio" value="Male"> Male 
                    <input checked id="optionsRadios1" checked="True" name="optionsRadios" type="radio" value="Female"> Female  
              </div>


    <div class="form-group">  Date of Birth  
        <select class="form-control-2" name="month">
          <option>Month</option>
          <?php

             $mon = array('Jan' => 1 ,'Feb'=> 2,'Mar' => 3 ,'Apr'=> 4,'May' => 5 ,'Jun'=> 6,'Jul' => 7 ,'Aug'=> 8,'Sep' => 9 ,'Oct'=> 10,'Nov' => 11 ,'Dec'=> 12 );    
          
        
            foreach ($mon as $month => $value ) {
              
                  # code...
                   echo '<option value='.$value.'>'.$month.'</option>';
                } 
          ?>
        </select> 
        <select class="form-control-2" name="day">
          <option>Day</option>
        <?php 
          $d = range(31, 1);
          foreach ($d as $day) {
            echo '<option value='.$day.'>'.$day.'</option>';
          }
        
        ?>
          
        </select> 
        <select class="form-control-2" name="year">
          <option>Year</option>
        <?php 
          $years = range(2021, 1900);
          foreach ($years as $yr) {
            echo '<option value='.$yr.'>'.$yr.'</option>';
          }
        
        ?>
        
        </select>
      </div> 
 
              <div class="form-group">  
                <textarea class="form-control " id="BIRTHPLACE" name="BIRTHPLACE" placeholder= "Place of Birth" type="text" value="" required  onkeyup="javascript:capitalize(this.id, this.value);" ></textarea>
              </div>
              <div class="form-group"> 
                 <input class="form-control " id="TELNO" name="TELNO" placeholder= "Contact No." type="text" any value="" required  onkeyup="javascript:capitalize(this.id, this.value);" >
              </div>
              <div class="form-group">
                    <select class="form-control " name="CIVILSTATUS" id="CIVILSTATUS">
                        <option value="none" >Select Civil Status</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Widow" >Widow</option> 
                    </select> 
                
              </div>
              <div class="form-group">
                  <input  class="form-control " id="DEGREE" name="DEGREE" placeholder="Educational Attainment"    onkeyup="javascript:capitalize(this.id, this.value);" >
                
              </div>


             <div class="form-group"> 
                 Attach your Resume here. 
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input name="MAX_FILE_SIZE" type="hidden" value="1000000"> 
            </div>  


              <div class="form-group">
                <input type="checkbox"> By Sign up you are agree with our <a href="#">terms and condition</a> 
              </div> 

              <div class="form-group">  
                <input type="submit" value="Submit Application at <?php echo $_GET['company'];?>" name="submit" class="btn btn-primary py-3 px-5">
              </div>
            </form>
			
<?php } ?>
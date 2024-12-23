<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">



	<!-- Latest compiled and minified JavaScript -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<style type="text/css">
		body {
			font: 14px sans-serif;
		}

		.wrapper {
			width: 350px;
			padding: 20px;
		}
		
	</style>
<div class="col-md-4 col-sm-6 my-2">
	<div class="card m-auto job" style="width: 20rem;">
		<div class="card-body">
			<h4 class="card-title"><?php echo $row->OCCUPATIONTITLE ?></h4>
			<p class="card-text"><?php echo $row->JOBDESCRIPTION ?></p>
			<p class="card-text company"><?php echo $row->COMPANYNAME ?></p>


			<div style="display: flex; justify-content: space-between; align-items: center;">
				<div style="font-weight: 600;font-size:20px">₹<span class="salary"><?php echo $row->SALARIES ?></span></div>

				<!-- Button save jobs -->
				
				  <a href="index.php?q=apply&job=<?php echo $row->JOBID;?>&view=personainfo&company=<?php echo $COMPANYNAME?>&for=<?php echo $row->OCCUPATIONTITLE?>" class="btn btn-primary py-2 mr-1">APPLY</a>
              
				<!-- Button apply jobs -->
				<!--<button type="button" class="btn apply-button"
					data-pid="<?php //echo $row->JOBID ?>"
					data-target="#applyModal" data-toggle="modal">
					<span class="text-white">
						Apply
					</span>
				</button>-->
				
				</div>
				</div>
				</div>
				</div>
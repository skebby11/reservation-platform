<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
	<link rel="stylesheet" href="style.css">
	

	<title>Reserve now</title>
</head>
<body>

<div class="container">
	
	<h1 class="mid-padding">Make your reservation</h1>
	
	<form method="post" action="prenota.php" class="mid-padding">

		<?php echo display_error(); ?>
		

		<div class="form-group row">
   		 <label for="inputEmail3" class="col-sm-2 col-form-label">Full name</label>
   		 <div class="col-sm-10">
     		 <input type="text" name="nomecliente" class="form-control" placeholder="Name and surname">
    	 </div>
 	    </div>
		<div class="form-group row">
   		 <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
   		 <div class="col-sm-10">
     		 <input type="email" name="mailcliente" class="form-control" placeholder="Email">
    	 </div>
 	    </div>
		<div class="form-group row">
   		 <label for="inputEmail3" class="col-sm-2 col-form-label">Phone</label>
   		 <div class="col-sm-10">
     		 <input type="number" name="telcliente" class="form-control" placeholder="Phone number">
    	 </div>
 	    </div>
		<div class="form-group row">
   		 <label for="inputEmail3" class="col-sm-2 col-form-label">Arrival date </label>
   		 <div class="col-sm-10">
     		 <input type="date" name="dataarrivo" min="<?php echo($mindate) ?>" class="form-control">
    	 </div>
 	    </div>
		<div class="form-group row">
   		 <label for="inputEmail3" class="col-sm-2 col-form-label">Departure date</label>
   		 <div class="col-sm-10">
     		 <input type="date" name="datapartenza" min="<?php echo($mindate) ?>" class="form-control">
    	 </div>
 	    </div>
		
		<div class="form-group row">
    		<div class="col-sm-2"></div>
    			<div class="col-sm-10">
      				<div class="form-check">
        				<input class="form-check-input" type="checkbox" id="gridCheck1">
       						 <label class="form-check-label" for="gridCheck1">
         						 I agree website's terms and conditions and policy
        					 </label>
      				</div>
    			</div>
  		</div>
  		<div class="form-group row">
    		<div class="col-sm-10">
      			<button type="submit" class="btn btn-primary" name="reserve">Submit your reservation</button>
    		</div>
  		</div>

	</form>
	
</div>
	
	
<!-- script -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
	
</body>
</html>
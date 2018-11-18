<?php

	include('functions.php');
	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

?>

<!DOCTYPE html>
<html>
<head>
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
	<link rel="stylesheet" href="style.css">
	

	<title>Admin dashboard</title>
</head>
<body>
	
<div class="container">
	
	<h1 class="mid-padding">Reservations dashboard</h1>

	<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
				<br>
			</div>
		<?php endif ?>
	
	<table class="table table-sm table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Client name</th>
      <th scope="col">Arrival date</th>
      <th scope="col">Departure date</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
    </tr>
  </thead>
  <tbody>
    <?php 
	$resquery = "SELECT id, cliente, arrivo, partenza, mail, phone FROM prenotazioni ORDER BY arrivo ASC ";
	$resresults = mysqli_query($db, $resquery);
	
	if (mysqli_num_rows($resresults) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($resresults)) {
        echo "
      <tr>
	  <th scope='row'>" . $row["id"] . "</th>
      <td>" . $row["cliente"] . "</td>
      <td>" . $row["arrivo"] . "</td>
      <td>" . $row["partenza"] . "</td>
      <td>" . $row["mail"] . "</td>
      <td>" . $row["phone"] . "</td>
	  </tr>"; }
	} else {
    echo "No reservations at the moment!";} ?>
  </tbody>
</table>
	
</div>
	
<!-- script -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>
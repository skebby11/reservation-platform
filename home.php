<?php 
	include('functions.php');
?>


			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
				<br>
			</div>
 
<?php echo ($nomecliente . $dataarrivo); ?>
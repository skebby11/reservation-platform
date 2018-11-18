<?php

	session_start();

	//GLOBAL DB
	$db = mysqli_connect('localhost', 'rivacms', '', 'my_rivacms');

	
	//global vars
	$time = date("d/m/Y - H:i:s");
	$year = date("Y");
	$month = date("m");
	$monthday = date('d');
	$mindate = $year . '-' . $month. '-'. $monthday;

	// call the reservation() function if reserve is clicked
	if (isset($_POST['reserve'])) {
		reservation();
	}

	
	//reservation func
	function reservation(){
		global $db, $errors;
		
		// receive reserv info
		$nomecliente = e($_POST['nomecliente']);
		$mailcliente = e($_POST['mailcliente']);
		$telcliente = e($_POST['telcliente']);
		$dataarrivo = e($_POST['dataarrivo']);
		$datapartenza = e($_POST['datapartenza']);

		// form validation: ensure that the form is correctly filled
		if (empty($nomecliente)) { 
			array_push($errors, "Name is required"); 
		}
		if (empty($mailcliente)) { 
			array_push($errors, "Email is required"); 
		}
		if (empty($telcliente)) { 
			array_push($errors, "Phone number is required"); 
		}
		if (empty($dataarrivo)) { 
			array_push($errors, "Arrival date is required"); 
		}
		if (empty($datapartenza)) { 
			array_push($errors, "Leaving date is required"); 
		}
		
		// add reservation if no errors 
		if(count($errors) == 0) {
			$addresquery = "INSERT INTO prenotazioni (cliente, arrivo, partenza, mail, phone)
									VALUES('$nomecliente', '$dataarrivo', '$datapartenza', '$mailcliente', '$telcliente')";
			mysqli_query($db, $addresquery);
			$_SESSION['success'] = "Reservation successfully added!";
			header('location: home.php');
		}

		
	}

	// call the login() function if login_btn is clicked
	if (isset($_POST['login_btn'])) {
		login();
	}
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['user']);
		header("location: home.php");
	}

	// LOGIN USER
	function login(){
		global $db, $username, $errors;
		// grap form values
		$username = e($_POST['username']);
		$password = e($_POST['password']);
		// make sure form is filled properly
		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}
		// attempt login if no errors on form
		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
			$results = mysqli_query($db, $query);
			if (mysqli_num_rows($results) == 1) { // user found
				// check if user is admin or user
				$logged_in_user = mysqli_fetch_assoc($results);
				if ($logged_in_user['user_type'] == 'admin') {
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
					header('location: dashboard.php');		  
				}else{
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
					header('location: dashboard.php');
				}
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

	function isLoggedIn()
	{
		if (isset($_SESSION['user'])) {
			return true;
		}else{
			return false;
		}
	}

	function isAdmin()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
			return true;
		}else{
			return false;
		}
	}

	// escape string
	function e($val){
		global $db;
		return mysqli_real_escape_string($db, trim($val));
	}

	//errors
	function display_error() {
		global $errors;
		if (count($errors) > 0){
			echo '<div class="error">';
				foreach ($errors as $error){
					echo $error .'<br>';
				}
			echo '</div>';
		}
	}
<?php
session_start();
if(isset($_SESSION['Username']) && !empty($_SESSION['Username'])){
header("location:profile.php");
}

?>


<!DOCTYPE html>
<html>
<body>
<head>
	
	<link rel="stylesheet" href="bootstrap.css">
	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap-theme.css">
	<link rel="stylesheet" href="bootstrap-theme.min.css">
	<link rel="stylesheet" href="main.css" type="text/css">
	<script type = "text/javascript" src = "script1.js"></script>
</head>
	<div class='nav'>
		<div class='container'>
	<ul class="pull-left">
		<li><a href="#">Home</a></li>
		<li><a href="#">About</a></li>
	</ul>
	<ul class="pull-right">
		<li><a href="login.php">Log In</a></li>
		<li><a href="register.php">Sign Up</a></li>
		<li><a href="#">Help</a></li>
	</ul>
		</div>
	</div>
	<div class='jumbotron'>
		<div class='container'>
			<h1>Find a place to PARTY!!!</h1>
			<p>Find from around 2,500 places in 37 cities around the county<p>
		</div>
	</div>
	<div class="PLACE">
		<div class="container">
			<h2>Not sure where to party?</h2>
			<p>We've categorised the places, it will make your search easy</p>
			<div class="row">
			<div class="col-md-4">
			<div class="thumbnail">
			<img src="blue_frog-001190.jpg">
			</div>
			<div class="thumbnail">
			<img src="blue_frog-001190.jpg">
			</div>
			</div>
			<div class="col-md-4">
			<div class="thumbnail">
			<img src="restaurant.jpg">
			</div>
			<div class="thumbnail">
			<img src="banquet.jpg">
			</div>
			</div>
			<div class="col-md-4">
			<div class="thumbnail">
			<img src="blue_frog-001190.jpg">
			</div>
			</div>
			</div>
	</div>
	</div>
	<div class='learn-more'>
	<div class='container'>
	<div class="row">
	<div class="col-md-4">
		<h3>PARTY</h3>
		<p>From marriage gardens and banquet halls to restaurant and discotheques: party at best places in 37 cities</p>
		<a href="#">See how to party on Boozers</a>
	</div>
	<div class="col-md-4">
		<h3>Host</h3>
		<p>Rent out your Marriage gardens, Banquet Halls, get your tables booked and much more</p>
		<a href="#">Learn more about Hosting at <strong>Boozer</strong></a>
	</div>
	<div class="col-md-4">
		<h3>Trust</h3>
		<p>Verified Party places, and customer support we've got your back.<p>
		<a href="#">Learn more about Trust at <strong>Boozers</strong></a>
	</div>
	</div>
	</div>
	</div>
	
	
</body>
</html>

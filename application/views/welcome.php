<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>

<html>
<head>
	<style type="text/css">
	.boxed-section{
		border: 2px solid gray;
		border-radius: 5px;
		padding: 15px;
		width: 300px;
	}
	.blocks{
		display: inline-block;
	}
	h3{
		width: 150px;
		display: inline-block;
	}
	button{
		float:right;
	}
</style>
	<title>Welcome</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<title>Login and Registration</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-10 blocks">
				<h3 class="blocks">Welcome <?= $first_name ?>!</h3>
			</div>
			<div class="col-md-2">
				<a href="/logoff"><button class="btn btn-danger blocks">Log Off</button></a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="row boxed-section">
					<div class="col-md-12">
						<p>First Name: <?= $first_name ?></p>
						<p>Last Name: <?= $last_name ?></p>
						<p>Email Address: <?= $email ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
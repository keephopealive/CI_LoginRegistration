<html>
<head>
	<style type="text/css">
	.boxed-section{
		border: 2px solid gray;
		border-radius: 5px;
		padding: 15px;
		width: 300px;
	}
	.float-right{
		float:right;
	}
	.center-red{
		text-align: left;
		color: red;
		font-weight: bold;
		font-size: 14;
	}
	</style>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css"> -->
	<title>Login and Registration</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Log In</h1>
				<?php if($this->session->flashdata("login_attempt"))
				{
					echo "<p class='center-red'>" . $this->session->flashdata("login_attempt") . "</p>";
				} ?>
				<div class="row boxed-section">
					<!-- LOGIN FORM -->
					<form method="post" action="/session/create">
						<div class="col-md-offset-2 col-md-4">
							<div class="form-group">
								<label>Email:</label>
								<input type="email" name="email" class="form-control">
							</div>
							<div class="form-group">
								<label>Password:</label>
								<input type="password" name="password" class="form-control">
							</div>
							<input type="submit" value="Login" class="btn btn-success float-right">
						</div>
					</form>
					<!-- END -->
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h1>Register</h1>
				<?= $this->session->flashdata('registration_errors'); ?>
				<div class="row boxed-section">
					<!-- REGISTRATION FORM -->
					<form method="post" action="/user/create">
						<div class="col-md-offset-2 col-md-4">
							<div class="form-group">
								<label>First Name:</label>
								<input type="text" name="first_name" class="form-control">
							</div>
							<div class="form-group">
								<label>Last Name:</label>
								<input class="form-control" type="text" name="last_name">
							</div>
							<div class="form-group">
								<label>Email Address:</label>
								<input class="form-control" type="text" name="email">
							</div>
							<div class="form-group">
								<label>Password:</label>
								<input class="form-control" type="password" name="password">
							</div>
							<div class="form-group">
								<label>Confirm Password:</label>
								<input class="form-control" type="password" name="confirm_password">
							</div>
							<input type="submit" value="Register" class="btn btn-primary float-right">
						</div>
					</form>
					<!-- END -->
				</div>
			</div>
		</div>
	</div>

</body>
</html>
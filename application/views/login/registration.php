<html>
<head>
	<title>Home</title>
	<meta charset="utf-8" />
	<meta name="description" content="This website is using Twitter Bootstrap"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/js/bootstrap.min.js">
	<link rel="stylesheet" type="text/css" href="assets/partials/footer.css">
</head>
<body>
<!-- this loads the header we use for login and registration -->
	<?php $this->load->view('partials/login_header');?>
	
	<div class="container">	
		<h1>Register</h1>
		<div class="row">
			<div class="col-md-6">
<!-- this is the form the user will user to register for the site -->
				<form action="registration" method="post">
				  <div class="form-group">
				    <label for="first_name">First Name</label>
				    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Your First Name">
				  </div>
				   <div class="form-group">
				    <label for="last_name">Last Name</label>
				    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Your Last Name">
				  </div>
				  <div class="form-group">
				    <label for="email">Email Address</label>
				    <input type="text" class="form-control" name="email" id="email" placeholder="Enter Your Email">
				  </div>
				   <div class="form-group">
				    <label for="password">Password</label>
				    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
				  </div>
				   <div class="form-group">
				    <label for="passconf">Confirm Password</label>
				    <input type="password" class="form-control" name="passconf" id="passconf" placeholder="Confirm Your Password">
				  </div>
				  <button type="submit" class="btn btn-success">Sign Up</button>
				</form>

				<p>Already have an account? Login<a href="/sign_in"> here</a></p>
			</div>
			<div class="col-md-6 text-center alert alert-danger alert-dismissable fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<!--We show the user the error messages generated from the login/registration controller-->
				<?php echo $this->session->flashdata("form_validation"); ?>
			</div>
		</div>
	</div>
<!-- end of registration form -->

<!-- footer -->
	<?php $this->load->view('partials/footer') ?>
<!-- end of footer-->
</body>
</html>
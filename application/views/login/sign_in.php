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
<!-- this gets our header that doesnt't have the active class on the home link in the navbar-->
	<?php $this->load->view('partials/login_header');?>

	
	<!--  $this->session->flashdata("user_error");  -->
	
	<div class="container">
	  	<h1>Sign In</h1>
		<div class="row">
			<div class="col-md-6">
<!-- form for a user to sign into the site-->
				<form action="login/sign_in" method="post"> <!-- create a route shortcut after merging -->
				  <div class="form-group">
				    <label for="email">Email Address</label>
				    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email">
				  </div>
				  <div class="form-group">
				    <label for="password">Password</label>
				    <input type="password" class="form-control" name="password" id="password" placeholder="Your Password">
				  </div>
				  <button type="submit" class="btn btn-success">Sign In</li></button>
				</form>
			</div>
			<div class="alert alert-danger" role="alert">
				<?= $this->session->flashdata("user_error"); ?>
			</div>
		</div>

		<p>Don't have an account? Register<a href="/register"> here</a></p>
	</div>
<!-- end of form for the user to sign in -->

<!-- footer -->
	<?php $this->load->view('partials/footer') ?>
<!-- end of footer-->

</body>
</html>
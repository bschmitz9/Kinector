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
	<!-- this loads the header navbar for index page, the user sees this page when they first come to the site -->
	<?php $this->load->view('partials/welcome_header') ?>

	<!-- container for the index page, welcomes the user -->
	<div class="container">
		<div class="jumbotron">
		  		<h1>Welcome to Your User Dashboard!</h1>
		  		<p>Connect with friends, family, and everyone in between with your very own user dashboard! Stay connected by posting comments on other user's profiles.
		  			So what are you waiting for? Get started today!</p>
		  		<p><a class="btn btn-primary btn-lg" href="register" role="button">Register Here</a></p>
		</div>
	<!-- end of jumbotron -->

	<!-- intro information for the user to see on the index page-->
		<div class="row">
			<div class="col-md-4">
				<h3>Manage Users</h3>
				<p>Using the application, you'll learn how to add, remove, and add users to the application!<p>

			</div>
			<div class="col-md-4">
				<h3>Leave Messages</h3>
				<p>When you enter the dashboard, easily find and add messages, post comments, and stay connected with the people that matter to you the most!</p>
			</div>
			<div class="col-md-4">
				<h3>Edit User Information</h3>
				<p>As an administrator your will be able to monitor the activity with your network. Ensuring that the network is up to the level you had intended when you created it!</p>
			</div>
		</div>
	<!-- end of the welcome information -->
	</div>

<!-- footer -->
	<?php $this->load->view('partials/footer') ?>
<!-- end of footer-->

</body>
</html>
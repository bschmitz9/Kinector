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
	<style type="text/css">
		.name{
			color:green;
		}
		.registerButton{
			margin-top: 20px;

		}

		.info{
			margin-top:300px;
			border-top:1px solid gray;
		}
		.homePic{
			margin-right: 153px;
		}
		.introInfo{
			color:green;
		}

	</style>
</head>
<body>
	<!-- this loads the header navbar for index page, the user sees this page when they first come to the site -->
	<?php $this->load->view('partials/welcome_header') ?>

	<!-- container for the index page, welcomes the user -->
	<div class="container">
		  		<h1 class="name">Kinector</h1>
		  		<h3>Connect with friends, family, and everyone in between with Kinector!</h3>
		  		<p class="registerButton text-center"><a class="btn btn-success btn-lg" href="register" role="button">Register Here</a></p>
		  		<img src="/assets/images/drawing.jpeg" class="pull-right homePic" alt="image"/>
	

	<!-- intro information for the user to see on the index page-->
		<div class="row info">
			<div class="col-md-4">
				<h3 class="introInfo"><i class="fa fa-users"></i> Manage Users</h3>
				<p>Using the application, you'll learn how to add, remove, and add users to the application!<p>

			</div>
			<div class="col-md-4">
				<h3 class="introInfo"><i class="fa fa-envelope"></i> Leave Messages</h3>
				<p>When you enter the dashboard, easily find and add messages, post comments, and stay connected with the people that matter to you the most!</p>
			</div>
			<div class="col-md-4">
				<h3 class="introInfo"><i class="fa fa-pencil"></i> Edit User Information</h3>
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
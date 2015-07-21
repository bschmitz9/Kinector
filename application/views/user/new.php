<html>
<head>
	<title>Add a new user</title>
	<link rel="stylesheet" type="text/css" href="/assets/bootstrap/css/bootstrap.min.css">

	<style type="text/css">
		.container {
			width: 70%;
			margin:0 auto;
		}
		button{
			margin-top:4%;
		}
		.addform{
			padding:0;
		}

	</style>
</head>
<body>
	<?php $this->load->view('partials/welcome_header') ?>	
	<div class='container'>
		<div class='row'>
			<div class='col-md-6'>
				<h3>Add a new user</h3>
			</div>
			<div class='col-md-6'>
				<form action='/dashboard/admin_dashboard' method='post'>
					<button type="submit" class="btn btn-primary pull-right head">Return to Dashboard</button>
				</form>
			</div>
		</div>
		<div class='col-md-4 addform'>
			<form action='/add' method='post'>
			   <div class="form-group">
			    <label for="first_name">First Name</label>
			    <input type="text" class="form-control" id="first_name" placeholder="Your First Name" name='first_name'>
			  </div>
			   <div class="form-group">
			    <label for="last_name">Last Name</label>
			    <input type="text" class="form-control" id="last_name" placeholder="Your Last Name" name='last_name'>
			  </div>
			  	  <div class="form-group">
			    <label for="email">Email Adress</label>
			    <input type="email" class="form-control" id="email" placeholder="Enter Your Email" name='email'>
			  </div>
			  <div class="form-group">
			    <label for="password">Password</label>
			    <input type="password" class="form-control" id="password" placeholder="Password" name='password'>
			  </div>
		    <div class="form-group">
			    <label for="passconf">Confirm Password</label>
			    <input type="password" class="form-control" id="passconf" placeholder="Confirm Your Password" name='passconf'>
			  </div>
			  <button type="submit" class="btn btn-success pull-right">Create</button>
			</form>
		</div>
	</div>	

	<!-- footer -->
		<?php $this->load->view('partials/footer') ?>
	<!-- end of footer-->


</body>
</html>
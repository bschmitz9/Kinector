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
			margin-top:3%;
		}
		.addform{
			padding:0;
		}
		.bordered{
			border:1px solid black;
			padding:3%;
		}
		.desc{
			margin-top: 5%;
		}

	</style>
</head>
<body>
	<?php $this->load->view('partials/welcome_header') ?>	
	<div class='container'>
		<div class='row'>
			<div class='col-md-6'>
				<h3>Edit Profile</h3>
			</div>
			<div class='col-md-6'>
				<form action='' method='post'>
					<button type="button" class="btn btn-primary pull-right head">Return to Dashboard</button>
				</form>
			</div>
		</div>
		<div class='row'>
			<div class='col-md-6 bordered'>
				<h4>Edit Information</h4>
				<form action='' method='post'>
				  	<div class="form-group">
				    	<label for="email">Email Address</label>
				    	<input type="email" class="form-control" id="email" placeholder="Enter Your Email" name='email'>
				  	</div>
				   	<div class="form-group">
				    	<label for="first_name">First Name</label>
				    	<input type="text" class="form-control" id="first_name" placeholder="Your First Name" name='first_name'>
				 	</div>
				   	<div class="form-group">
					    <label for="last_name">Last Name</label>
					    <input type="text" class="form-control" id="last_name" placeholder="Your Last Name" name='last_name'>
			  		</div>
			  		<button type="submit" class="btn btn-success pull-right">Save</button>
				</form>
			</div>
			<div class='col-md-5 pull-right bordered'>
				<h4>Change Password</h4>
				<form action='' method='post'>
				  	<div class="form-group">
				    	<label for="password">Password</label>
				    	<input type="password" class="form-control" id="password" placeholder="Your Password">
				  	</div>
		    		<div class="form-group">
			    		<label for="passconf">Confirm Password</label>
			    		<input type="password" class="form-control" id="passconf" placeholder="Confirm Your Password" name='passconf'>
			  		</div>
			  		<button type="submit" class="btn btn-success pull-right">Update Password</button>
				</form>
			</div>
			<div class='col-md-12 bordered desc'>
				<form>
					<h4>Edit Description</h4>
					<textarea class="form-control" rows="4"></textarea>
					<button type="submit" class="btn btn-success pull-right">Save</button>
				</form>

			</div>
		</div>	
	</div>
	


</body>
</html>
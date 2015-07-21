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
				<h3>Edit User #<?= $user['id'] ?></h3>
			</div>
			<div class='col-md-6'>
				<form action='/dashboard/admin_dashboard' method='post'>
					<button type="submit" class="btn btn-primary pull-right head">Return to Dashboard</button>
				</form>
			</div>
		</div>
		<?php 	if($this->session->flashdata('login_error'));
		{
			echo $this->session->flashdata('login_error');
		}
		if($this->session->flashdata('success')){
			echo $this->session->flashdata('success');
		}
			?>
		<div class='row'>
			<div class='col-md-6 bordered'>
				<h4>Edit Information</h4>
				<form action='/Users/update_info_admin' method='post'>
				  	<div class="form-group">
				    	<label for="email">Email address</label>
				    	<input type="email" class="form-control" id="email" placeholder="Enter Email Address" name='email' value="<?= $user['email']  ?>">
				  	</div>
				   	<div class="form-group">
				    	<label for="first_name">First Name</label>
				    	<input type="text" class="form-control" id="first_name" placeholder="Enter First Name" name='first_name' value="<?= $user['first_name']  ?>">
				 	</div>
				   	<div class="form-group">
					    <label for="last_name">Last Name</label>
					    <input type="text" class="form-control" id="last_name" placeholder="Enter Last Name" name='last_name' value="<?= $user['last_name']  ?>">
			  		</div>
			  		
			  		 	<label for="user_level">User Level</label>
				  		<select class='form-control' id="user_level" name="user_level">
							<option value="<?= $user['user_level'] ?>">User Level</option>
							<option value='1'>Normal</option>
							<option value='9'>Admin</option>
						</select>
					<input type="hidden" name='id' value="<?= $user['id'] ?>" >
			  		<button type="submit" class="btn btn-success pull-right">Save</button>
				</form>
			</div>
			<div class='col-md-5 pull-right bordered'>
				<h4>Change Password</h4>
				<form action='/Users/update_password_admin' method='post'>
				  	<div class="form-group">
				    	<label for="password">Password</label>
				    	<input type="password" class="form-control" id="password" placeholder="Temporary Password" name='password'>
				  	</div>
		    		<div class="form-group">
			    		<label for="passconf">Confirm Password</label>
			    		<input type="password" class="form-control" id="passconf" placeholder="Confirm Temporary Password" name='passconf'>
			  		</div>
			  		<button type="submit" class="btn btn-success pull-right">Update Password</button>
			  		<input type="hidden" name='id' value="<?= $user['id'] ?>" >
				</form>
			</div>
		</div>	
	</div>
	<!-- footer -->
	<?php $this->load->view('partials/footer') ?>
	<!-- end of footer-->
</body>
</html>
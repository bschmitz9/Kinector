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
		.head{
			margin-top:4%;
		}
		.addform{
			padding:0;
		}
		.bordered{
			padding:3%;
		}
		.desc{
			margin-top: 5%;
		}

	</style>
</head>
<body>
	<?php $this->load->view('partials/users'); ?>	


	<div class='container'>
		<div class='row'>
			<div class='col-md-6'>
				<h3>Edit Profile</h3>
			</div>
			<div class='col-md-6'>
				<form action='/dashboard/user_dashboard' method='post'>
					<a href="/dashboard/user_dashboard" type="button" class="btn btn-success pull-right head">Return to Dashboard</a>
				</form>
			</div>
		</div>
		<div class='row'>
<?php 	if($this->session->flashdata('login_error'));
		{
			echo $this->session->flashdata('login_error');
		}
		if($this->session->flashdata('success')){
			echo $this->session->flashdata('success');
		}
			?>
			</div>
		<div class='row'>
			<div class='col-md-6 bordered'>
				<h4>Edit Information</h4>
				<form action='/Users/update_info' method='post'>
				   	<div class="form-group">
				    	<label for="first_name">First Name</label>
				    	<input type="text" class="form-control" id="first_name" name='first_name' value="<?= $user['first_name']  ?>">
				 	</div>
				   	<div class="form-group">
					    <label for="last_name">Last Name</label>
					    <input type="text" class="form-control" id="last_name" name='last_name' value="<?= $user['last_name']  ?>">
			  		</div>
			  		  <div class="form-group">
				    	<label for="email">Email Address</label>
				    	<input type="email" class="form-control" id="email" name='email' value="<?= $user['email']  ?>">
				  	</div>
			  		<button type="submit" class="btn btn-success pull-right">Save</button>
			  		<input type="hidden" name='id' value="<?= $user['id'] ?>" >
			  		<input type="hidden" name='user_level' value="<?= $user['user_level'] ?>" >

				</form>
			</div>
			<div class='col-md-5 pull-right bordered'>
				<h4>Change Password</h4>
				<form action='/Users/update_password' method='post'>
				  	<div class="form-group">
				    	<label for="password">Password</label>
				    	<input type="password" class="form-control" name='password'id="password" placeholder="Your Password">
				  	</div>
		    		<div class="form-group">
			    		<label for="passconf">Confirm Password</label>
			    		<input type="password" class="form-control" id="passconf" name="passconf" placeholder="Confirm Your Password" name='passconf'>
			  		</div>
			  		<button type="submit" class="btn btn-success pull-right">Update Password</button>
			  		<input type="hidden" name='id' value="<?= $user['id'] ?>" >
				</form>
			</div>
			<div class='col-md-12 bordered desc'>
				<form action='/Users/update_description' method='post'>
					<h4>Edit Your Description</h4>
					<textarea class="form-control" name='description' rows="4"><?= $user['description'] ?></textarea>
					<button type="submit" class="btn btn-success pull-right">Save</button>
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
<html>
<head>
	<title>Show User</title>
	<link rel="stylesheet" type="text/css" href="/assets/bootstrap/css/bootstrap.min.css">
	<style type="text/css">
		.comment{
			border: 1px solid black;
		}
		.message{
			border: 1px solid black;	
		}

	</style>
</head>
<body>
	<?php $this->load->view('partials/welcome_header'); 
	var_dump($user);
	var_dump($messages);
	var_dump($comments);
	?>	
	<div class="container">
		<div class='col-md-5'>
		<table class='table col-md-5'>
			<thead>
				<th>Michael Choi</th>
				<th><a href="">Edit your profile</a></th>
			</thead>
			<tr>
				<td>Registered at:</td>
				<td>December 24th 2012</td>
			</tr>
				<tr>
				<td>User ID</td>
				<td>#1</td>
			</tr>
				<tr>
				<td>Email address</td>
				<td>michael@village88.com</td>
			</tr>
				<tr>
				<td>Description</td>
				<td>I am happy to be here!</td>
			</tr>
		</table>
		</div>
		<div class='col-md-12 bordered desc'>
			<form>
				<h4>Leave a message for Michael</h4>
				<textarea class="form-control" rows="4"></textarea>
				<button type="submit" class="btn btn-success pull-right">Post</button>
			</form>
		</div>
		<div class='col-md-12'>
			<h5><a href="">Mark Guillen</a> Wrote</h5>
			<p class='message'>Hi Michael! I am having fun building Boom YEAH!</p>
		</div>
		<div class='col-md-11 pull-right'>
			<h5><a href="">Dianne Manlulu</a> Wrote</h5>
			<p class='comment'>Awesome!</p>
		</div>
		<div class='col-md-11 pull-right'>
			<form>
				<textarea class="form-control" rows="4" placeholder="write a message"></textarea>
				<button type="submit" class="btn btn-success pull-right">Post</button>
			</form>
		</div>
		<div class='col-md-12'>
			<h5><a href="">John Supsupin</a> Wrote</h5>
			<p class='message'>Hi Michael! What is the best way to learn to code?</p>
		</div>
		<div class='col-md-11 pull-right'>
			<h5><a href="">KB Tonel</a> Wrote</h5>
			<p class='comment'>Hi John. Have you checked out village 88?</p>
		</div>
		<div class='col-md-11 pull-right'>
			<h5><a href="">KB Tonel</a> Wrote</h5>
			<p class='comment'>Hi John. Have you checked out village 88?</p>
		</div>
		<div class='col-md-11 pull-right'>
			<form>
				<textarea class="form-control" rows="4" placeholder="write a message"></textarea>
				<button type="submit" class="btn btn-success pull-right">Post</button>
			</form>
		</div>














	</div> <!-- end of container -->




</body>
</html>
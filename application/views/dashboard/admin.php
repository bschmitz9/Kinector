<html>
<head>
	<title>User Dashboard</title>
	<link rel="stylesheet" type="text/css" href="/assets/bootstrap/css/bootstrap.min.css">
	<style type="text/css">
		.container {
			width: 70%;
			margin:0 auto;
		}
		button{
			margin-top:4%;
		}
		#delete{
			/*width:50%;*/
			display:inline-block;
		}
	</style>
</head>
<body>
<?php $this->load->view('partials/user') ?>	
	<div class='container'>
		<div class='row col-md-12 '>
				<h3>Manage Users
					<a type="submit" class="btn btn-success pull-right head" href='/dashboard/add_user'>Add new</a></h3>
		</div>
		


<?php if($this->session->userdata('delete'))
		{ 
			$name = $this->session->userdata('delete')['first_name']." " . $this->session->userdata('delete')['last_name'] ;
			$id = $this->session->userdata('delete')['id'];
	
			?>
		<div class='alert alert-danger alert-dismissible row'>
			<p>Are you sure you want to delete <?= $name ?> , user #<?= $id ?></p>
			<form action="/Users/delete/<?= $id ?>" id='delete'>
			<button type="submit" class="btn btn-success" action="/Users/delete/<?= $id ?>" aria-label="Close">
  				<span aria-hidden="true">Yes</span>
  			</form>
			</button>
			<button type="button" class="btn btn-danger" data-dismiss="alert"  aria-label="Close">
  				<span aria-hidden="true">No</span>
			</button>
		

		</div>

		<?php 
		$this->session->unset_userdata('delete');
	} ?>			




			<table class='table table-striped table-bordered' >
				<thead>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Joined</th>
					<th>User Level</th>
					<th>Actions</th>
				</thead>
<?php 
		foreach ($users as $user) { 
				$timestring = strtotime($user['created_at']);
				$date = date("D F j, o", $timestring);
			?>
				<tr>	
					<td><?= $user['id'] ?></td>
					<td><a href="/Users/show/<?= $user['id'] ?>"><?= $user['first_name']." ".$user['last_name']; ?></a></td>
					<td><?= $user['email'] ?></td>
					<td><?= $date ?></td>
					<td><?= $user['user_level'] ?></td>
					<td><a href="/dashboard/edit_admin/<?= $user['id']?>">edit</a> | <a href="/Users/delete_conf/<?= $user['id']?>">remove</a></td>
				</tr>	
<?php		}

 ?>				
			</table>
	</div> <!-- end of container -->
</body>
</html>
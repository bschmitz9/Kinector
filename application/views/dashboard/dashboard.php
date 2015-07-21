<html>
<head>
	<title>User Dashboard</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<style type="text/css">
		.container {
			width: 70%;
			margin:0 auto;
		}
	</style>
</head>
<body>
<?php $this->load->view('partials/users') ?>	
	<div class='container'>
		<h3>All Users</h3>
		<table class='table table-striped table-bordered' >
			<thead>
				<th>ID</th>
				<th>Name</th>
				<th>email</th>
				<th>created_at</th>
			</thead>
<?php foreach ($users as $user) { ?>
				<tr>	
					<td><?= $user['id'] ?></td>
					<td><a href="/Users/show/<?= $user['id'] ?>"><?= $user['first_name']." ".$user['last_name']; ?></a></td>
					<td><?= $user['email'] ?></td>
					<td><?= $user['created_at'] ?></td>
				</tr>	
<?php		}		?>				
		</table>

	</div>
</body>
</html>
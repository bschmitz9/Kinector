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
	// var_dump($user);
	// var_dump($messages);
	// var_dump($comments);
	?>	
	<div class="container">
		<div class='col-md-5'>
			<table class='table col-md-5'>
				<thead>
					<th><?= $user['first_name']. " ". $user['last_name']  ?></th>
					<th><a href="/dashboard/edit/<?= $user['id']  ?>">Edit your profile</a></th>
				</thead>
				<tr>
					<td>Registered on:</td>
					<td><?= $user['created_at']  ?></td>
				</tr>
				<tr>
					<td>User ID</td>
					<td><?= $user['id']  ?></td>
				</tr>
				<tr>
					<td>Email address</td>
					<td><?= $user['email'] ?></td>
				</tr>
				<tr> 
					<td>Description</td>
					<td><?= $user['description'] ?></td>
				</tr>
			</table>
		</div>
		<div class='col-md-12 bordered desc'>
			<form action="/users/post_message" method="post">
				<h4>Leave a message for Michael</h4>
				<input type="hidden" value="<?= $this->session->userdata('id') ?>" name="author_id"/>
				<input type="hidden" value="<?= $user['id']  ?>" name="user_id"/>
				<textarea class="form-control" name="message" rows="4"></textarea>
				<button type="submit" class="btn btn-success pull-right">Post</button>
			</form>
		</div>
		<?php 
			foreach($messages as $message)
			{ 
			if($message['user_id'] === $user['id'])
			{ ?>
				<div class='col-md-12'>
					<h5><a href="/Users/show/<?= $message['author_id'] ?>"><?= $message['name']  ?></a> wrote</h5>
					<p class='message'><?= $message['content'] ?></p>
				</div>
			<?php 
				foreach ($comments as $comment)
				{
					if($comment['message_id'] === $message['id'])
					{ ?>
						<div class='col-md-11 pull-right'>
							<h5><a href="/Users/show/<?= $comment['user_id'] ?>"><?= $comment['name']  ?></a> wrote</h5>
							<p class='comment'><?= $comment['content'] ?></p>
						</div>
				<?php } ?>
			<?php } ?>
				<div class='col-md-11 pull-right'>
					<form action="/users/post_comment" method="post">
						<input type="hidden" value="<?= $this->session->userdata('id') ?>" name="user_id"/>
						<input type="hidden" value="<?= $message['id'] ?>" name="message_id"/>
						<input type="hidden" value="<?= $user['id']  ?>" name="profile_id"/>
						<textarea class="form-control" rows="4" placeholder="write a message" name="message"></textarea>
						<button type="submit" class="btn btn-success pull-right">Post</button>
					</form>
				</div>
			<?php } ?>
		<?php } ?>
		

	</div> <!-- end of container -->

</body>
</html>
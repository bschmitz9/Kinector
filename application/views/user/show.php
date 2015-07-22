<html>
<head>
	<title>Show User</title>
	<link rel="stylesheet" type="text/css" href="/assets/bootstrap/css/bootstrap.min.css">
	<style type="text/css">
		.table{
			/*border and background color for the user table at the top of the page*/
			border: 1px solid black;
			background-color: #F0F0F0;
		}
		.message{
			/*border bottom for message that user sends*/
			border-bottom: 1px solid #C8C8C8;

		}	
		.comment{
			/*give some space between the comment and input field, as well as a light gray color to cover the comment text.*/
			margin-bottom: 10px;
			background-color: #F8F8F8;
		}	
	</style>
</head>
<body>
	<?php $this->load->view('partials/users');?>	
	<div class="container">
		<div class='row'>
			<div class='col-md-5'>
				<table class='table col-md-5'>
					<!-- here we add all the user information for the specific user we clicked on from the user dashboard, it shows at the top of the profile page-->
					<thead>
						<th><?= $user['first_name']. " ". $user['last_name']  ?></th>
						<th><?php if($user['id'] == $this->session->userdata['user_id']) { ?><a href="/dashboard/edit/<?= $user['id']  ?>">Edit your profile</a><?php } ?></th>
					</thead>
					<tr>
						<?php 
							$timestring = strtotime($user['created_at']);
							$date = date("D F j, o", $timestring);?>
						<td><strong>Joined:</strong></td>
						<td><?= $date  ?></td>
					</tr>
					<tr>
						<td><strong>Email address</strong></td>
						<td><?= $user['email'] ?></td>
					</tr>
					<tr> 
						<td><strong>Description</strong></td>
						<td><?php if( $user['description'])
							{?>
								<?= $user['description'] ?>	
							<?php } else 
							{ ?>
								<p>No description available.</p>
							<?php } ?>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<!-- This is our form at the top of the profile page that lets a user post a message the user's profile page that they are on,
		appears just at the top of the page, outside of any loops -->
		<?php if($this->session->userdata('user_id') != 0) { ?>
		<div class="row post">
			<div class='col-md-7 bordered desc'>
				<form action="/users/post_message" method="post">
					<h4>Leave a message for <?= $user['first_name']  ?></h4>
					<input type="hidden" value="<?= $this->session->userdata('user_id') ?>" name="author_id"/>
					<input type="hidden" value="<?= $user['id']  ?>" name="user_id"/>
					<textarea class="form-control" name="message" rows="4"></textarea>
					<button type="submit" class="btn btn-success pull-right">Post</button>
				</form>
			</div>
		</div> <?php } ?>
		<!-- we do a for each loop to loop through all of the messages and comments that we get from our query to the database and input them into the profile,
		a user can also can also post new comments and messages and they are immediately shown on the page-->
		<?php 
		//show messages
			foreach($messages as $message)
			{ 
			if($message['user_id'] === $user['id'])
			{ 
					$timestring = strtotime($message['created_at']);
					$date = date("D F j, o", $timestring);
					$time = date("g:i A", $timestring);
				?>
				<div class='col-md-7'>
					<h5><a href="/Users/show/<?= $message['author_id'] ?>"><?= $message['name']  ?></a> wrote on <?= $date ?> at <?= $time ?>:</h5>
					<p class='message'><?= $message['content'] ?></p>
				</div>
			<?php 
			//show comments
				foreach ($comments as $comment)
				{
					if($comment['message_id'] === $message['id'])
					{ 
							$timestring = strtotime($comment['created_at']);
							$date = date("D F j, o", $timestring);
							$time = date("g:i A", $timestring);
						?>
						<div class='col-md-offset-1 col-md-6'>
							<h5><a href="/Users/show/<?= $comment['user_id'] ?>"><?= $comment['name']  ?></a> commented on <?= $date ?> at <?= $time ?>:</h5>
							<p class='comment'><?= $comment['content'] ?></p>
						</div>
				<?php } ?>
			<?php } ?>
			<!--This is the form that we use for each to allow a user to post a comment for each message on the profile page, this form is 
			wrapped inside the outer foreach loop and the if statement-->
			<?php if($this->session->userdata('user_id') != 0) { ?>
			<div class="row">
				<div class='col-md-offset-1 col-md-6'>
					<form action="/users/post_comment" method="post">
						<input type="hidden" value="<?= $this->session->userdata('user_id') ?>" name="user_id"/>
						<input type="hidden" value="<?= $message['id'] ?>" name="message_id"/>
						<input type="hidden" value="<?= $user['id']  ?>" name="profile_id"/>
						<textarea class="form-control" rows="1" placeholder="Write a comment..." name="message"></textarea>
						<button type="submit" class="btn btn-success pull-right">Post</button>
					</form>
				</div>
			</div>
<?php 		} 
				}
		 	} ?>
	</div> <!-- end of container -->

	<!-- footer -->
		<?php $this->load->view('partials/footer') ?>
	<!-- end of footer-->

</body>
</html>
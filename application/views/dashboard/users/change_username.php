<h2>
	<a href="<?php echo URL::site('dashboard'); ?>">
		Dashboard
	</a>
	&mdash;
	<a href="<?php echo URL::site('dashboard/users/list'); ?>">
		List of Users
	</a>
	&mdash;
	Change Username
</h2>
<?php if (Auth::instance()->get_user()->pk() === $user_id): ?>
	You cannot change your username.
<?php else: ?>
Please, put there new username of user with ID <?php echo $user_id; ?>: <br />
<form action="<?php echo URL::site('dashboard/users/change_username/'.$user_id.'/'.Security::token()); ?>" method="post">
	<input type="text" name="username" value="<?php echo $user->username ?>" />
	<input type="submit" value="OK!" />
</form>
<?php endif; ?>

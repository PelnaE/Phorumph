<h2>Change Password:</h2>
<?php foreach ($users as $user): ?>
<form action="<?php echo URL::site('profile/change_password/'.Security::token()); ?>" method="post">
	E-mail : <input type="email" name="email" value="<?php echo $user->email; ?>"/><br />
	Current Password : <input type="password" name="current_password" /><br />
	New Password : <input type="password" name="password" /><br />
	New Password again : <input type="password" name="password_again" /><br />
	<input type="submit" value="Change!" />
</form>
<?php endforeach; ?>

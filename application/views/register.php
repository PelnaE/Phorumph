<h2>Register:</h2>
<?php if (!empty($errors) && $errors === true): ?>
	There are one or more errors.
<?php endif; ?>
<?php if (!empty($successful) && $successful === true): ?>
	You successful registered your own account! <a href="<?php echo URL::site('/'); ?>">Go Home</a>!
<?php endif; ?>
<form action="<?php echo URL::site('register/index/'.Security::token()); ?>" method="post">
	<table>
		<tr>
			<th>Email</th>
			<td><input type="email" name="email" /></td>
		</tr>
		<tr>
			<th>Username</th>
			<td><input type="text" name="username" /></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" name="password" /></td>
		</tr>
		<tr>
			<th>Password. Again.</th>
			<td><input type="password" name="password_again" /></td>
		</tr>
		<tr>
			<th>Your profile image</th>
			<td><input type="text" name="picture" /></td>
		</tr>
		<tr>
			<th></th>
			<td><input type="submit" value="Register" /></td>
	</table>
</form>

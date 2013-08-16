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
			<td class="title">Email</td>
			<td><input type="email" name="email" /></td>
		</tr>
		<tr>
			<td class="title">Username</td>
			<td><input type="text" name="username" /></td>
		</tr>
		<tr>
			<td class="title">Password</td>
			<td><input type="password" name="password" /></td>
		</tr>
		<tr>
			<td class="title">Password. Again.</td>
			<td><input type="password" name="password_again" /></td>
		</tr>
		<tr>
			<td class="title"></td>
			<td><input type="submit" value="Register" /></td>
	</table>
</form>

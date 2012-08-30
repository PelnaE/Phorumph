<!DOCTYPE html>
<html>
<head>
	<title><?php echo $site_name; ?></title>
	<meta charset="UTF-8" />
</head>
<body>
	<header>
		<h1><a href="<?php echo URL::site(''); ?>"><?php echo $site_name; ?></a></h1>
		<?php if (Auth::is_user_signed_in()) : ?>
			<?php foreach ($users as $user) : ?>
				<h2>Hey, <?php echo $user->username; ?>!</h2>
				<?php if (!empty($user->picture)) : ?>
					<img src="<?php echo $user->picture; ?>" height="50px" align="left" />
				<?php endif; ?>
				You are logged in <?php echo $site_name; ?>!<br />
				<a href="<?php echo URL::site('profile/upload_avatar/'); ?>">Change Avatar</a> |
				<a href="<?php echo URL::site('profile/change_password/'); ?>">Change Password</a> |
				<a href="<?php echo URL::site('logout/index/'.Security::token()); ?>">LogOut</a>
			<?php endforeach; ?>
		<?php else: ?>
			<h2>Login:</h2>
			<form action="<?php echo URL::site('login/index/'.Security::token()); ?>" method="post">
				Username <input type="text" name="username" /><br />
				Password <input type="password" name="password" /><br />
				<label><input type="checkbox" name="cookie" /> Remember me!</label><br />
				<input type="submit" value="Login" />
			</form>
			If you do not have an account, <a href="<?php echo URL::site("register"); ?>">register it there</a>!
		<?php endif; ?>
	</header>
	<?php if (!isset($content)): ?>
		<h2>No View is set</h2>
		<p>Contact administrator.</p>
	<?php else: ?>
		<?php echo $content; ?>
	<?php endif; ?>
	<footer>
		Powered by Phorumph Discussion Board.
		&copy; By reGative. 2012.
	</footer>
</body>
</html>

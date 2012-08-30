<!DOCTYPE html>
<html>
<head>
	<title><?php echo $site_name; ?></title>
	<meta charset="UTF-8" />
</head>
<body>
	<header>
		<h1><a href="<?php echo URL::site(''); ?>"><?php echo $site_name; ?></a></h1>
		<?php if (Session::instance()->get('user_id')) : ?>
			<h2>Hey!</h2>
			You are logged in!<br />
			<a href="<?php echo URL::site('logout/index/'.Security::token()); ?>">LogOut</a>!
		<?php else: ?>
			<h2>Login:</h2>
			<form action="<?php echo URL::site('login/index/'.Security::token()); ?>" method="post">
				Username <input type="text" name="username" /><br />
				Password <input type="password" name="password" /><br />
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

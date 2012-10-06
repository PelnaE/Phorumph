<!DOCTYPE html>
<html>
<head>
	<title><?php echo $site_name; ?></title>
	<meta charset="UTF-8" />
	<style type="text/css">
		footer {
			clear: both;
		}
		header ul
		{
			clear: both;
		}
		header p
		{
			padding:0;
			margin: 0;
		}
	</style>
</head>
<body>
	<header>
		<h1><a href="<?php echo URL::site(''); ?>"><?php echo $site_name; ?></a></h1>
		<?php if (Auth::is_user_signed_in()) : ?>
			<?php foreach ($users as $user) : ?>
				<?php if (!empty($user->picture)) : ?>
					<img src="<?php echo $user->picture; ?>" height="50px" align="left" />
				<?php endif; ?>
				<h2>
					Hey, <a href="<?php echo URL::site('profile/view/'.$user->id); ?>"><?php echo HTML::chars($user->username); ?></a>!
					(<a href="<?php echo URL::site('logout/index/'.Security::token()); ?>">Logout</a>)
				</h2>
				Today is <?php echo date('l', time()); ?>, the
				<?php echo date('W', time()); ?> week of the year
				<?php echo date('Y', time()); ?>!
				Or, simpler - <?php echo date('d.m.Y H:i:s T', time()); ?>

			<?php endforeach; ?>
		<?php else: ?>
			<h2>Login:</h2>
			<form action="<?php echo URL::site('login/index/'.Security::token()); ?>" method="post">
				Username <input type="text" name="username" />
				<a href="<?php echo URL::site('forgot_password/'); ?>">Forgot Password?</a>
				<br />
				Password <input type="password" name="password" /><br />
				<label><input type="checkbox" name="cookie" /> Remember me!</label><br />
				<input type="submit" value="Login" />
			</form>
			If you do not have an account, <a href="<?php echo URL::site("register"); ?>">register it there</a>!
		<?php endif; ?>
	</header>
    <?php if (Auth::is_user_signed_in()): ?>
        <h3><a href="<?php echo URL::site('topic/new'); ?>">Start a new discussion.</a></h3>
    <?php endif; ?>
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

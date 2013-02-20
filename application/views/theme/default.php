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

		<h1>
			<a href="<?php echo URL::site(''); ?>">
				<?php echo $site_name; ?>
			</a>
		</h1>

		<?php echo $header; ?>

	</header>

	<?php if (Auth::instance()->logged_in()): ?>

		<h3>
			<a href="<?php echo URL::site('topic/new'); ?>">Start a new discussion.</a>
		</h3>

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

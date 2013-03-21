<!DOCTYPE html>
<html>
<head>
	<title><?php echo $site_name; ?></title>
	<meta charset="UTF-8" />
	<?php foreach ($stylesheets as $stylesheet) : ?>
		<link rel="stylesheet" href="<?php echo URL::site('assets/stylesheets/'.$stylesheet.'.css'); ?>" />
	<?php endforeach; ?>
</head>
<body>

	<header>

		<h1>
			<a href="<?php echo URL::site(''); ?>">
				<?php echo $site_name; ?>
			</a>
		</h1>
	</header>

	<?php if (Auth::instance()->logged_in()): ?>

		<h3>
			<a href="<?php echo URL::site('topic/new'); ?>">Start a new discussion.</a>
		</h3>

	<?php endif; ?>

    <div id="sidebar">
<?php echo $sidebar; ?>
</div>
<div id="content">
	<?php if (!isset($content)): ?>

		<h2>No View is set</h2>
		<p>Contact administrator.</p>

	<?php else: ?>

		<?php echo $content; ?>

	<?php endif; ?>

</div><div class="clear-both"></div>
	<footer>

		Powered by Phorumph Discussion Board.
		&copy; By reGative. 2012.

	</footer>

</body>

</html>

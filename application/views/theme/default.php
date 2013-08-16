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

		<div id="topbar">
			<?php echo $topbar; ?>
		</div>
<div id="container">
<header>
		<h1>
			<a href="<?php echo URL::site(''); ?>">
				<?php echo $site_name; ?>
			</a>
		</h1>
	</header>

<ul class="menu-bar">
<li class="menu-item">
<a href="<?php echo URL::site(); ?>">Home</a>
</li>
<li class="menu-item">
<a href="">FAQ</a>
</li>
<li class="menu-item">
<a href="">Search</a>
</li>
<li class="menu-item">

	<?php if (Auth::instance()->logged_in()): ?>
			<a href="<?php echo URL::site('topic/new'); ?>">Start a discussion</a>
	<?php endif; ?>
</li>
</ul>

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

</div>
</body>

</html>

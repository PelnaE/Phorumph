<!DOCTYPE html>
<html>
<head>
	<title><?php echo $site_name; ?></title>
	<meta charset="UTF-8" />
</head>
<body>
	<header>
		<h1><a href="<?php echo URL::site(''); ?>"><?php echo $site_name; ?></a></h1>
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

<?php foreach ($users as $user): ?>
	<h2><?php echo $user->username; ?>'s profile:</h2>
	<img src="<?php echo $user->picture; ?>" height="120px" align="left" />
	<h3>Signature:</h3>
	<?php echo $user->signature; ?>
<?php endforeach; ?>

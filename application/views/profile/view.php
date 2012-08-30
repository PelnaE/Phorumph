<?php foreach ($users as $user): ?>
	<h2><?php echo $user->username; ?>'s profile:</h2>
	<h3>Avatar (<a href="<?php echo URL::site('profile/upload_avatar'); ?>">edit</a>)</h3>
	<img src="<?php echo $user->picture; ?>" height="120px" align="left" />
	<h3>Signature (<a href="<?php echo URL::site('profile/change_signature'); ?>">edit</a>):</h3>
	<?php echo Darkmown::parse($user->signature); ?>
<?php endforeach; ?>

<h2>Change Signature:</h2>
<?php foreach($users as $user): ?>
	<form action="<?php echo URL::site('profile/change_signature/'.Security::token()); ?>" method="post">
		<textarea name="signature" rows="4" cols="50"><?php echo $user->signature; ?></textarea>
		<br /><input type="submit" value="Change Signature!" />
	</form>
<?php endforeach; ?>

<?php if (!empty($users->picture)) : ?>
	<img src="<?php echo $users->picture; ?>" height="25px" align="center" />
<?php endif; ?>

<a href="<?php echo URL::site('profile/view/'.$users->id) ?>">
		<?php echo HTML::chars($users->username); ?>
	</a>


<?php if ($users->picture): ?>
    <a href="<?php echo URL::site('profile/delete_avatar/'.Security::token()); ?>">
		Delete Avatar
	</a>
<?php endif; ?>

<a href="<?php echo URL::site('profile/upload_avatar'); ?>">
	Upload avatar
</a>

<a href="<?php echo URL::site('logout/index/'.Security::token()); ?>">
	Logout
</a>

<?php foreach($users_levels as $user_level): ?>
	<?php if ($user_level->role_id == 2): ?>
		<a href="<?php echo URL::site('dashboard'); ?>">
			Dashboard
		</a>
	<?php endif; ?>
<?php endforeach; ?>

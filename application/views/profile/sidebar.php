<p class="h3">
<a href="<?php echo URL::site('profile/view/'.$users->id) ?>">
		<?php echo HTML::chars($users->username); ?>
	</a>
</p>
<?php if (!empty($users->picture)) : ?>
	<p><img src="<?php echo $users->picture; ?>" height="50px" align="center" /></p>
<?php endif; ?>


<?php if ($users->picture): ?>
    <p><a href="<?php echo URL::site('profile/delete_avatar/'.Security::token()); ?>">
		Delete Avatar
	</a>
</p>
<?php endif; ?>

<p><a href="<?php echo URL::site('profile/upload_avatar'); ?>">
	Upload avatar
</a>
</p>

<p><a href="<?php echo URL::site('logout/index/'.Security::token()); ?>">
	Logout
</a>
</p>

<?php foreach($users_levels as $user_level): ?>
	<?php if ($user_level->role_id == 2): ?>
		<p><a href="<?php echo URL::site('dashboard'); ?>">
			Dashboard
		</a></p>
	<?php endif; ?>
<?php endforeach; ?>

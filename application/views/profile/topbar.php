<div class="topbar-user">
<?php if (!empty($users->picture)) : ?>
	<img src="<?php echo $users->picture; ?>" height="25px" align="center" />
<?php endif; ?>

<a href="<?php echo URL::site('profile/view/'.$users->id) ?>">
		<?php echo HTML::chars($users->username); ?>
	</a>
</div>

<?php if ($users->picture): ?>
    <div class="topbar-item"><a href="<?php echo URL::site('profile/delete_avatar/'.Security::token()); ?>">
		Delete Avatar
	</a></div>
<?php endif; ?>

<div class="topbar-item"><a href="<?php echo URL::site('profile/upload_avatar'); ?>">
	Upload avatar
</a></div>

<div class="topbar-item"><a href="<?php echo URL::site('logout/index/'.Security::token()); ?>">
	Logout
</a></div>

<?php foreach($users_levels as $user_level): ?>
	<?php if ($user_level->role_id == 2): ?>
		<div class="topbar-item"><a href="<?php echo URL::site('dashboard'); ?>">
			Dashboard
		</a></div>
	<?php endif; ?>
<?php endforeach; ?>

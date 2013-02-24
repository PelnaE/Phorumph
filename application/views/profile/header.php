<?php if (!empty($users->picture)) : ?>
	<img src="<?php echo $users->picture; ?>" height="50px" align="left" />
<?php endif; ?>
<h2>
	Hey, <a href="<?php echo URL::site('profile/view/'.$users->id) ?>">
		<?php echo HTML::chars($users->username); ?>
	</a>!
</h2>

Today is
<?php echo date('l', time()); ?>
, the
<?php echo date('W', time()); ?>
 week of the year
<?php echo date('Y', time()); ?>!

Or, simpler - <?php echo date('d.m.Y H:i:s T', time()); ?><br />

<a href="<?php echo URL::site('profile/upload_avatar'); ?>">
	Upload avatar
</a>

|

<a href="<?php echo URL::site('logout/index/'.Security::token()); ?>">
	Logout
</a>

|

<?php foreach($users_levels as $user_level): ?>
	<?php if ($user_level->role_id == 2): ?>
		<a href="<?php echo URL::site('dashboard'); ?>">
			Dashboard
		</a>
	<?php endif; ?>
<?php endforeach; ?>

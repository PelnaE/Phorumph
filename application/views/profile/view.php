	<?php $user_id = Session::instance()->get('user_id'); ?>

	<h2><?php echo HTML::chars($user->username); ?>'s profile:</h2>

	<?php if (!empty($user->picture)): ?>

		<h3>Avatar (<a href="<?php echo URL::site('profile/upload_avatar'); ?>">edit</a>)</h3>

		<img src="<?php echo $user->picture; ?>" height="120px" align="left" />

	<?php endif; ?>

	<h3>Signature (<a href="<?php echo URL::site('profile/change_signature'); ?>">edit</a>):</h3>

	<?php if(!empty($user_id) && $user->id === $user_id): ?>
	    <?php if (!empty($user->signature)): ?>
			<?php echo Darkmown::parse($user->signature); ?>
		<?php else: ?>
			You have not signature yet. <a href="<?php echo URL::site('profile/change_signature'); ?>">Create it!</a>
		<?php endif; ?>
	<?php endif; ?>
	<?php if(empty($user_id) && $user->id !== $user_id): ?>
	    <?php if (!empty($user->signature)): ?>
			<?php echo Darkmown::parse($user->signature); ?>
		<?php else: ?>
			<?php echo $user->username; ?> has not signature yet.
		<?php endif; ?>
	<?php endif; ?>

	<?php if(!empty($user_id) && $user->id === $user_id): ?>

		<h3>Options:</h3>

		<ul>
			<li><a href="<?php echo URL::site('profile/change_signature/'); ?>">Change Signature</a></li>
			<li><a href="<?php echo URL::site('profile/upload_avatar/'); ?>">Change Avatar</a></li>
			<?php if (!empty($user->picture)): ?>
				<li><a href="<?php echo URL::site('profile/delete_avatar/'.Security::token()); ?>">Delete Avatar</a></li>
			<?php endif; ?>
			<li><a href="<?php echo URL::site('profile/change_password/'); ?>">Change Password</a></li>
			<li><a href="<?php echo URL::site('logout/index/'.Security::token()); ?>">LogOut</a></li>
		</ul>

	<?php endif; ?>
<h3>My recent topics:</h3>
<?php if (count($topics) >= 1): ?>
    <?php foreach ($topics as $topic): ?>
        <h4><?php echo HTML::chars($topic->title); ?></h4>
        <?php echo Darkmown::parse($topic->content); ?>
    <?php endforeach; ?>
<?php else: ?>
    <p>You do not have any topics there.</p>
<?php endif; ?>
<h3>My recent posts:</h3>
<?php if (count($replies) >=1): ?>
    <?php foreach($replies as $reply): ?>
        <?php echo Darkmown::parse($reply->content); ?>
    <?php endforeach; ?>
<?php else: ?>
    <p>You do not have any replies there.</p>
<?php endif; ?>

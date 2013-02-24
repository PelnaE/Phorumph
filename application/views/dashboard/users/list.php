<h3>
	<a href="<?php echo URL::site('dashboard'); ?>">Dashboard</a> &mdash;
	List of Users
</h3>
<table>
	<tr>
		<th>ID</th>
		<th>Picture</th>
		<th>Username</th>
		<th>e-mail</th>
	</tr>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo $user->id; ?></td>
		<?php if ($user->picture): ?>
			<td><img src="<?php echo $user->picture; ?>" height="50px"/></td>
		<?php else: ?>
			<td>No User Picture</td>
		<?php endif; ?>
		<td><?php echo $user->username; ?></td>
		<td><?php echo $user->email; ?></td>
	</tr>
	<?php endforeach; ?>
</table>

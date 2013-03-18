<h3>
<a href="<?php echo URL::site('dashboard'); ?>">Dashboard</a>
&nbsp;
List of User's Roles
</h3>
<table>
<tr>
<th>Role ID</th>
<th>User ID</th>
<th></th>
</tr>
<?php foreach ($roles as $role): ?>
<tr>
<td>
<?php echo $role->role_id; ?>
</td>
<td>
<?php echo $role->user_id; ?>
</td>
<td>
<?php if ($role->user_id != $user_id): ?>
<a href="<?php echo URL::site('dashboard/users/delete_role/'.$role->role_id.'/'.$role->user_id.'/'.Security::token()); ?>">[x]</a>
<?php endif; ?>
</td>
</tr>
<?php endforeach; ?>
</table>

<h2>Options:</h2>
<ul>
<li><a href="<?php echo URL::site('dashboard/users/add_role'); ?>">Add Role</a></li>
</ul>


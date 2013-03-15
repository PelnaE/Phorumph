<h3>
<a href="<?php echo URL::site('dashboard'); ?>">Dashboard</a>
&mdash;
<a href="<?php echo URL::site('dashboard/users/roles_list'); ?>">List of User's Roles</a>
&mdash;
Add Role
</h3>
<form action="<?php echo URL::site('dashboard/users/add_role/'.Security::token()); ?>" method="post">
<table>
<tr>
<td>Select a User</td>
<td>
<select name="user_id">
<?php foreach ($users as $user): ?>
<option value="<?php echo $user->id; ?>"><?php echo $user->id; ?> - <?php echo $user->username; ?></option>
<?php endforeach; ?>
</select>
</td>
</tr>
<tr>
<td>Select a Role</td>
<td>
<select name="role_id">
<?php foreach ($roles as $role): ?>
<option value="<?php echo $role->id; ?>"><?php echo $role->id; ?> - <?php echo $role->name; ?></option>
<?php endforeach; ?>
</select>
</td>
</tr>
<tr>
<td></td>
<td>
<input type="submit" value="Proceed" />
</td>
</tr>
</table>

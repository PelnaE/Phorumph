<h3>
	<a href="<?php echo URL::site('dashboard'); ?>">Dashboard</a> &mdash;
	Create a category
</h3>
<form action="<?php echo URL::site('dashboard/categories/create/'.Security::token()); ?>" method="post">
	Category name <input type="text" name="name" /><br />
	Category description <input type="text" name="description" /><br />
Role <select name="role_id">
<?php foreach ($roles as $role): ?>
<option value="<?php echo $role->id; ?>"><?php echo $role->name; ?></option>
<?php endforeach; ?>
</select>
	<input type="submit" value="Create It!" />
</form>

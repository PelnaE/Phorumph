<h3>
	<a href="<?php echo URL::site('dashboard'); ?>">Dashboard</a> &mdash;
	Create a category
</h3>
<form action="<?php echo URL::site('dashboard/categories/create/'.Security::token()); ?>" method="post">
	Category name <input type="text" name="name" /><br />
	Category description <input type="text" name="description" /><br />
	User role <input type="checkbox" name="user_role" /><br />
	Administrator role <input type="checkbox" name="admin_role" /><br />
	<input type="submit" value="Create It!" />
</form>

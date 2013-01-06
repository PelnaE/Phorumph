<h3>Create a category</h3>
<form action="<?php echo URL::site('dashboard/categories/create/'.Security::token()); ?>" method="post">
	Category name <input type="text" name="name" /><br />
	Category description <input type="text" name="description" /><br />
	User role <input type="number" name="user_role" min="0" max="5" /><br />
	Moderator role <input type="number" name="moderator_role" min="0" max="5" /><br />
	Administrator role <input type="number" name="admin_role" min="0" max="5" /><br />
	<input type="submit" value="Create It!" />
</form>

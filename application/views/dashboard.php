<h2>Dashboard</h2>
	<ul>
		<li><a href="<?php echo URL::site('dashboard/categories/create'); ?>">Create a category</a></li>
            <ul>
                <li><a href="<?php echo URL::site('dashboard/categories/list'); ?>">List of categories</a></li>
            </ul>
		<li><a href="<?php echo URL::site('dashboard/users/list'); ?>">Manage members</a></li>
            <ul>
                <li><a href="<?php echo URL::site('dashboard/users/roles_list'); ?>">Manage Roles of Users</a></li>
            </ul>
        <li><a href="<?php echo URL::site('dashboard/topics/list'); ?>">List of Topics</a></li>
	</ul>

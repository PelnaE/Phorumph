<h3>
	<a href="<?php echo URL::site('dashboard'); ?>">Dashboard</a> &mdash;
	Create a category
</h3>
<form action="<?php echo URL::site('dashboard/categories/create/'.Security::token()); ?>" method="post">
	<table>
		<tr>
			<td class="title">
				Category name
			</td>
			<td>
				<input type="text" name="name" />
			</td>
		</tr>
		<tr>
			<td>
				Category description
			</td>
			<td>
				<input type="text" name="description" />
			</td>
		</tr>
		<tr>
			<td class="title">
				Role
			</td>
			<td>
				<select name="role_id">
					<?php foreach ($roles as $role): ?>
					<option value="<?php echo $role->id; ?>">
						<?php echo $role->name; ?>
					</option>
					<?php endforeach; ?>
				</select>
			</td>
		</tr>
		<tr>
			<td class="title"></td>
			<td>
				<input type="submit" value="Create It!" />
			</td>
		</tr>
	</table>
</form>

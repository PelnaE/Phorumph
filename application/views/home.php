<h2>Categories:</h2>
<table cellspacing="1" border="1" cellpadding="5" width="50%">
	<tr>
		<th>ID</th>
		<th>Category name and description</th>
		<th>Topics Count</th>
	</tr>
	<?php foreach($categories as $category): ?>
<?php foreach ($roles as $role): ?>
<?php if (Auth::instance()->logged_in($role->name)): ?>
<tr>
<td>
<?php echo $category->id; ?>
</td>
<td>
<?php echo $category->name; ?>
</td>
<td>
</td>
</tr>
<?php endif; ?>
<?php endforeach; ?>
	<?php endforeach; ?>
</table>

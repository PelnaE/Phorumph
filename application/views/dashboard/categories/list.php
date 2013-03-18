<h3>
	<a href="<?php echo URL::site('dashboard'); ?>">Dashboard</a> &mdash;
	List of Categories
</h3>
<table>
	<tr>
		<th>#</th>
		<th>Name</th>
		<th>Description</th>
        <th>Options</th>
	</tr>
	<?php foreach ($categories as $category): ?>
	<tr>
		<td><?php echo $category->id ?></td>
		<td><?php echo $category->name ?></td>
		<td><?php echo $category->description ?></td>
        <td><a href="<?php echo URL::site('dashboard/categories/edit/'.$category->id); ?>">[Edit]</a></td>
        <td><a href="<?php echo URL::site('dashboard/categories/delete_category/'.$category->id.'/'.Security::token()); ?>">[x]</a></td>
	</tr>
	<?php endforeach; ?>
</table>

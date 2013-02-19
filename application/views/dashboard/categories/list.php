<h3>List of Categories</h3>
<table>
	<tr>
		<th>#</th>
		<th>Name</th>
		<th>Description</th>
	</tr>
	<?php foreach ($categories as $category): ?>
	<tr>
		<td><?php echo $category->id ?></td>
		<td><?php echo $category->name ?></td>
		<td><?php echo $category->description ?></td>
	</tr>
	<?php endforeach; ?>
</table>

<h2>Categories:</h2>
<table cellspacing="1" border="1" cellpadding="5" width="50%">
	<tr>
		<th>ID</th>
		<th>Category name and description</th>
		<th>Topics Count</th>
	</tr>
	<?php foreach($categories as $category): ?>
		<tr>
			<td>#<?php echo $category->id; ?></td>
			<td>
				<h3 style="margin:0"><?php echo $category->name; ?></h3>
				<?php echo $category->description; ?>
			</td>
			<td><?php echo $category->topics_count; ?></td>
		</tr>
	<?php endforeach; ?>
</table>

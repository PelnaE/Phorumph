<h2>Categories:</h2>
<table cellspacing="1" border="1" cellpadding="5" width="50%">
	<tr>
		<th>ID</th>
		<th>Category name and description</th>
		<th>Topics Count</th>
	</tr>
	<?php foreach($categories as $category): ?>
<?php if (Auth::instance()->logged_in('login')): ?>
<tr>
<?php echo $category->name; ?>
</tr>
<?php endif; ?>
	<?php endforeach; ?>
</table>

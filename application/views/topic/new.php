
<form action="<?php echo URL::site('topic/new/'.Security::token()); ?>" method="post">
	Topic title: <input type="text" name="title" /><br />
	<?php if (isset($categories)): ?>
	Category:  <select name="category_id">
	<?php foreach($categories as $category): ?>
	<?php if (!Auth::instance()->logged_in()): ?>
		<?php if ($category->role_id == 1): ?>
			<option value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
		<?php endif; ?>
	<?php else: ?>
		<?php if($role_id == $category->role_id): ?>
			<option value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
		<?php endif; ?>
	<?php endif; ?>
	<?php endforeach; ?>
</select><br />
	<?php endif; ?>
	<textarea name="content" rows="10" cols="60"></textarea><br />
	<input type="submit" value="OK!" />
</form>

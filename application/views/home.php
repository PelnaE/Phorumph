<p class="h3">Categories:</p>
	<?php foreach($categories as $category): ?>
        <?php if (Auth::instance()->logged_in()): ?>
<?php foreach ($role_id as $role ) ?>
            <?php if ($role->role_id >= $category->role_id): ?>
            <div class="category"><a href="<?php echo URL::site('category/index/'.$category->id); ?>">
                <?php echo $category->name; ?>
    </a>
<?php echo $category->description; ?>
</div>
<?php endif; ?>
        <?php endif; ?>
        <?php if (!Auth::instance()->logged_in()): ?>
        <?php if ($category->role_id == 1): ?>
            <div class="category"><a href="<?php echo URL::site('category/index/'.$category->id); ?>">
                <?php echo $category->name; ?>
</a>
<?php echo $category->description; ?>
</div>
<?php endif; ?>
        <?php endif; ?>
	<?php endforeach; ?>

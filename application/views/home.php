<p class="h3">Categories:</p>
<table>
    <tr>
        <th>Category Title</th>
        <th>Topics Count</th>
        <th>Last Topic</th>
	<?php foreach($categories as $category): ?>
    <?php if (Auth::instance()->logged_in()): ?>
        <?php foreach ($role_id as $role ) ?>
        <?php if ($role->role_id >= $category->role_id): ?>
        <tr>
            <td><a href="<?php echo URL::site('category/index/'.$category->id); ?>">
                    <?php echo $category->name; ?>
                </a><br />
                <?php echo $category->description; ?>
            </td>
        </tr>
<?php endif; ?>
        <?php endif; ?>
        <?php if (!Auth::instance()->logged_in()): ?>
        <?php if ($category->role_id == 1): ?>
        <tr>
            <td><a href="<?php echo URL::site('category/index/'.$category->id); ?>">
                    <?php echo $category->name; ?>
                </a><br />
                <?php echo $category->description; ?>
            </td>
        </tr>

<?php endif; ?>
        <?php endif; ?>
	<?php endforeach; ?>
</table>

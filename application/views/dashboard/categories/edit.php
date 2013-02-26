<h3>
    <a href="<?php echo URL::site('dashboard'); ?>">
        Dashboard
    </a>
    &mdash;
    <a href="<?php echo URL::site('dashboard/categories/list'); ?>">
        List of Categories
    </a>
    &mdash;
    Edit a Category
</h3>
<?php foreach ($categories as $category): ?>
<table>
    <tr>
        <td>Name of category</td>
        <td><input type="text" name="title" value="<?php echo $category->name; ?>" /></td>
    </tr>
    <tr>
        <td>Description</td>
        <td><input type="text" name="description" value="<?php echo $category->description; ?>" /></td>
    </tr>
    <tr>
        <td>Login role</td>
        <td>
            <?php if ($category->role_id === 1): ?>
                <input type="checkbox" name="login_role" checked="checked" />
            <?php else: ?>
                <input type="checkbox" name="login_role" />
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <td>Admin role</td>
        <td>
            <?php if ($category->role_id === 2): ?>
                <input type="checkbox" name="admin_role" checked="checked" />
            <?php else: ?>
                <input type="checkbox" name="admin_role" />
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <input type="submit" value="Proceed" />
        </td>
    </tr>
</table>
<?php endforeach; ?>
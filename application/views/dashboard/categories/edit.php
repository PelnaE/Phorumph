<h3><a href="<?php echo URL::site('dashboard'); ?>"> Dashboard </a> &mdash; <a href="<?php echo URL::site('dashboard/categories/list'); ?>"> List of Categories </a> &mdash;
Edit a Category </h3>
<?php foreach ($categories as $category): ?>
<table>
    <tr>
        <td>Name of category</td>
        <td>
        <input type="text" name="title" value="<?php echo $category -> name; ?>" />
        </td>
    </tr>
    <tr>
        <td>Description</td>
        <td>
        <input type="text" name="description" value="<?php echo $category -> description; ?>" />
        </td>
    </tr>
    <?php endforeach; ?>
    <?php foreach ($categories_roles as $category_role): ?>
        <?php if ($category_role->role_id == 1 && $category_role->role_id != 2): ?>
            <tr>
                <td>Login role</td>
                <td><input type="checkbox" name="login_role" checked="checked" /></td>
            </tr>
            <tr>
                <td>Admin role</td>
                <td><input type="checkbox" name="admin_role" /></td>
            </tr>
        <?php elseif ($category_role->role_id != 1 && $category_role->role_id == 2): ?>
            <tr>
                <td>Login role</td>
                <td><input type="checkbox" name="login_role" /></td>
            </tr>
            <tr>
                <td>Admin role</td>
                <td><input type="checkbox" name="admin_role" checked="checked" /></td>
            </tr>
        <?php elseif ($category_role->role_id == 1 && $category_role->role_id == 2): ?>
            <tr>
                <td>Login role</td>
                <td><input type="checkbox" name="admin_role" checked="checked"/></td>
            </tr>
            <tr>
                <td>Admin role</td>
                <td><input type="checkbox" name="admin_role" checked="checked"/></td>
            </tr>
        <?php endif; ?>
        <?php endforeach; ?>
        <tr>
        <td></td>
        <td>
        <input type="submit" value="Proceed" />
        </td>
    </tr>
</table>
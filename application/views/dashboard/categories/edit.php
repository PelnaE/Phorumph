<h3><a href="<?php echo URL::site('dashboard'); ?>"> Dashboard </a> &mdash; <a href="<?php echo URL::site('dashboard/categories/list'); ?>"> List of Categories </a> &mdash;
Edit a Category </h3>
<form action="<?php echo URL::site('dashboard/categories/edit/'.$category_id.'/'.Security::token()); ?>"
    method="post">
<table>
    <tr>
        <td>Name of category</td>
        <td>
        <input type="text" name="name" value="<?php echo $category -> name; ?>" />
        </td>
    </tr>
    <tr>
        <td>Description</td>
        <td>
        <input type="text" name="description" value="<?php echo $category -> description; ?>" />
        </td>
    </tr>
    <tr>
        <td>Roles:</td>
        <td>
            <select name="role_id">
            <?php foreach ($roles as $role): ?>
            <?php if ($category->role_id == $role->id): ?>
                <option value="<?php echo $role->id; ?>" selected><?php echo $role->name; ?></option>
            <?php else: ?>
                <option value="<?php echo $role->id; ?>"><?php echo $role->name; ?></option>
            <?php endif; ?>
            <?php endforeach; ?>
            </select>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <input type="submit" value="Proceed" />
        </td>
    </tr>
</table>
</form>

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
    <?php foreach ($roles as $role): ?>
        <tr>
            <td><?php echo $role->name; ?></td>
            <td>
                <input type="checkbox" name="<?php echo $role->name; ?>" value="<?php echo $role->id; ?>"
                <?php if (in_array($role->id, array_values($categories_roles))): ?>
                    checked="checked"
                <?php endif; ?>
                />
            </td>
        </tr>
   <?php endforeach; ?>
        <tr>
        <td></td>
        <td>
        <input type="submit" value="Proceed" />
        </td>
    </tr>
</table>
</form>
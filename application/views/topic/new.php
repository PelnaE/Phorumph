
<form action="<?php echo URL::site('topic/new/'.Security::token()); ?>" method="post">
    Topic title: <input type="text" name="title" /><br />
    <?php if (isset($categories)): ?>
        <select name="category_id">
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
            <?php endforeach; ?>
        </select><br />
    <?php endif; ?>
    <textarea name="content" rows="10" cols="60"></textarea><br />
    <input type="submit" value="OK!" />
</form>

<?php if (count($category) >= 1): ?>
    <h3><?php echo $category; ?></h3>
    There are not any topics. :(
<?php else: ?>
    <h3>Category with that ID does not exists!</h3>
<?php endif; ?>

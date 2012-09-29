<h3>Edit a topic</h3>
<?php foreach ($topics as $topic): ?>
<form action="<?php echo URL::site("topic/edit/".Request::current()->param('id')."/".Security::token()); ?>" method="post">
    Title: <input name="title" type="text" value="<?php echo $topic->title; ?>" /><br />
    <textarea name="content" rows="10" cols="50"><?php echo $topic->content; ?></textarea>
    <br /><input type="submit" value="Update" />
</form>
<?php endforeach; ?>
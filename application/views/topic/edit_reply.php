<h3>Edit a Reply #<?php echo Request::current()->param('id'); ?></h3>
<form action="<?php echo URL::site('topic/edit_reply/'.Request::current()->param('id').'/'.Security::token()); ?>" method="post">
<?php foreach($replies as $reply): ?>
<textarea name="content" rows="10" cols="50"><?php echo $reply->content; ?></textarea><br />
<input type="hidden" name="topic_id" value="<?php echo $reply->topic_id; ?>" />
<input type="submit" value="OK!" />
<?php endforeach; ?>
</form>

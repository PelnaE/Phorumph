<?php if (count($topics) >= 1): ?>
<?php foreach ($topics as $topic): ?>
<h2>
    <a href="<?php echo URL::site('category/index/'.$topic->category_id); ?>">
        Back
    </a>
    >
    <?php echo HTML::chars($topic->title); ?>
</h2>
<div class="post">
<?php if ($topic->picture): ?>
<img src="<?php echo $topic->picture; ?>" width="50px" height="50px" border="0px" align="left" />
<?php else: ?>
<img src="" border="0px" width="50px" height="50px"align="left" />
<?php endif; ?>
<div class="username"><?php echo $topic->username; ?></div>
    <div class="published">Was published - <?php echo date('d.m.Y H:i:s', $topic->published); ?></div>
    <div class="post-content"><?php echo Darkmown::parse($topic->content); ?></div>
<?php if ($topic->signature): ?>
<div class="post-signature"><?php echo Darkmown::parse($topic->signature); ?></div>
<?php endif; ?>
<?php endforeach; ?>
</div>
<h2>Replies</h2>
<?php foreach ($replies as $reply): ?>
<div class="post">
<?php if ($reply->picture): ?>
<img src="<?php echo $reply->picture; ?>" width="50px" height="50px" border="0px" align="left" />
<?php else: ?>
<img src="" width="50px" height="50px" border="0px" align="left" />
<?php endif; ?>
<div class="username"><?php echo $reply->username; ?></div>
    <div class="published">Was published - <?php echo date('d.m.Y H:i:s', $reply->date); ?></div>
    <div class="post-content"><?php echo Darkmown::parse($reply->content); ?></div>
<?php if ($reply->signature): ?>
<div class="post-signature"><?php echo Darkmown::parse($reply->signature); ?></div>
<?php endif; ?>
</div>
<?php endforeach; ?>
<h2>Reply to a topic:</h2>
<?php if (Auth::instance()->logged_in()): ?>
<form action="<?php echo URL::site('topic/reply/'.Security::token()); ?>" method="post">
    <input type="hidden" value="<?php echo $topic->topic_id; ?>" name="topic_id" />
    <textarea rows="10" cols="75" name="content"></textarea><br />
    <input type="submit" value="Reply" />
</form>
<?php else: ?>
    You can't reply to this topic, because you are a guest.
<?php endif; ?>
<?php endif; ?>


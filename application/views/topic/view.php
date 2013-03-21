<?php if (count($topics) >= 1): ?>
<?php foreach ($topics as $topic): ?>
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
</div>
<?php endforeach; ?>
<?php endif; ?>

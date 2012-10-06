<?php if (count($topics) >= 1): ?>
<?php foreach ($topics as $topic): ?>
<h3>
    <a href="<?php echo URL::site('category/index/'.$topic->category_id); ?>">
        Back
    </a>
    &mdash;
    <?php echo HTML::chars($topic->title); ?>
<?php if (Auth::is_user_signed_in()): ?>
     | <a href="<?php echo URL::site("topic/edit/".$topic->topic_id); ?>">Edit a Topic</a>
<?php endif; ?>
</h3>
<table width="40%" border="1px" cellspacing="1" cellpadding="5">
    <tr>
        <td width="10%">
            <?php echo $topic->username; ?>
            <img src="<?php echo $topic->picture; ?>" height="80px" />
        </td>
        <td valign="top">
            <?php echo date("d.m.Y H:i:s", $topic->published); ?><br />
            <?php echo Darkmown::parse($topic->content); ?>
            <hr />
            <?php echo Darkmown::parse($topic->signature); ?>
        </td>
    </tr>
</table>
<?php endforeach; ?>
<?php else: ?>
    <h3>Topic with that ID do not exists!</h3>
<?php endif; ?>

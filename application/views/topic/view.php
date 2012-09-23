
<?php foreach ($topics as $topic): ?>
<h3><?php echo HTML::chars($topic->title); ?></h3>
<table width="40%" border="1px" cellspacing="1" cellpadding="5">
    <tr>
        <td width="10%">
            <?php echo $topic->username; ?>
            <img src="<?php echo $topic->picture; ?>" height="80px" />
        </td>
        <td valign="top">
            <?php echo date('d.m.Y H:i:s', $topic->published); ?><br />
            <?php echo $topic->content; ?>
        </td>
    </tr>
</table>
<?php endforeach; ?>

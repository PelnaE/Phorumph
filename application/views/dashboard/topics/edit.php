<h3>
<a href="<?php echo URL::site('dashboard'); ?>">Dashboard</a>
&mdash;
<a href="<?php echo URL::site('dashboard/topics/list'); ?>">List of Topics</a>
&mdash;
Edit</h3>

<form action="<?php echo URL::site('dashboard/topics/edit/'.Request::current()->param('id').'/'.Security::token()); ?>" method="post">
<table>
<tr>
<td>Topic Title</td>
<td><input type="text" name="title" value="<?php echo $topic->title; ?>" /></td>
</tr>
<tr>
<td>Topic Content</td>
<td><textarea name="content" rows="7" cols="80"><?php echo $topic->content; ?></textarea></td>
</tr>
<tr>
<td></td>
<td><input type="submit" value="Proceed" />
</td>
</table>
</form>

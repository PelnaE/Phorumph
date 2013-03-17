<h3>
<a href="<?php echo URL::site('dashboard'); ?>">Dashboard</a>
&mdash;
Topics
</h3>
<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Author</th>
<th>Date</th>
<th>Options</th>
</tr>
<?php foreach ($topics as $topic): ?>
<tr>
<td><?php echo $topic->topic_id; ?></td>
<td><?php echo $topic->title; ?></td>
<td><?php echo $topic->author_id; ?></td>
<td><?php echo date('d.m.Y H:i:s', $topic->published); ?></td>
<td>
<a href="<?php echo URL::site('dashboard/topics/edit/'.$topic->topic_id); ?>">[Edit]</a>
</td>
<td>
<a href="<?php echo URL::site('dashboard/topics/delete_topic/'.$topic->topic_id.'/'.Security::token()); ?>">[x]</a>
</td>
</tr>
<?php endforeach; ?>
</table>

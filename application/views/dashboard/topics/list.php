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
</tr>
<?php foreach ($topics as $topic): ?>
<tr>
<td><?php echo $topic->topic_id; ?></td>
<td><?php echo $topic->title; ?></td>
<td><?php echo $topic->author_id; ?></td>
<td><?php echo $topic->published; ?></td>
</tr>
<?php endforeach; ?>
</table>

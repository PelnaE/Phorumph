<?php if (count($category) >= 1): ?>
    <p class="h3">
        <a href="<?php echo URL::site("/"); ?>">Categories</a>
           >
        <?php echo $category; ?>
    </p>
    <?php if (count($topics) >= 1): ?>
        <table border="1" cellspacing="1" cellpadding="5">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Published</th>
                <th>Author</th>
            </tr>
        <?php foreach($topics as $topic): ?>
        <tr>
                <td><?php echo $topic->topic_id; ?></td>
                <td><a href="<?php echo URL::site('topic/view/'.$topic->topic_id); ?>"><?php echo HTML::chars($topic->title); ?></a></td>
                <td><?php echo date('d.m.Y H:i:s', $topic->published); ?></td>
                <td><?php echo $topic->username; ?></td>
            </tr>
        <?php endforeach; ?>
        </table>
    <?php else: ?>
        There are not any topics!
    <?php endif; ?>
<?php else: ?>
    <h3>Category with that ID does not exists!</h3>
<?php endif; ?>

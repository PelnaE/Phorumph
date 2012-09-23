<?php if (count($category) >= 1): ?>
    <h3><?php echo $category; ?></h3>
    <?php if (count($topics) >= 1): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Published</th>
                <th>Author</th>
            </tr>
        <?php foreach($topics as $topic): ?>
            <tr>
                <td><?php echo $topic->topic_id; ?></td>
                <td><?php echo HTML::chars($topic->title); ?></td>
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

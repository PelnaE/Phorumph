<?php if (count($category) >= 1): ?>
    <h2>
        <a href="<?php echo URL::site("/"); ?>">Categories</a>
           >
        <?php echo $category; ?>
    </h2>
    <?php if (count($topics) >= 1): ?>
        <table>
            <tr>
                <th>Title</th>
                <th>Published</th>
                <th>Author</th>
            </tr>
        <?php foreach($topics as $topic): ?>
        <tr>
                <td class="title"><a href="<?php echo URL::site('topic/view/'.$topic->topic_id); ?>"><?php echo HTML::chars($topic->title); ?></a></td>
                <td><?php echo date('d.m.Y H:i:s', $topic->published); ?></td>
                <td><a href="<?php echo URL::site('profile/view/'.$topic->id); ?>"><?php echo $topic->username; ?></a></td>
            </tr>
        <?php endforeach; ?>
        </table>
    <?php else: ?>
        There are not any topics!
    <?php endif; ?>
<?php else: ?>
    <h3>Category with that ID does not exists!</h3>
<?php endif; ?>

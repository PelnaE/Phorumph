
<form action="<?php echo URL::site('topic/new/'.Security::token()); ?>" method="post">
    Topic title: <input type="text" name="title" /><br />
    <?php if (isset($categories)): ?>
       Category:  <select name="category_id">
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
            <?php endforeach; ?>
        </select><br />
    <?php endif; ?>
<h3>Markdown's syntax support:</h3>
<p>We support Markdown syntax</p>
<ul>
    <li>**bold** - For bold text.</li>
    <li>*italic* - For italic text.</li>
    <li>[Link](http://example.com 'Title') - For <a href="http://example.com" title"Title">Link</a></li>
    <li>Alternative syntax</li>
    <ul>
        <li>__bold__ - For bold text.</li>
        <li>_italic_ - For italic text.</li>
    </ul>
</ul>
    <textarea name="content" rows="10" cols="60"></textarea><br />
    <input type="submit" value="OK!" />
</form>

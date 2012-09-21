<h2>Change Avatar:</h2>
<form action="<?php echo URL::site('profile/upload_avatar/'.Security::token()); ?>" method="post" enctype="multipart/form-data">
	<input type="file" name="image" />
	<input type="submit" value="Upload!" />
</form>

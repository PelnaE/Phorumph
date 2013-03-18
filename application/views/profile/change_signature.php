<h2>Change Signature:</h2>
<p>Warning: For signature's formatting you can use Markdown syntax.</p>
<p>**bold** - <b>bold</b></p>
<p>*italic* - <i>italic</i></p>
<p>_italic_ - <i>italic</i></p>
<p>__bold__ - <b>bold</b></p>
	<form action="<?php echo URL::site('profile/change_signature/'.Security::token()); ?>" method="post">
		<textarea name="signature" rows="4" cols="50"><?php echo $users->signature; ?></textarea>
		<br /><input type="submit" value="Change Signature!" />
	</form>

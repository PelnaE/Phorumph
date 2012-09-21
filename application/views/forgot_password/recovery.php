<h2>Recovery password:</h2>
<form
action="<?php
echo URL::site('forgot_password/do/'.
Request::current()->param('id').'/'.
Request::current()->param('id2')); ?>"
 method="post">
 	<input type="hidden" name="csrf_secure" value="<?php echo Security::token(); ?>" />
	New password : <input type='password' name='password' /><br />
	New password's confirmation : <input type="password" name="confirm" /><br />
	<input type="submit" value="Change!" />
</form>

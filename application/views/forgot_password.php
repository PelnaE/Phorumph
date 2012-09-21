<h2>Recovery your password!</h2>
<h3>Please, put there your email!</h3>
<form action="<?php echo URL::site('forgot_password/index/'.Security::token()); ?>" method='post'>
	<input type="email" name="email" /><br />
	 <input type="submit" value="Process!" />
</form>

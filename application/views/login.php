<h2>Login:</h2>
<form action="<?php echo URL::site('login/index/'.Security::token()); ?>" method="post">
	Username <input type="text" name="username" /><br />
	Password <input type="password" name="password" /><br />
	<label><input type="checkbox" name="cookie" /> Remember me!</label><br />
	<input type="submit" value="Login" />
</form>
<a href="<?php echo URL::site("register"); ?>">Register</a> |
<a href="<?php echo URL::site('forgot_password/'); ?>">Forgot Password?</a>

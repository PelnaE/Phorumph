<form action="<?php echo URL::site('login/index/'.Security::token()); ?>" method="post">
            Username
            <input type="text" class="login" name="username" />
            Password
            <input type="password" class="login" name="password" />
	    <label><input type="checkbox" name="cookie" /> Remember me!</label>
	<input type="submit" value="Login" /> | 
<a href="<?php echo URL::site("register"); ?>">Register</a> | 
<a href="<?php echo URL::site('forgot_password/'); ?>">Forgot Password?</a>
</form>


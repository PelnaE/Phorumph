<h2>Welcome to the Phorumph installation</h2>
<form action="<?php echo URL::site('install/index/'.Security::token()); ?>" method="post">
	Your username - <input type="text" name="username" /><br />
	Your password - <input type="password" name="password" /><br />
	Your password again - <input type="password" name="password2x" /><br />
	Your email - <input type="email" name="email" /><br />
	<input type="submit" value="OK!" />
</form>
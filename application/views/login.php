<h2>Login:</h2>
<a href="<?php echo URL::site("register"); ?>">Register</a> |
<a href="<?php echo URL::site('forgot_password/'); ?>">Forgot Password?</a>

<form action="<?php echo URL::site('login/index/'.Security::token()); ?>" method="post">
    <table>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username" /></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" /></td>
        </tr>
    </table>
	<label><input type="checkbox" name="cookie" /> Remember me!</label>
	<input type="submit" value="Login" />
</form>

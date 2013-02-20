		<?php if (Auth::instance()->logged_in()) : ?>
				<?php if (!empty($users->picture)) : ?>
					<img src="<?php echo $users->picture; ?>" height="50px" align="left" />
				<?php endif; ?>
				<h2>
					Hey, <a href="<?php echo URL::site('profile/view/'.$users->id); ?>"><?php echo HTML::chars($users->username); ?></a>!
					(<a href="<?php echo URL::site('logout/index/'.Security::token()); ?>">Logout</a>)
				</h2>
				Today is <?php echo date('l', time()); ?>, the
				<?php echo date('W', time()); ?> week of the year
				<?php echo date('Y', time()); ?>!
				Or, simpler - <?php echo date('d.m.Y H:i:s T', time()); ?>
		<?php else: ?>
			<h2>Login:</h2>
			<form action="<?php echo URL::site('login/index/'.Security::token()); ?>" method="post">
				Username <input type="text" name="username" />
				<a href="<?php echo URL::site('forgot_password/'); ?>">Forgot Password?</a>
				<br />
				Password <input type="password" name="password" /><br />
				<label><input type="checkbox" name="cookie" /> Remember me!</label><br />
				<input type="submit" value="Login" />
			</form>
			If you do not have an account, <a href="<?php echo URL::site("register"); ?>">register it there</a>!
		<?php endif; ?>

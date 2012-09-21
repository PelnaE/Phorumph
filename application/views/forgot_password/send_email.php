<?php
echo Darkmown::parse
('Hello!

We have request of password recovery!

[Recover it there!](http://localhost/Phorumph/forgot_password/do/'.$user_id.'/'.$hash.' "Recover it there!")');
?>

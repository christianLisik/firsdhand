<?php

/*
This module catches the logout-request from ajax
It handles:

-Destroing user session
-Destroing cookie lifetime
*/

require_once '../core/init.php';

session_start();
session_destroy();
setcookie('userid','',time() - Login::SET_TIMER_COOKIE,'/');
unset($_COOKIE['userid']);

header(Action::redirect());
exit;
?>



<?php

require __DIR__ . '/vendor/autoload.php';
use \App\Session\Login;

Login::requireLogin();
include __DIR__ . '/includes/header.php';

include __DIR__ . '/includes/menu.php';

/*  *//*
include User::isLogged() ?
(__DIR__.'/includes/menu.php'):
(__DIR__.'/includes/loginAD.php');
 */
//include (__DIR__.'/includes/menu.php');

include __DIR__ . '/includes/footer.php';
/*
echo "<pre>";
print_r($payload);
echo "<\pre>";
exit;
 */

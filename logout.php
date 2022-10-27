<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Session\User;

User::logout();
header('location: index.php');
exit;

<?php

use App\Session\User;

require (__DIR__.'/vendor/autoload.php');
  
include (__DIR__.'/includes/header.php');

$mensagem = $_GET['mensagem'];

echo $mensagem;
if(User::isLogged()){
    include (__DIR__.'/includes/menu.php');
    include (__DIR__.'/notificacao/minha-notificacao.php');
}else{
    include (__DIR__.'/includes/loginAD.php');
}
/*
include User::isLogged() ? 
    (__DIR__.'/includes/menu.php'):
    (__DIR__.'/includes/loginAD.php');
*/
//include (__DIR__.'/includes/menu.php');

include (__DIR__.'/includes/footer.php');
/*
echo "<pre>";
print_r($payload);
echo "<\pre>";
exit;
*/
?>
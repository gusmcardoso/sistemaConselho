<?php

require __DIR__ . '/vendor/autoload.php';

use Google\Client as Google_Client;
use \App\Session\User;
$mensagem = '';

if (!isset($_POST['credential']) || !isset($_POST['g_csrf_token'])) {
   header('location: index.php');
}
$cookie = $_COOKIE['g_csrf_token'] ?? '';
if ($cookie != $_POST['g_csrf_token']) {
   header('location: index.php');
}
// Get $id_token via HTTPS POST.

$client = new Google_Client(['client_id' => '530889397644-6tof0lg4qnnkbpbkujhpdv8dghre1pfc.apps.googleusercontent.com']);  // Specify the CLIENT_ID of the app that accesses the backend
$payload = $client->verifyIdToken($_POST['credential']);
/*
echo "<pre>";
print_r($payload);
echo "<\pre>";
exit;
*/
if(isset($payload['email'])){
   $valida = User::login($payload['name'],$payload['given_name'],$payload['family_name'],$payload['email'],$payload['picture']);
   if ($valida == false) {
      $mensagem = '<div class="alert alert-danger">Erro ao fazer o login! Use seu email institucional!</div>';      
  }
   
   header('location: index.php?mensagem='.$mensagem);
   
}

die("Problemas ao consultar a Api");

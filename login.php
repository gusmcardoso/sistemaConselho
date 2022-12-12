<?php
require __DIR__ . './vendor/autoload.php';
use \App\Entity\Usuario;
use \App\Session\Login;

Login::requireLogout();

$alertaLogin = '';
$alertaCadastro = '';

if (isset($_POST['acao'])) {
    switch ($_POST['acao']) {
        case 'logar':
            //Busca usuario pelo 'usuario'
            $obUsuario = Usuario::getUsuario($_POST['usuario']);
            //Valida a instancia e a senha
            if (!$obUsuario instanceof Usuario || !password_verify($_POST['senha'], $obUsuario->senha)) {
                $alertaLogin = 'Usuario ou senha inválidos!';
                break;
            }
            //loga o usuário
            Login::Login($obUsuario);
            exit;
            break;
        case 'cadastrar':

            if (isset($_POST['nome'], $_POST['usuario'], $_POST['senha'])) {
                //Busca usuario pelo 'usuario'
                $obUsuario = Usuario::getUsuario($_POST['usuario']);
                if ($obUsuario instanceof Usuario) {
                    $alertaCadastro = 'O usuário digitado já está em uso!';
                    break;
                }
                $obUsuario = new Usuario;
                $obUsuario->nome = $_POST['nome'];
                $obUsuario->usuario = $_POST['usuario'];
                $obUsuario->senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
                $obUsuario->cadastrar();
            }

            break;
    }
}

include __DIR__ . './includes/header.php';

include __DIR__ . './includes/formulario-login.php';

include __DIR__ . './includes/footer.php';

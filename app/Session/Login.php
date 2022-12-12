<?php
namespace App\Session;

class Login
{
    /**
     * Método responsável por iniciar a sessão
     */
    private static function init()
    {
        //Verifica status da sessão
        if (session_status() !== PHP_SESSION_ACTIVE) {
            //Inicia a sessão
            session_start();
        }
    }
    public static function getUsuarioLogado()
    {
        self::init();
        return self::isLogged() ? $_SESSION['usuario'] : null;
    }
    /**
     * Método responsável por logar o usuário
     * @param Usuario $obusuario
     */
    public static function Login($obUsuario)
    {
        //Inicia a sessão
        self::init();
        $_SESSION['usuario'] = [
            'id' => $obUsuario->id,
            'nome' => $obUsuario->nome,
            'usuario' => $obUsuario->usuario,
        ];

        //Redireciona o usuário para o index.php
        header('Location: index.php');
        exit;
    }
    /**
     * Método responsável por deslogar o usuário
     */
    public static function logout()
    {
        //inicia a sessão
        self::init();
        unset($_SESSION['usuario']);
        //Redireciona o usuário para o login.php
        header('Location: login.php');
        exit;
    }
    /**
     * Método responsável por verificar se está logado
     * @return boolean
     */
    public static function isLogged()
    {
        //inicia a sessão
        self::init();
        return isset($_SESSION['usuario']['id']);
    }
    /**
     * Método responsável por obrigar o usuário a estar logado
     */
    public static function requireLogin()
    {
        if (!self::isLogged()) {
            header('Location: /sistemas/login.php');
            exit;
        }
    }
    /**
     * Método responsável por obrigar o usuário a estar deslogado
     */
    public static function requireLogout()
    {
        if (self::isLogged()) {
            header('Location: index.php');
            exit;
        }
    }
    public static function getInfo()
    {
        self::init();
        return $_SESSION['user'] ?? [];
    }

}

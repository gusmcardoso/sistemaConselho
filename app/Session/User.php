<?php

namespace App\Session;

use App\Db\DataBase;

class User{
    private static function init(){
    
        return session_status() !== PHP_SESSION_ACTIVE ? session_start() : true;

    }
    public static function getUsuario($email){
        return (new DataBase('usuario'))->select('email = "'.$email.'"')->fetchObject(self::class);
    }
    public static function login($nome, $primeiro_nome, $sobrenome, $email, $foto){
        self::init();
        $usuario = self::getUsuario($email);
        echo "<pre>";
print_r($usuario);
echo "<\pre>";

        if($email == $usuario->email){
            $_SESSION['user'] = [
                'nome' => $nome,
                'primeiro_nome' => $primeiro_nome,
                'sobrenome' => $sobrenome,
                'email' => $email,
                'foto' => $foto
            ];
            return true;
        }else{
            return false;
        }        

    }
    public static function isLogged(){
        self::init();
        return isset($_SESSION['user']);
    }
    public static function logout(){
        self::init();
        unset($_SESSION['user']);
    }
    public static function getInfo(){
        self::init();
        return $_SESSION['user'] ?? [];
    }
    
}
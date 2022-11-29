<?php

namespace App\Session;

use App\Db\DataBase;
use App\Entity\Aluno;
use App\Entity\Servidor;

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
    public static function loginAD($login){
        self::init();
        if(strlen($login)<11){
           
            $servidor = new Servidor;
            
            $servidor = $servidor->getServidores('matricula = "'.$login.'"')[0];
            
            $_SESSION['user'] = [
                'login' => $login,
                'nome' => $servidor->nome
            ];
            
        }else{
            
            $cpff = '';
            for ($i = 0; $i < 11; $i++) {
                if (($i == 3) or ($i == 6)) {
                    $cpff .= '.';
                }
                if ($i == 9) {
                    $cpff .= '-';
                }  
                $cpff .= $login[$i];      
            }
            
            $aluno = new Aluno;
            $aluno = $aluno->getAlunos('cpf = "'.$cpff.'"')[0];
            
            $_SESSION['user'] = [
                'login' => $cpff,
                'nome' => $aluno->nome
            ];
        }
        return true;
    
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
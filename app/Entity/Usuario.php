<?php

namespace App\Entity;

use \App\Db\DataBase;

class Usuario
{
    public $id;
    public $nome;
    public $usuario;
    public $senha;

    public function cadastrar()
    {
        $tabela = new Database('usuarios');
        $this->id = $tabela->insert([
            'nome' => $this->nome,
            'usuario' => $this->usuario,
            'senha' => $this->senha,
        ]);
        return true;
    }
    public static function getUsuario($usuario)
    {
        return (new Database('usuarios'))->select('usuario = "' . $usuario . '"')->fetchObject(self::class);
    }

}

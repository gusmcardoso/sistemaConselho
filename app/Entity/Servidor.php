<?php
namespace App\Entity;

use App\Db\DataBase;
use PDO;

class Servidor{
    
    public $id;
    public $nome;
    public $telefone;
    public $email;
    public $matricula;
    public $cargo;

    public function cadastrar(){
        $tabela = new Database('servidor');
        $this->id = $tabela->insert([
            'nome' => $this->nome,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'matricula' => $this->matricula,
            'cargo' => $this->cargo
        ]);
        return true;    
    }
    public function atualizar(){
        return (new DataBase('servidor'))->update('id = '.$this->id, [
            'nome' => $this->nome,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'matricula' => $this->matricula,
            'cargo' => $this->cargo
        ]);
    }
    public function excluir(){
        return (new DataBase('servidor'))->delete('id = '.$this->id);
    }

    public static function getServidor($id){
        return (new DataBase('servidor'))->select('id = '.$id)->fetchObject(self::class);
    }

    public static function getQuantidadeServidores($where = null, $order = 'nome', $limit=null){
        return (new DataBase('servidor'))->select($where, null ,null , 'count(*) as qtd')->fetchObject()->qtd; 
    }

    public static function getServidores($where = null, $order = 'nome', $limit=null){
        return (new DataBase('servidor'))->select($where, $order,$limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }
}
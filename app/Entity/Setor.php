<?php
namespace App\Entity;

use App\Db\DataBase;
use PDO;

class Setor{
    
    public $id;
    public $nome;
/*
    private $id;
    private $titulo;
    private $descricao;
    private $quantidade;
    private $remuneracao;
    private $data_abertura;
    private $data_fechamento;
    private $data;
*/
    

    public function cadastrar(){
        $tabela = new Database('setor');
        $this->id = $tabela->insert([
            'nome' => $this->nome,
        ]);
        return true;    
    }
    public function atualizar(){
        return (new DataBase('setor'))->update('id = '.$this->id, [
            'nome' => $this->nome,
        ]);
    }
    public function excluir(){
        return (new DataBase('setor'))->delete('id = '.$this->id);
    }

    public static function getSetor($id){
        return (new DataBase('setor'))->select('id = '.$id)->fetchObject(self::class);
    }
    public static function getSetores($where = null, $order = null, $limit=null){
        return (new DataBase('setor'))->select($where, $order,$limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }
}
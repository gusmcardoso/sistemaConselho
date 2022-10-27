<?php
namespace App\Entity;

use App\Db\DataBase;
use PDO;

class Vaga{
    
    public $id;
    public $titulo;
    public $descricao;
    public $quantidade;
    public $remuneracao;
    public $data_abertura;
    public $data_fechamento;
    public $data;
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
        $this->data_abertura = date('y-m-d', strtotime($this->data_abertura));
        
        $this->data_fechamento = date('y-m-d', strtotime($this->data_fechamento));
        $this->data = date('y-m-d H:i');
        $banco = new Database('vaga');
        $this->id = $banco->insert([
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'quantidade' => $this->quantidade,
            'remuneracao' => $this->remuneracao,
            'data_abertura' => $this->data_abertura,
            'data_fechamento' => $this->data_fechamento,
            'data' => $this->data
        ]);
        return true;    
    }
    public function atualizar(){
        $this->data_abertura = date('y-m-d', strtotime($this->data_abertura));
        $this->data_fechamento = date('y-m-d', strtotime($this->data_fechamento));
        $this->data = date('y-m-d H:i');
        return (new DataBase('vaga'))->update('id = '.$this->id, [
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'quantidade' => $this->quantidade,
            'remuneracao' => $this->remuneracao,
            'data_abertura' => $this->data_abertura,
            'data_fechamento' => $this->data_fechamento,
            'data' => $this->data
        ]);
    }
    public function excluir(){
        return (new DataBase('vaga'))->delete('id = '.$this->id);
    }

    public static function getVaga($id){
        return (new DataBase('vaga'))->select('id = '.$id)->fetchObject(self::class);
    }
    public static function getVagas($where = null, $order = null, $limit=null){
        return (new DataBase('vaga'))->select($where, $order,$limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }
}
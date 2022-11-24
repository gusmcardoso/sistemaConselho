<?php
namespace App\Entity;

use App\Db\DataBase;
use PDO;

class Notificacao{
    
    public $id;
    public $descricao;
    public $servidor;
    public $aluno;
    public $data;

    public function cadastrar(){
        $this->data = date('Y-m-d H:i');
        $tabela = new Database('notificacao');
        $this->id = $tabela->insert([
            'aluno' => $this->aluno->id,
            'descricao' => $this->descricao,
            'servidor' => $this->servidor,
            'data' => $this->data
        ]);
        return true;    
    }
    public function atualizar(){
        $this->data = date('Y-m-d H:i');
        return (new DataBase('notificacao'))->update('id = '.$this->id, [
            'aluno' => $this->aluno->id,
            'descricao' => $this->descricao,
            'servidor' => $this->servidor
        ]);
    }
    public function excluir(){
        return (new DataBase('notificacao'))->delete('id = '.$this->id);
    }

    public static function getNotificacao($id){
        return (new DataBase('notificacao'))->select('id = '.$id)->fetchObject(self::class);
    }
    public static function getNotificacoes($where = null, $order = 'id desc', $limit=null){
        return (new DataBase('notificacao'))->select($where, $order,$limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }
    public static function getQuantidadeNotificacoes($where = null, $order = 'id desc', $limit=null){
        return (new DataBase('notificacao'))->select($where, null ,null , 'count(*) as qtd')->fetchObject()->qtd; 
    }
}
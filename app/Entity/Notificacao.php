<?php
namespace App\Entity;

use App\Db\DataBase;
use PDO;

class Notificacao{
    
    public $id;
    public $descricao;
    public $servidor;
    public $aluno;

    public function cadastrar(){
        $tabela = new Database('notificacao');
        $this->id = $tabela->insert([
            'aluno' => $this->aluno->id,
            'descricao' => $this->descricao,
            'servidor' => $this->servidor
        ]);
        return true;    
    }
    public function atualizar(){
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
    public static function getNotificacoes($where = null, $order = null, $limit=null){
        return (new DataBase('notificacao'))->select($where, $order,$limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }
}
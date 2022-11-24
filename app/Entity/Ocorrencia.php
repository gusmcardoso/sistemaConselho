<?php
namespace App\Entity;

use App\Db\DataBase;
use PDO;

class Ocorrencia{
    
    public $id;
    public $aluno;
    public $tipo_ocorrencia;
    public $descricao;
    public $servidor;
    public $setor_registro;
    public $setor_destino;
    public $data_ocorrencia;  
    
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
        $this->data_ocorrencia = date('Y-m-d H:i');
        $banco = new Database('ocorrencia');
        $this->id = $banco->insert([
            'aluno' => $this->aluno->id,
            'tipo_ocorrencia' => $this->tipo_ocorrencia->id,
            'descricao' => $this->descricao,
            'servidor' => $this->servidor,
            'setor_registro' => $this->setor_registro->id,
            'setor_destino' => $this->setor_destino->id,
            'data_ocorrencia' => $this->data_ocorrencia
        ]);
        return true;    
    }
    public function atualizar(){
        $this->data = date('Y-m-d H:i');
        return (new DataBase('ocorrencia'))->update('id = '.$this->id, [
            'aluno' => $this->aluno->id,
            'tipo_ocorrencia' => $this->tipo_ocorrencia->id,
            'descricao' => $this->descricao,
            'servidor' => $this->servidor,
            'setor_registro' => $this->setor_registro->id,
            'setor_destino' => $this->setor_destino->id,
            'data_ocorrencia' => $this->data_ocorrencia
        ]);
    }
    public function excluir(){
        return (new DataBase('ocorrencia'))->delete('id = '.$this->id);
    }

    public static function getOcorrencia($id){
        return (new DataBase('ocorrencia'))->select('id = '.$id)->fetchObject(self::class);
    }

    public static function getQuantidadeOcorrencias($where = null, $order = 'id desc', $limit=null){
        return (new DataBase('ocorrencia'))->select($where, null ,null , 'count(*) as qtd')->fetchObject()->qtd; 
    }

    public static function getOcorrencias($where = null, $order = 'id desc', $limit=null){
        return (new DataBase('ocorrencia'))->select($where, $order,$limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public static function getOcorrencias2($tabela2='tipo_ocorrencia', $chave1, $chave2, $where = null, $order = 'id desc', $limit=null, $fields='*', $fields2='*'){
        return (new DataBase('ocorrencia'))->select2($tabela2, $chave1, $chave2, $where, $order,$limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }
}
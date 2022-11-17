<?php
namespace App\Entity;

use App\Db\DataBase;
use PDO;

class TipoOcorrencia{
    
    public $id;
    public $tipo_ocorrencia;

    public function cadastrar(){
        $tabela = new Database('tipo_ocorrencia');
        $this->id = $tabela->insert([
            'tipo_ocorrencia' => $this->tipo_ocorrencia,
        ]);
        return true;    
    }
    public function atualizar(){
        return (new DataBase('tipo_ocorrencia'))->update('id = '.$this->id, [
            'tipo_ocorrencia' => $this->tipo_ocorrencia,
        ]);
    }
    public function excluir(){
        return (new DataBase('tipo_ocorrencia'))->delete('id = '.$this->id);
    }

    public static function getTipoOcorrencia($id){
        return (new DataBase('tipo_ocorrencia'))->select('id = '.$id)->fetchObject(self::class);
    }
    public static function getTipoOcorrencias($where = null, $order = null, $limit=null){
        return (new DataBase('tipo_ocorrencia'))->select($where, $order ,$limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }
}
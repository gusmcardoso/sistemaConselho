<?php
namespace App\Entity;

use App\Db\DataBase;
use PDO;

class Aluno{
    
    public $id;
    public $nome;
    public $cpf;
    public $telefone;
    public $telefone_responsavel;
    public $email_institucional;
    public $email_pessoal;
    public $matricula;
    public $curso;
    public $curso_full;
    public $periodo;
    public $dtn;
    public $ocorrencias;

    public function cadastrar(){
        $tabela = new Database('aluno');
        $this->dtn = date('Y-m-d', strtotime($this->dtn));
        $this->id = $tabela->insert([
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'telefone' => $this->telefone,
            'telefone_responsavel' => $this->telefone_responsavel,
            'email_institucional' => $this->email_institucional,
            'email_pessoal' => $this->email_pessoal,
            'matricula' => $this->matricula,
            'curso' => $this->curso,
            'periodo' => $this->periodo,
            'dtn' => $this->dtn
        ]);
        return true;    
    }
    public function atualizar(){
        $this->dtn = date('Y-m-d', strtotime($this->dtn));
        return (new DataBase('aluno'))->update('id = '.$this->id, [
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'telefone' => $this->telefone,
            'telefone_responsavel' => $this->telefone_responsavel,
            'email_institucional' => $this->email_institucional,
            'email_pessoal' => $this->email_pessoal,
            'matricula' => $this->matricula,
            'curso' => $this->curso,
            'periodo' => $this->periodo,
            'dtn' => $this->dtn
        ]);
    }
    public function excluir(){
        return (new DataBase('aluno'))->delete('id = '.$this->id);
    }

    public static function getAluno($id){
        return (new DataBase('aluno'))->select('id = '.$id)->fetchObject(self::class);
    }

    public static function getQuantidadeAlunos($where = null, $order = 'nome', $limit=null){
        return (new DataBase('aluno'))->select($where, null ,null , 'count(*) as qtd')->fetchObject()->qtd; 
    }

    public static function getAlunos($where = null, $order = 'nome', $limit=null){
        return (new DataBase('aluno'))->select($where, $order,$limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }
}
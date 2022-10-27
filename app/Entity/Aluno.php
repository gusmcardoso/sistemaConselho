<?php
namespace App\Entity;

use App\Db\DataBase;
use PDO;

class Aluno{
    
    public $id;
    public $nome;
    public $cpf;
    public $telefone;
    public $email_institucional;
    public $email_pessoal;
    public $matricula;
    public $curso;
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
        $tabela = new Database('aluno');
        $this->id = $tabela->insert([
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'telefone' => $this->telefone,
            'email_institucional' => $this->email_institucional,
            'email_pessoal' => $this->email_pessoal,
            'matricula' => $this->matricula,
            'curso' => $this->curso
        ]);
        return true;    
    }
    public function atualizar(){
        return (new DataBase('aluno'))->update('id = '.$this->id, [
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'telefone' => $this->telefone,
            'email_institucional' => $this->email_institucional,
            'email_pessoal' => $this->email_pessoal,
            'matricula' => $this->matricula,
            'curso' => $this->curso
        ]);
    }
    public function excluir(){
        return (new DataBase('aluno'))->delete('id = '.$this->id);
    }

    public static function getAluno($id){
        return (new DataBase('aluno'))->select('id = '.$id)->fetchObject(self::class);
    }
    public static function getAlunos($where = null, $order = 'nome', $limit=null){
        return (new DataBase('aluno'))->select($where, $order,$limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }
}
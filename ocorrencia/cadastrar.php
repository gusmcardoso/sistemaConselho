<?php
require('../vendor/autoload.php');
define('TITLE', 'Cadastrar Ocorrência');

use \App\Entity\Ocorrencia;
use App\Entity\Aluno;
use App\Entity\Setor;
use App\Entity\TipoOcorrencia;
use App\Session\User;

$ocorrencia = new Ocorrencia;
$aluno = new Aluno;
$tipo_ocorrencia = new TipoOcorrencia;
$setor_registro = new Setor;
$setor_destino = new Setor;
$usuario = User::getInfo();

if (isset($_GET['aluno'])) {
    $aluno = $aluno->getAluno($_GET['aluno']);
   
}
if (isset($_POST['descricao'])) {

    $aluno = $aluno->getAluno($_POST['aluno']);
    $tipo_ocorrencia = $tipo_ocorrencia->getTipoOcorrencia($_POST['tipo_ocorrencia']);
    $setor_registro = $setor_registro->getSetor($_POST['setor_registro']);
    $setor_destino = $setor_destino->getSetor($_POST['setor_destino']);

    $ocorrencia->id =  $_POST['id'];
    $ocorrencia->aluno =  $aluno;
    
    $ocorrencia->tipo_ocorrencia = $tipo_ocorrencia;
    
    $ocorrencia->descricao =  $_POST['descricao'];
    $ocorrencia->servidor = $usuario['nome'];
    $ocorrencia->setor_registro =  $setor_registro;
    $ocorrencia->setor_destino =  $setor_destino;


    $ocorrencia->cadastrar();
    header('location: listar.php?status=success');
    exit;
}

include('../includes/header.php');

include('formulario.php');

include('../includes/footer.php');

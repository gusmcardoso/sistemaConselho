<?php
require __DIR__ . '/../vendor/autoload.php';
define('TITLE', 'Editar Aluno');

use \App\Entity\Aluno;
use \App\Session\Login;

Login::requireLogin();
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: listar.php?status=error');
    exit;
}

$aluno = Aluno::getAluno($_GET['id']);

if (!$aluno instanceof Aluno) {
    header('location: listar.php?status=error');
    exit;
}

if (isset($_POST['nome'])) {

    $aluno->id = $_GET['id'];
    $aluno->nome = $_POST['nome'];
    $aluno->cpf = $_POST['cpf'];
    $aluno->telefone = $_POST['telefone'];
    $aluno->email_institucional = $_POST['email_institucional'];
    $aluno->email_pessoal = $_POST['email_pessoal'];
    $aluno->matricula = $_POST['matricula'];
    $aluno->curso = $_POST['curso'];
    $aluno->dtn = $_POST['dtn'];
    $aluno->atualizar();
    header('location: listar.php?status=success');
    exit;
}

include __DIR__ . '/../includes/header.php';

include __DIR__ . '/formulario.php';

include __DIR__ . '/../includes/footer.php';

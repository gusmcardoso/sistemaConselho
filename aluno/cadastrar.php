<?php

require '../vendor/autoload.php';
define('TITLE', 'Cadastrar Aluno');

use \App\Entity\Aluno;
use \App\Session\Login;

Login::requireLogin();
if (isset($_POST['nome'])) {
    $aluno = new Aluno;
    $aluno->id = $_GET['id'];
    $aluno->nome = $_POST['nome'];
    $aluno->cpf = $_POST['cpf'];
    $aluno->telefone = $_POST['telefone'];
    $aluno->email_institucional = $_POST['email_institucional'];
    $aluno->email_pessoal = $_POST['email_pessoal'];
    $aluno->matricula = $_POST['matricula'];
    $aluno->curso = $_POST['curso'];
    $aluno->cadastrar();
    header('location: listar.php?status=success');
    exit;
}
include '../includes/header.php';

include 'formulario.php';

include '../includes/footer.php';

<?php

use App\Entity\Aluno;
use App\Db\Pagination;
use App\Entity\Notificacao;


$busca = filter_input(INPUT_GET, 'busca', FILTER_SANITIZE_STRING);
$curso = filter_input(INPUT_GET, 'curso', FILTER_SANITIZE_STRING);
$periodo = filter_input(INPUT_GET, 'periodo', FILTER_SANITIZE_STRING);
if ($count == 14) {

    $aluno = Aluno::getAlunos('cpf = "' . $usuario['cpf'] . '"')[0];

    $condicoes = [
        'aluno = ' . $aluno->id
    ];


    $condicoes = array_filter($condicoes);

    $where = implode(' AND ', $condicoes);

    $notificacoes = Notificacao::getNotificacoes($where);
/*
    echo "<pre>";
    print_r($notificacoes);
    echo "</pre>";
    $resultados = '';
*/

    include (__DIR__.'/listagem.php');
}

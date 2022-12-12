<?php

use App\Db\Pagination;
use App\Entity\Ocorrencia;

require '../vendor/autoload.php';
use \App\Session\Login;

Login::requireLogin();
$busca = filter_input(INPUT_GET, 'busca', FILTER_SANITIZE_STRING);
$tipo = filter_input(INPUT_GET, 'tipo_ocorrencia', FILTER_SANITIZE_STRING);

$condicoes = [
    strlen($busca) ? 'aluno = ' . $busca : null,
    strlen($tipo) ? 'tipo_ocorrencia = ' . $tipo : null,
];

$condicoes = array_filter($condicoes);

$where = implode(' AND ', $condicoes);

$quantidadeOcorrencias = Ocorrencia::getQuantidadeOcorrencias($where);
$paginacao = new Pagination($quantidadeOcorrencias, $_GET['pagina'] ?? 1, 10);
$ocorrencias = Ocorrencia::getOcorrencias($where, 'id desc', $paginacao->getLimit());
//$ocorrencias2 = Ocorrencia::getOcorrencias2('tipo_ocorrencia','tipo_ocorrencia','id',$where,null,$paginacao->getLimit());
/*
echo "<pre>";
echo $where;
echo "</pre>";
 */

include '../includes/header.php';

include '../includes/menu.php';

include 'listagem.php';

include __DIR__ . '/../includes/paginacao.php';

include '../includes/footer.php';

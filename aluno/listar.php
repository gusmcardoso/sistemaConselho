<?php

    use App\Entity\Aluno;
    use App\Db\Pagination;
    require (__DIR__.'/../vendor/autoload.php');

    $busca = filter_input(INPUT_GET, 'busca', FILTER_SANITIZE_STRING);
    $curso = filter_input(INPUT_GET, 'curso', FILTER_SANITIZE_STRING);
    $periodo = filter_input(INPUT_GET, 'periodo', FILTER_SANITIZE_STRING);
    
    $condicoes = [
        strlen($busca) ? 'nome like "%'. str_replace(' ','%',$busca) .'%" or cpf like "%'.$busca.'%"' : null,
        strlen($curso) ? 'curso like "%'. str_replace(' ','%',$curso) .'%"' : null,
        strlen($curso) ? 'periodo like "%'. str_replace(' ','%',$periodo) .'%"' : null
    ];

    $condicoes = array_filter($condicoes);

    $where = implode(' AND ', $condicoes);

    $quantidadeAlunos = Aluno::getQuantidadeAlunos($where);
    $paginacao = new Pagination($quantidadeAlunos, $_GET['pagina'] ?? 1, 10);
    $alunos = Aluno::getAlunos($where,null,$paginacao->getLimit());

    include (__DIR__.'/../includes/header.php');

    include (__DIR__.'/../includes/menu.php');
    
    include (__DIR__.'/listagem.php');

    include (__DIR__.'/../includes/paginacao.php');
    
    include (__DIR__.'/../includes/footer.php');

?>
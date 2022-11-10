<?php

    use App\Entity\Aluno;
    use App\Db\Pagination;
    require (__DIR__.'/../vendor/autoload.php');

    
    $quantidadeAlunos = Aluno::getQuantidadeAlunos();
    $paginacao = new Pagination($quantidadeAlunos, $_GET['pagina'] ?? 1, 10);
    
    
    
    

    include (__DIR__.'/../includes/header.php');

    include (__DIR__.'/../includes/menu.php');
    
    include (__DIR__.'/listagem.php');
    
    include (__DIR__.'/../includes/footer.php');

?>
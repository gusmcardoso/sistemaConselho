<?php

use App\Entity\Aluno;
use App\Entity\Notificacao;

require (__DIR__.'/../vendor/autoload.php');

    $curso = filter_input(INPUT_POST, 'curso', FILTER_SANITIZE_STRING);
    $periodo = filter_input(INPUT_POST, 'periodo', FILTER_SANITIZE_STRING);
    $id = filter_input(INPUT_POST, 'aluno_id', FILTER_SANITIZE_STRING);
    $descricao = $_POST['descricao'];
    
    $condicoes = [
        strlen($curso) ? 'curso like "%'. str_replace(' ','%',$curso) .'%"' : null,
        strlen($periodo) ? 'periodo like "%'. str_replace(' ','%',$periodo) .'%"' : null
    ];

    $condicoes = array_filter($condicoes);

    $where = implode(' AND ', $condicoes);
    
    if (App\Session\User::isLogged()) {
        $usuario = App\Session\User::getInfo();
    } else {
        header('location: ../index.php');
    }
    
    if (($_POST['aluno_id'] != '') && isset($_POST['descricao'])) {
        $aluno = new Aluno;
        $notificacao = new Notificacao;
        $aluno->id = $_POST['aluno_id'];
        $notificacao->aluno =  $aluno;
        $notificacao->descricao =  $_POST['descricao'];
        $notificacao->servidor = $usuario['login'];
        
        $notificacao->cadastrar();
    
        header('location: listar.php?status=success');
        exit;

        
    }elseif(isset($_POST['descricao'])){
        $alunos = Aluno::getAlunos($where);
        /*
        echo "<pre>";
    print_r($alunos);
    echo "</pre>";
    */

        foreach($alunos as $a){
            $notificacao = new Notificacao;
            $notificacao->aluno = $a;
            $notificacao->descricao =  $_POST['descricao'];
            $notificacao->servidor = $usuario['login'];
            $notificacao->cadastrar();
    
        }
        header('location: listar.php?status=success');
        exit;
    }
    echo "<br>aki4";

    include (__DIR__.'/../includes/header.php');

    include (__DIR__.'/../includes/menu.php');
    
   
    
    include (__DIR__.'/../includes/footer.php');

?>
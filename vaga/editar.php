<?php
    require (__DIR__.'/../vendor/autoload.php');
    define('TITLE','Editar Vaga');
    
    use \App\Entity\Vaga;
    use \App\Session\Login;

    Login::requireLogin();
    if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
        header('location: listar.php?status=error');
        exit;
    }

    $vaga = Vaga::getVaga($_GET['id']);
    
    if(!$vaga instanceof Vaga){
        header('location: listar.php?status=error');
        exit;
    }

    if(isset($_POST['titulo'],$_POST['descricao'])){
        
        $vaga->id =  $_GET['id']; 
        $vaga->titulo =  $_POST['titulo']; 
        $vaga->descricao =  $_POST['descricao']; 
        $vaga->quantidade =  $_POST['quantidade'];
        $vaga->remuneracao =  $_POST['remuneracao'];
        $vaga->data_abertura =  $_POST['data_abertura'];
        $vaga->data_fechamento =  $_POST['data_fechamento']; 
        $vaga->atualizar();
        header('location: listar.php?status=success');
        exit;
    }

    include (__DIR__.'/../includes/header.php');
    
    include (__DIR__.'/formulario.php');
    
    include (__DIR__.'/../includes/footer.php');

?>
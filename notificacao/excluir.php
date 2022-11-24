<?php
    require (__DIR__.'/../vendor/autoload.php');
    
    use \App\Entity\Notificacao;

    if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
        header('location: listar.php?status=error');
        exit;
    }

    $notificacao = Notificacao::getNotificacao($_GET['id']);
    
    if(!$notificacao instanceof Notificacao){
        header('location: listar.php?status=error');
        exit;
    }

    if(isset($_POST['excluir'])){
        
        
        $notificacao->excluir();
        header('location: listar.php?status=success');
        exit;
    }

    include (__DIR__.'/../includes/header.php');
 
    include (__DIR__.'/confirmar-exclusao.php');
    
    include (__DIR__.'/../includes/footer.php');

?>
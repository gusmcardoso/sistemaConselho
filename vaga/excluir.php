<?php
    require (__DIR__.'/../vendor/autoload.php');
    
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

    if(isset($_POST['excluir'])){
        
        
        $vaga->excluir();
        header('location: listar.php?status=success');
        exit;
    }

    include (__DIR__.'/../includes/header.php');
 
    include (__DIR__.'/confirmar-exclusao.php');
    
    include (__DIR__.'/../includes/footer.php');

?>
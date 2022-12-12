<?php
    require ('../vendor/autoload.php');
    
    use \App\Entity\Ocorrencia;
    use \App\Session\Login;

    Login::requireLogin();
    if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
        header('location: listar.php?status=error');
        exit;
    }

    $ocorrencia = Ocorrencia::getOcorrencia($_GET['id']);
    
    if(!$ocorrencia instanceof Ocorrencia){
        header('location: listar.php?status=error');
        exit;
    }
    
    if(isset($_POST['excluir'])){
        
        
        $ocorrencia->excluir();
        header('location: listar.php?status=success');
        exit;
    }

    include ('../includes/header.php');
    
    include ('confirmar-exclusao.php');
    
    include ('../includes/footer.php');
?>
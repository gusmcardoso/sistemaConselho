<?php
    require ('../vendor/autoload.php');
    define('TITLE','Cadastrar Vaga');
    
    use \App\Entity\Vaga;
    
    if(isset($_POST['titulo'],$_POST['descricao'])){
        $vaga = new Vaga;
        $vaga->id =  $_POST['id']; 
        $vaga->titulo =  $_POST['titulo']; 
        $vaga->descricao =  $_POST['descricao']; 
        $vaga->quantidade =  $_POST['quantidade'];
        $vaga->remuneracao =  $_POST['remuneracao'];
        $vaga->data_abertura =  $_POST['data_abertura'];
        $vaga->data_fechamento =  $_POST['data_fechamento']; 
        $vaga->cadastrar();
        header('location: listar.php?status=success');
        exit;
    }

    include ('/var/www/html/sistemas/includes/header.php');
    
    include ('/var/www/html/sistemas/vaga/formulario.php');
    
    include ('/var/www/html/sistemas/includes/footer.php');

?>
<?php
    require ('../vendor/autoload.php');
    define('TITLE','Editar Ocorrência');
    
    use \App\Entity\Ocorrencia;
    use App\Entity\Aluno;
    use App\Entity\Setor;

    if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
        header('location: listar.php?status=error');
        exit;
    }

    $ocorrencia = Ocorrencia::getOcorrencia($_GET['id']);
    
    if(!$ocorrencia instanceof Ocorrencia){
        header('location: listar.php?status=error');
        exit;
    }

    if(isset($_POST['servidor'],$_POST['descricao'])){
    
        $ocorrencia = new Ocorrencia;
        $aluno = new Aluno;
        $setor_registro = new Setor;
        $setor_destino = new Setor;
       
        $aluno = $aluno->getAluno($_POST['aluno']);
        
        $setor_registro = $setor_registro->getSetor($_POST['setor_registro']);
        
        $setor_destino = $setor_destino->getSetor($_POST['setor_destino']);

        $ocorrencia->id =  $_GET['id']; 
        $ocorrencia->aluno =  $aluno; 
        $ocorrencia->descricao =  $_POST['descricao']; 
        $ocorrencia->servidor =  $_POST['servidor'];
        $ocorrencia->setor_registro =  $setor_registro;
        $ocorrencia->setor_destino =  $setor_destino;
    
        /*
        echo "<pre>";
        print_r($ocorrencia);
        echo "</pre>";
        exit;
        */
        $ocorrencia->atualizar();
        header('location: listar.php?status=success');
        exit;
    }

    include ('../includes/header.php');
    
    include ('formulario.php');
    
    include ('../includes/footer.php');

?>
<?php
    require ('../vendor/autoload.php');
    define('TITLE','Editar Ocorrência');
    
    use \App\Entity\Ocorrencia;
    use App\Entity\Aluno;
    use App\Entity\Setor;
    use App\Session\User;

    if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
        
        header('location: listar.php?status=error');
        exit;
    }

    $ocorrencia = Ocorrencia::getOcorrencia($_GET['id']);
    
    if(!$ocorrencia instanceof Ocorrencia){
        header('location: listar.php?status=error');
        exit;
    }
    $ocorrencia = new Ocorrencia;
    $aluno = new Aluno;
    $setor_registro = new Setor;
    $setor_destino = new Setor;
    $usuario = User::getInfo();
    
    if (isset($_GET['id'])) {
        $ocorrencia = $ocorrencia->getOcorrencia($_GET['id']);
        $aluno = $aluno->getAluno($ocorrencia->aluno);
        $ocorrencia->aluno = $aluno;
        $setor_registro = $setor_registro->getSetor($ocorrencia->setor_registro);
        $setor_destino = $setor_destino->getSetor($ocorrencia->setor_destino);

    }if(isset($_POST['descricao'])){

        //$aluno = $aluno->getAluno($_POST['aluno']);
        
        $setor_registro = $setor_registro->getSetor($_POST['setor_registro']);
        
        $setor_destino = $setor_destino->getSetor($_POST['setor_destino']);

        //$ocorrencia->id =  $_GET['id']; 
        //$ocorrencia->aluno =  $aluno; 
        $ocorrencia->descricao =  $_POST['descricao']; 
        $ocorrencia->servidor =  $usuario['login'];
        $ocorrencia->setor_registro =  $setor_registro;
        $ocorrencia->setor_destino =  $setor_destino;
    
        
        echo "<pre>";
        print_r($ocorrencia);
        echo "</pre>";
        
        
        $ocorrencia->atualizar();
        header('location: listar.php?status=success');
        exit;
    }

    include ('../includes/header.php');
    
    include ('formulario.php');
    
    include ('../includes/footer.php');

?>
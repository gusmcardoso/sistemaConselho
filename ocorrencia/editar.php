<?php
    require ('../vendor/autoload.php');
    define('TITLE','Editar Ocorrência');
    
    use \App\Entity\Ocorrencia;
    use App\Entity\Aluno;
    use App\Entity\Setor;
    use App\Session\User;
    use App\Entity\TipoOcorrencia;

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
    $tipo_ocorrencia = new TipoOcorrencia;
    $setor_registro = new Setor;
    $setor_destino = new Setor;
    $usuario = User::getInfo();
    
    if (isset($_GET['id'])) {
        $ocorrencia = $ocorrencia->getOcorrencia($_GET['id']);
        $aluno = $aluno->getAluno($ocorrencia->aluno);
        
        $ocorrencia->aluno = $aluno;
        $tipo_ocorrencia = $tipo_ocorrencia->getTipoOcorrencia($ocorrencia->tipo_ocorrencia);
        $setor_registro = $setor_registro->getSetor($ocorrencia->setor_registro);
        $setor_destino = $setor_destino->getSetor($ocorrencia->setor_destino);

    }if(isset($_POST['descricao'])){

        $tipo_ocorrencia = $tipo_ocorrencia->getTipoOcorrencia($_POST['tipo_ocorrencia']);
        $setor_registro = $setor_registro->getSetor($_POST['setor_registro']);
        $setor_destino = $setor_destino->getSetor($_POST['setor_destino']);

        $ocorrencia->tipo_ocorrencia = $tipo_ocorrencia;
        $ocorrencia->descricao =  $_POST['descricao']; 
        $ocorrencia->servidor =  $usuario['nome'];
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
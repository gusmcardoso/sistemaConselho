<?php
    require ('../vendor/autoload.php');
    define('TITLE','Cadastrar Ocorrência');
    
    use \App\Entity\Ocorrencia;
    use App\Entity\Aluno;
    use App\Entity\Setor;
    use App\Session\User;

if(isset($_POST['aluno'],$_POST['descricao'])){
    
        $ocorrencia = new Ocorrencia;
        $aluno = new Aluno;
        $setor_registro = new Setor;
        $setor_destino = new Setor;
        $usuario = User::getInfo();
        $aluno = $aluno->getAluno($_POST['aluno']);
        $setor_registro = $setor_registro->getSetor($_POST['setor_registro']);
        $setor_destino = $setor_destino->getSetor($_POST['setor_destino']);

        $ocorrencia->id =  $_POST['id']; 
        $ocorrencia->aluno =  $aluno; 
        $ocorrencia->descricao =  $_POST['descricao']; 
        $ocorrencia->servidor = $usuario['login']; 
        $ocorrencia->setor_registro =  $setor_registro;
        $ocorrencia->setor_destino =  $setor_destino;
    
        /*
        echo $a."<pre>";
        print_r($ocorrencia);
        echo "</pre>";
        exit;
        */
        $ocorrencia->cadastrar();
        header('location: listar.php?status=success');
        exit;
    }

    include ('../includes/header.php');
    
    include ('formulario.php');
    
    include ('../includes/footer.php');

?>
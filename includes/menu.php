<?php

use App\Entity\Aluno;

if (App\Session\User::isLogged()) {
    $usuario = App\Session\User::getInfo();
} else {
    header('location: ../index.php');
}
?>
<nav class="navbar rounded navbar-dark" style="background-color: #0A5517;">

    <div class="col-md-1">
        <a class="navbar-brand" href="/sistemas/index.php">
            <img src="/sistemas/images/renovad.png" width="30" height="30" class="d-inline-block align-top" alt="">

        </a>
    </div>
    <?php
    $count = strlen($usuario['login']);
    $cpff = '';
    if ($count < 11) {
        $login = $usuario['login'];
        
    ?>
        <div class="col-md-7">
            <a class="btn btn-outline-success text-white" href="/sistemas/aluno/listar.php">Alunos</a>
            <a class="btn btn-outline-success text-white" href="/sistemas/ocorrencia/listar.php">Ocorrências</a>
            <a class="btn btn-outline-success text-white" href="/sistemas/notificacao/listar.php">Notificacao</a>
            <a class="btn btn-outline-success text-white" href="/sistemas/vaga/listar.php">Vagas de Estagio</a>

            <span class="badge badge-secondary">Novo</span>
        </div>
    <?php
    } else {
        

        for ($i = 0; $i < 11; $i++) {
            if (($i == 3) or ($i == 6)) {
                $cpff .= '.';
            }
            if ($i == 9) {
                $cpff .= '-';
            }

            $cpff .= $usuario['login'][$i];
        }
        $login = Aluno::getAlunos('cpf = "'.$cpff.'"')[0]->nome;
        
    }
    ?>
    
    <div class="col-md-4 ml-auto">
    <button class="btn btn-dark"><?= $login; ?></button>
        <a href="/sistemas/logout.php" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
            </svg></button></a>
    </div>
</nav>
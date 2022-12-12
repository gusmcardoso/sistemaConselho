<?php
use \App\Session\Login;
//Dados do usuario logado
$usuarioLogado = Login::getUsuarioLogado();
//Detalhes do usuario
$usuario = $usuarioLogado ? $usuarioLogado['nome'] . ' <a href="/sistemas/logout.php" class="text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16">
<path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
</svg></a>' :
'Visitante <a href="login.php" class="text-light font-weight-bold ml-2">Entrar</a>'
?>
<nav class="navbar rounded navbar-dark" style="background-color: #0A5517;">

    <div class="col-md-1">
        <a class="navbar-brand" href="/sistemas/index.php">
            <img src="/sistemas/images/renovad.png" width="30" height="30" class="d-inline-block align-top" alt="">

        </a>
    </div>
          <div class="col-md-9">
            <a class="btn btn-outline-success text-white" href="/sistemas/aluno/listar.php">Alunos</a>
            <a class="btn btn-outline-success text-white" href="/sistemas/ocorrencia/listar.php">Ocorrências</a>
            <a class="btn btn-outline-success text-white" href="/sistemas/notificacao/listar.php">Notificação</a>
            <a class="btn btn-outline-success text-white" href="/sistemas/vaga/listar.php">Vagas de Estagio</a>

            <span class="badge badge-secondary">Novo</span>
        </div>
         <div class="col-md-2 text-light">
            <a class="text-light text-decoration-none"><?=$usuario?></a>
         </div>


</nav>

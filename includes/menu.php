<nav class="junbotron text-center" style="padding: 10px; background-color: #000000;">
    <div class="row">
        <div class="col-md-8">
            <a class="btn btn-primary" href="/sistemas/aluno/listar.php">Alunos</a>
            <a class="btn btn-primary" href="/sistemas/ocorrencia/listar.php">Ocorrências</a>
            <a class="btn btn-primary" href="/sistemas/vaga/listar.php">Vagas de Estagio</a>
        </div>
        <?php
        $usuario = App\Session\User::getInfo();
        ?>
        <div class="col-md-4">
            <button class="btn btn-info">Bem vindo <?= $usuario['login']; ?></button>
            <a href="/sistemas/logout.php" class="btn btn-danger">Sair</button></a>
           
        </div>
    </div>
</nav>
<br>
<!--
<img class="img-thumbnail" src="<?= $usuario['foto'] ?>" width="300px" height="400px">
-->
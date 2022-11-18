<form action="" method="post">
    <label for="descricao">Notificação</label>
    <div class="form-group">
        <textarea name="notificacao" id="" cols="90" rows="10"></textarea>
    </div>
    <a href="notificar.php?id=<?= $aluno->id ?>"><button type="button" class="btn btn-success">Notificar o Aluno</button></a>
    <a href="notificar.php?id=<?= $aluno->id ?>"><button type="button" class="btn btn-success">Notificar a Turma</button></a>
</form>
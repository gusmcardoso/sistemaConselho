<main>
    <section>
        <a href="listar.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </section>
    <h2 class="mt-3"><?=TITLE?></h2>
    <form action="" method="post">
        <div class="form-group">
            <label for="aluno">Aluno</label>
            <select name="aluno" class="form-control" required>
                <option selected>...</option>
                <?php include ('../includes/select-aluno.php'); ?>
            </select>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" class="form-control" rows="4" required><?=$ocorrencia->descricao?></textarea>
        </div>
        <div class="form-group">
            <label for="setor_registro">Setor de registro</label>
            <select name="setor_registro" class="form-control" required>
                <?php include ('../includes/select-setor.php'); ?>
            </select>
        </div>
        <div class="form-group">
            <label for="setor_destino">Encaminhar para</label>
            <select name="setor_destino" class="form-control" required>
                <?php include ('../includes/select-setor.php'); ?>
            </select>
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
    </form>
</main>
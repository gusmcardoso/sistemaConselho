<main>
    <section>
        <a href="listar.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </section>
    <h2 class="mt-3">Excluir Aluno</h2>
    <form action="" method="post">
        <div class="form-group">
            <p>Deseja realmente excluir o Aluno <strong><?=$aluno->nome?></strong></p>
        </div>
        
        <div class="form-group">
            <a href="listar.php"><button type="button" class="btn btn-success">Cancelar</button></a>
            <button name="excluir" type="submit" class="btn btn-danger">Excluir</button>
        </div>
    </form>
</main>
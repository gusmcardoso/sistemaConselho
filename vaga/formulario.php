<main>
    <section>
        <a href="/sistemas/vaga/listar.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </section>
    <h2 class="mt-3"><?=TITLE?></h2>
    <form action="" method="post">
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" class="form-control" required value="<?=$vaga->titulo?>">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" class="form-control"required ><?=$vaga->descricao?></textarea>
        </div>
        
        <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <input type="number" name="quantidade" class="form-control" required value="<?=$vaga->quantidade?>">
        </div>
        <div class="form-group">
            <label for="remuneracao">Remuneração</label>
            <input type="text" name="remuneracao" class="form-control" required value="<?=$vaga->remuneracao?>">
        </div>
        <div class="form-group">
            <label for="data_abertura">Data de Incrição</label>
            <input type="date" name="data_abertura" class="form-control" required value="<?=$vaga->data_abertura?>">
        </div>
        <div class="form-group">
            <label for="data_fechamento">Data de Encerramento</label>
            <input type="date" name="data_fechamento" class="form-control" required value="<?=$vaga->data_fechamento?>">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
    </form>
</main>
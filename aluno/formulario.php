<main>
    <section>
        <a href="/sistemas/aluno/listar.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </section>
    <h2 class="mt-3"><?=TITLE?></h2>
    <form action="" method="post">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control" required value="<?=$aluno->nome?>">
        </div>
        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" name="cpf" class="form-control" required value="<?=$aluno->cpf?>">
        </div>
        
        <div class="form-group">
            <label for="matricula">Matrícula</label>
            <input type="text" name="matricula" class="form-control" required value="<?=$aluno->matricula?>">
        </div>
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" class="form-control" required value="<?=$aluno->telefone?>">
        </div>
        <div class="form-group">
            <label for="email_institucional">Email Institucional</label>
            <input type="email" name="email_institucional" class="form-control" required value="<?=$aluno->email_institucional?>">
        </div>
        <div class="form-group">
            <label for="email_pessoal">Email Pessoal</label>
            <input type="email" name="email_pessoal" class="form-control" required value="<?=$aluno->email_pessoal?>">
        </div>
        <div class="form-group">
            <label for="curso">Curso</label>
            <input type="text" name="curso" class="form-control" required value="<?=$aluno->curso?>">
        </div>
        <div class="form-group">
            <label for="dtn">Data de Nascimento</label>
            <input type="dtn" name="dtn" class="form-control" required value="<?=$aluno->dtn?>">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
    </form>
</main>
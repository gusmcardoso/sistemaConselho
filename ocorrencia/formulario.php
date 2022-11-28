<main>
    <section>
        <a href="listar.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </section>
    <h2 class="mt-3"><?= TITLE ?></h2>
    <form action="" method="post">
        <div class="form-group">
            <label for="aluno">Aluno</label>
            <select name="aluno" class="form-control" required>

                <?php
                if (isset($_GET['aluno']) or $ocorrencia->id != null) {

                    echo '<option selected value="' . $aluno->id . '">' . $aluno->nome . '</option>';
                } else {
                    echo '<option selected>...</option>';
                    include('../includes/select-aluno.php');
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="tipo_ocorrencia">Tipo de Ocorrencia</label>
            <select name="tipo_ocorrencia" class="form-control" required>

                <?php
                if ($ocorrencia->tipo_ocorrencia != null) {

                    echo '<option selected value="' . $tipo_ocorrencia->id . '">' . $tipo_ocorrencia->tipo_ocorrencia . '</option>';
                    include('../includes/select-tipo-ocorrencia.php');
                } else {
                    echo '<option selected>...</option>';
                    include('../includes/select-tipo-ocorrencia.php');
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" class="form-control" rows="4" required><?= $ocorrencia->descricao ?></textarea>
        </div>
        <div class="form-group">
            <label for="setor_registro">Setor de registro</label>
            <select name="setor_registro" class="form-control" required>
                <?php
                if ($ocorrencia->setor_registro != null) {
                    echo '<option selected value="' . $setor_registro->id . '">' . $setor_registro->nome . '</option>';
                    include('../includes/select-setor.php');
                } else {
                    echo '<option selected>...</option>';
                    include('../includes/select-setor.php');
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="setor_destino">Encaminhar para</label>
            <select name="setor_destino" class="form-control" required>
                <?php
                if ($ocorrencia->setor_destino != null) {
                    echo '<option selected value="' . $setor_destino->id . '">' . $setor_destino->nome . '</option>';
                    include('../includes/select-setor.php');
                } else {
                    echo '<option selected>...</option>';
                    include('../includes/select-setor.php');
                }
                ?>

            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
    </form>
</main>
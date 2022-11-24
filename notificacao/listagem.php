<?php

use App\Entity\Notificacao;

$mensagem = '';
if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'success':
            $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
            break;
        case 'error':
            $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
            break;
    }
}
unset($_GET['pagina']);
$gets = http_build_query($_GET);


$resultados = '';

foreach ($notificacoes as $notificacao) {
    


    $resultados .= '<tr>
            <td>' . $notificacao->id . '</td>
            <td>' . $notificacao->aluno . '</td>
            <td>' . $notificacao->descricao . '</td>
            <td>' . $notificacao->servidor . '</td>
            <td><a href="#"><button type="button" class="btn btn-sm btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/></svg>
            </button></a>  
            <a href="excluir.php?id=' . $notificacao->id . '"><button type="button" class="btn btn-sm btn-danger">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/></svg>
            </button></a></td> 
            
        </tr>';
}
$resultados = strlen($resultados) ? $resultados : '<tr><td colspan="10" class="text-center">Não há notificacaos disponiveis no momento!</td></tr>';

?>
<main>
    <?= $mensagem ?>

    <section>
        <form action="notificar.php" method="POST">

            <!--
                <div class="col">
                    <label>Buscar</label>
                    <input type="text" name="busca" class="form-control" value="<?= $busca ?>">
                </div>
-->
            <div class="col">
                <label for="descricao">Notificação</label>
                <div class="form-group">
                    <textarea name="descricao" id="" cols="120" rows="5" required></textarea>
                </div>
            </div>
            <div class="row my-1">
                <div class="col">
                    <label>Curso</label>
                    <select name="curso" class="form-control">
                        <option value="">Selecione o Curso</option>
                        <option value="Técnico em Administração - Integrada" <?= $curso == 'Técnico em Administração - Integrada' ? 'selected' : '' ?>>Técnico em Administração - Integrada</option>
                        <option value="Técnico em Informática para Internet - Integrada" <?= $curso == 'Técnico em Informática para Internet - Integrada' ? 'selected' : '' ?>>Técnico em Informática para Internet - Integrada</option>
                        <option value="Técnico em Meio Ambiente - Integrada" <?= $curso == 'Técnico em Meio Ambiente - Integrada' ? 'selected' : '' ?>>Técnico em Meio Ambiente - Integrada</option>
                        <option value="Técnico em Informática (subsequente)" <?= $curso == 'Técnico em Informática (subsequente)' ? 'selected' : '' ?>>Técnico em Informática (subsequente)</option>
                        <option value="Técnico em Vendas (subsequente)" <?= $curso == 'Técnico em Vendas (subsequente)' ? 'selected' : '' ?>>Técnico em Vendas (subsequente)</option>
                        <option value="Tecnologia em Logística (superior)" <?= $curso == 'Tecnologia em Logística (superior)' ? 'selected' : '' ?>>Tecnologia em Logística (superior)</option>
                        <option value="Pedagogia (Superior)" <?= $curso == 'Pedagogia (Superior)' ? 'selected' : '' ?>>Pedagogia (Superior)</option>
                        <option value="Licenciatura em Computação (superior)" <?= $curso == 'Licenciatura em Computação (superior)' ? 'selected' : '' ?>>Licenciatura em Computação (superior)</option>
                        <option value="Sistemas de Informação (Superior)" <?= $curso == 'Sistemas de Informação (Superior)' ? 'selected' : '' ?>>Sistemas de Informação (Superior)</option>
                        <option value="FIC/Proeja Assistente Administrativo" <?= $curso == 'FIC/Proeja Assistente Administrativo' ? 'selected' : '' ?>>FIC/Proeja Assistente Administrativo</option>
                    </select>
                </div>
                <div class="col">
                    <label>Periodo</label>
                    <select name="periodo" class="form-control">
                        <option value="">Selecione o Periodo</option>
                        <option value="1" <?= $periodo == '1' ? 'selected' : '' ?>>1º</option>
                        <option value="2" <?= $periodo == '2' ? 'selected' : '' ?>>2º</option>
                        <option value="3" <?= $periodo == '3' ? 'selected' : '' ?>>3º</option>
                        <option value="4" <?= $periodo == '4' ? 'selected' : '' ?>>4º</option>
                        <option value="5" <?= $periodo == '5' ? 'selected' : '' ?>>5º</option>
                        <option value="6" <?= $periodo == '6' ? 'selected' : '' ?>>6º</option>
                        <option value="7" <?= $periodo == '7' ? 'selected' : '' ?>>7º</option>
                        <option value="8" <?= $periodo == '8' ? 'selected' : '' ?>>8º</option>
                    </select>
                </div>


                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-success">Notificar a Turma</button>

                </div>
            </div>
        
            <div class="row my-1">
                <div class="col">
                    <label>Aluno</label>
                    <select name="aluno_id" class="form-control">
                        <option value="">Selecione o Aluno</option>
                        <?php
                        include('../includes/select-aluno.php');
                        ?>
                    </select>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-success">Notificar o Aluno</button>
                </div>
            </div>
        </form>
    </section>
    <section>

        <table class="table bg-light table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Aluno</th>
                    <th>Notificação</th>
                    <th>Servidor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?= $resultados ?>
            </tbody>
        </table>
    </section>
    <section>
        <div class="align-items-center">
            <ul class="pagination">
                <li class="page-item disabled"><a class="page-link" href="#">Total de notificacaos = <?= $paginacao->results ?></a></li>
                <li class="page-item"><a class="page-link" href="listar.php?pagina=1&<?= $gets ?>">Primeira pagina</a></li>
                <?php
                if (($paginacao->currentPage - 1) > 0) { ?>
                    <li class="page-item"><a class="page-link" href="listar.php?pagina=<?= $paginacao->currentPage - 1 ?>&<?= $gets ?>">Anterior</a></li>
                <?php } else { ?>
                    <li class="page-item disabled"><a class="page-link" href="#">Anterior</a></li>
                    <?php
                }
                for ($i = 1; $i < $paginacao->pages; $i++) {
                    if ($i > ($paginacao->currentPage - 3) && $i < ($paginacao->currentPage + 3)) {
                        if ($i == $paginacao->currentPage) {
                    ?>
                            <li class="page-item"><a class="page-link active" href="listar.php?pagina=<?= $i ?>&<?= $gets ?>"><?= $i ?></a></li>
                        <?php
                        } else {
                        ?>
                            <li class="page-item"><a class="page-link" href="listar.php?pagina=<?= $i ?>&<?= $gets ?>"><?= $i ?></a></li>
                <?php
                        }
                    }
                }
                ?>

                <?php if ($paginacao->currentPage < $paginacao->pages) { ?>

                    <li class="page-item"><a class="page-link" href="listar.php?pagina=<?= $paginacao->currentPage - 1 ?>&<?= $gets ?>">Proxima</a></li>

                <?php } else { ?>
                    <li class="page-item disabled"><a class="page-link" href="#">Proxima</a></li>
                <?php
                }
                ?>
                <li class="page-item"><a class="page-link" href="listar.php?pagina=<?= $paginacao->pages ?>&<?= $gets ?>">Ultima pagina</a></li>
            </ul>
        </div>
    </section>
</main>
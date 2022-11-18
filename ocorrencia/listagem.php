<?php

use App\Entity\Aluno;
use App\Entity\Ocorrencia;
use App\Entity\Setor;
use App\Entity\TipoOcorrencia;

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
foreach ($ocorrencias as $ocorrencia) {
    $aluno = new Aluno;
    $tipo_ocorrencia = new TipoOcorrencia;
    $setor_registro = new Setor;
    $setor_destino = new Setor;
    $tipo_ocorrencia = $tipo_ocorrencia->getTipoOcorrencia($ocorrencia->tipo_ocorrencia);
    $aluno = $aluno->getAluno($ocorrencia->aluno);
    $setor_registro = $setor_registro->getSetor($ocorrencia->setor_registro);
    $setor_destino = $setor_destino->getSetor($ocorrencia->setor_destino);
    $resultados .= '<tr>
            <td>' . $ocorrencia->id . '</td>
            <td>' . $aluno->nome . '</td>
            <td>' . $tipo_ocorrencia->tipo_ocorrencia . '</td>
            <td>' . $ocorrencia->descricao . '</td>
            <td>' . $ocorrencia->servidor . '</td>
            <td>' . $setor_registro->nome . '</td>
            <td>' . $setor_destino->nome . '</td>
            <td>' . date('d/m/Y - H:i', strtotime($ocorrencia->data_ocorrencia)) . '</td>
            <td><a href="editar.php?id=' . $ocorrencia->id . '"><button type="button" class="btn btn-sm btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/></svg>
            </button></a></td>  
            <td><a href="excluir.php?id=' . $ocorrencia->id . '"><button type="button" class="btn btn-sm btn-danger">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/></svg>
            
            </button></a></td>
        </tr>';
}
$resultados = strlen($resultados) ? $resultados : '<tr><td colspan="8" class="text-center">Não há ocorrencias até esse momento!</td></tr>';
?>
<main>
    <?= $mensagem ?>
    <section>
        <form action="" method="get">
            <div class="row my-1">
            
                <div class="col-md-2 d-flex align-items-end">
                    <a href="cadastrar.php"><button class="btn btn-success">Nova Ocorrência</button></a>
                </div>
                <div class="col">
                    <label>Buscar ocorrência</label>
                    <input type="text" name="busca" class="form-control" value="<?= $busca ?>">
                </div>
                <div class="col">
                    <label>Tipo de Ocorrência</label>
                    <select name="tipo_ocorrencia" class="form-control">
                        <option value="">Selecione o tipo de ocorrência</option>
                        <?php
                        include('../includes/select-tipo-ocorrencia.php');
                        ?>
                    </select>
                </div>
                <div class="col-md-1 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg></button>
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
                    <th>Tipo da Ocorrência</th>
                    <th>Descrição</th>
                    <th>Servidor</th>
                    <th>Setor de Registro</th>
                    <th>Setor de Destino</th>
                    <th>Data da Ocorrencia</th>
                    <th>Editar</th>
                    <th>Excluir</th>
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
                <li class="page-item disabled"><a class="page-link" href="#">Total de Alunos = <?= $paginacao->results ?></a></li>
                <li class="page-item"><a class="page-link" href="listar.php?pagina=1&<?= $gets ?>">Primeira pagina</a></li>
                <?php
/*
                echo "<pre>";
                print_r($ocorrencias);
                echo "</pre>";
*/

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
<?php

use App\Entity\Aluno;

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

foreach ($alunos as $aluno) {
    

    
    $resultados .= '<tr>
            <td>' . $aluno->nome . '</td>
            <td>' . $aluno->telefone . '</td>
            <td>' . $aluno->telefone_responsavel . '</td>
            <td>' . $aluno->email_institucional . '</td>
            <td>' . $aluno->curso . '</td>
            <td>' . $aluno->periodo . '</td>
            <td><a href="vizualizar.php?id='.$aluno->id.'&'.$gets.'"><button class="btn btn-sm btn-info"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
        </svg></button></a>
            </td>
            
        </tr>';
   
}
$resultados = strlen($resultados) ? $resultados : '<tr><td colspan="10" class="text-center">Não há alunos disponiveis no momento!</td></tr>';

?>
<main>
    <?= $mensagem ?>
    
    <section>
        <form action="" method="get">
            <div class="row my-1">
                <div class="col">
                    <label>Buscar</label>
                    <input type="text" name="busca" class="form-control" value="<?= $busca ?>">
                </div>
                <div class="col">
                    <label>Curso</label>
                    <select name="curso" class="form-control">
                        <option value="">Selecione o Curso</option>
                        <option value="Técnico em Administração - Integrada" <?= $curso=='Técnico em Administração - Integrada' ? 'selected' : '' ?>>Técnico em Administração - Integrada</option>
                        <option value="Técnico em Informática para Internet - Integrada" <?= $curso=='Técnico em Informática para Internet - Integrada' ? 'selected' : '' ?>>Técnico em Informática para Internet - Integrada</option>
                        <option value="Técnico em Meio Ambiente - Integrada" <?= $curso=='Técnico em Meio Ambiente - Integrada' ? 'selected' : '' ?>>Técnico em Meio Ambiente - Integrada</option>
                        <option value="Técnico em Informática (subsequente)" <?= $curso=='Técnico em Informática (subsequente)' ? 'selected' : '' ?>>Técnico em Informática (subsequente)</option>
                        <option value="Técnico em Vendas (subsequente)" <?= $curso=='Técnico em Vendas (subsequente)' ? 'selected' : '' ?>>Técnico em Vendas (subsequente)</option>
                        <option value="Tecnologia em Logística (superior)" <?= $curso=='Tecnologia em Logística (superior)' ? 'selected' : '' ?>>Tecnologia em Logística (superior)</option>
                        <option value="Pedagogia (Superior)" <?= $curso=='Pedagogia (Superior)' ? 'selected' : '' ?>>Pedagogia (Superior)</option>
                        <option value="Licenciatura em Computação (superior)" <?= $curso=='Licenciatura em Computação (superior)' ? 'selected' : '' ?>>Licenciatura em Computação (superior)</option>
                        <option value="Sistemas de Informação (Superior)" <?= $curso=='Sistemas de Informação (Superior)' ? 'selected' : '' ?>>Sistemas de Informação (Superior)</option>
                        <option value="FIC/Proeja Assistente Administrativo" <?= $curso=='FIC/Proeja Assistente Administrativo' ? 'selected' : '' ?>>FIC/Proeja Assistente Administrativo</option>
                    </select>
                </div>
                <div class="col">
                    <label>Periodo</label>
                    <select name="periodo" class="form-control">
                        <option value="">Selecione o Periodo</option>
                        <option value="1" <?= $periodo=='1' ? 'selected' : '' ?>>1º</option>
                        <option value="2" <?= $periodo=='2' ? 'selected' : '' ?>>2º</option>
                        <option value="3" <?= $periodo=='3' ? 'selected' : '' ?>>3º</option>
                        <option value="4" <?= $periodo=='4' ? 'selected' : '' ?>>4º</option>
                        <option value="5" <?= $periodo=='5' ? 'selected' : '' ?>>5º</option>
                        <option value="6" <?= $periodo=='6' ? 'selected' : '' ?>>6º</option>
                        <option value="7" <?= $periodo=='7' ? 'selected' : '' ?>>7º</option>
                        <option value="8" <?= $periodo=='8' ? 'selected' : '' ?>>8º</option>
                    </select>
                </div>
                <div class="col-md-1 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg></button>
                        
                </div>
                <div class="col-md-2 d-flex align-items-end">
                        <a href="formulario.php.php?id=<?= $gets ?>"><button type="button" class="btn btn-success">Notificar a Turma</button></a>
                </div>
            </div>
        </form>
    </section>
    <section>
       
        <table class="table bg-light table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Telefone do Responsavel</th>
                    <th>Email Institucional</th>
                    <th>Curso</th>
                    <th>Periodo</th>
                    <th>Notificar</th>
                    
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
                <li class="page-item"><a class="page-link" href="listar.php?pagina=1&<?=$gets?>">Primeira pagina</a></li>
                <?php 
                
                
                
                if (($paginacao->currentPage - 1) > 0) { ?>

                    <li class="page-item"><a class="page-link" href="listar.php?pagina=<?= $paginacao->currentPage - 1 ?>&<?=$gets?>">Anterior</a></li>

                <?php } else { ?>
                    <li class="page-item disabled"><a class="page-link" href="#">Anterior</a></li>
                    <?php
                }
                for ($i = 1; $i < $paginacao->pages; $i++) {
                    if ($i > ($paginacao->currentPage - 3) && $i < ($paginacao->currentPage + 3)) {
                        if ($i == $paginacao->currentPage) {
                    ?>
                            <li class="page-item"><a class="page-link active" href="listar.php?pagina=<?=$i?>&<?=$gets?>"><?= $i ?></a></li>
                        <?php
                        } else {
                        ?>
                            <li class="page-item"><a class="page-link" href="listar.php?pagina=<?=$i?>&<?=$gets?>"><?= $i ?></a></li>
                <?php
                        }
                    }
                }
                ?>

                <?php if ($paginacao->currentPage < $paginacao->pages) { ?>

                    <li class="page-item"><a class="page-link" href="listar.php?pagina=<?= $paginacao->currentPage - 1 ?>&<?=$gets?>">Proxima</a></li>

                <?php } else { ?>
                    <li class="page-item disabled"><a class="page-link" href="#">Proxima</a></li>
                <?php
                }
                ?>
                <li class="page-item"><a class="page-link" href="listar.php?pagina=<?= $paginacao->pages ?>&<?=$gets?>">Ultima pagina</a></li>
            </ul>
        </div>
    </section>
</main>
<?php

use App\Entity\Aluno;
use App\Entity\Ocorrencia;

require(__DIR__ . '/../vendor/autoload.php');

$aluno = Aluno::getAluno($_GET['id']);
$ocorrencias = Ocorrencia::getOcorrencias('aluno = ' . $_GET['id']);


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
$oc = '';
foreach ($ocorrencias as $ocorrencia) {
    
    $oc .= '<tr><td>'.$ocorrencia->descricao.'</td></tr>';
}
$resultados = '';
$resultados .=
    '<tr>
            <th class="table-dark">Nome</th><th class="table-secondary">' . $aluno->nome . '</th>
            <tr><th class="table-dark">CPF</th><th class="table-secondary">' . $aluno->cpf . '</th></tr>
            <tr><th class="table-dark">Matricula</th><th class="table-secondary">' . $aluno->matricula . '</th></tr>
            <tr><th class="table-dark">Telefone</th><th class="table-secondary">' . $aluno->telefone . '</th></tr>
            <tr><th class="table-dark">Telefone do Responsavel</th><th class="table-secondary">' . $aluno->telefone_responsavel . '</th></tr>
            <tr><th class="table-dark">Email Institucional</th><th class="table-secondary">' . $aluno->email_institucional . '</th></tr>
            <tr><th class="table-dark">Email Pessoal</th><th class="table-secondary">' . $aluno->email_pessoal . '</th></tr>
            <tr><th class="table-dark">Curso</th><th class="table-secondary">' . $aluno->curso . '</th>
            <tr><th class="table-dark">Periodo</th><th class="table-secondary">' . $aluno->periodo . '</th>
            <tr><th class="table-dark">Data de Nascimento</th><th class="table-secondary">' . date('d/m/Y', strtotime($aluno->dtn)) . '</th>
            ';
$resultados = strlen($resultados) ? $resultados : '<tr><td colspan="10" class="text-center">Não há alunos disponiveis no momento!</td></tr>';

include(__DIR__ . '/../includes/header.php');

include(__DIR__ . '/../includes/menu.php');

?>

<main>
    <?= $mensagem ?>
    <section>
        <a href="listar.php"><button class="btn btn-success">Voltar</button></a>
        <a href="editar.php?id=<?= $aluno->id ?>"><button type="button" class="btn btn-primary">Editar</button></a>
        <a href="../ocorrencia/cadastrar.php?aluno=<?= $aluno->id ?>"><button class="btn btn-success">Fazer ocorrência</button></a>
    </section>
    <section>
        <div class="row">
            <div class="col-md-3">
                <img class="img-thumbnail" src="../images/alunos/<?= $aluno->cpf ?>.jpg" width="300px" height="400px">
            </div>
            <div class="col-md-9">
                <table class="table bg-light table-hover">
                    <tbody>
                        <?= $resultados ?>
                    </tbody>
                </table>
                <table class="table bg-light table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Ocorrencias</th>
                        </tr>
                    </thead>
                    <tbody class="table-secondary">
                        <?= $oc ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>
<?php


include(__DIR__ . '/../includes/footer.php');

?>
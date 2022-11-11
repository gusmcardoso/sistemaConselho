<?php

use App\Entity\Aluno;
use App\Entity\Ocorrencia;

require(__DIR__ . '/../vendor/autoload.php');

$aluno = Aluno::getAluno($_GET['id']);
$ocorrencias = Ocorrencia::getOcorrencias('aluno = ' . $_GET['id']);
$alunos = Aluno::getAlunos('curso="' . $_GET['curso'] . '" and periodo = "' . $_GET['periodo'] . '"');
//$qtdAlunos = Aluno::getQuantidadeAlunos('curso='.$_GET['curso']);
$k = 0;
$ids_alunos = [];
foreach ($alunos as $a) {

    $ids_alunos[$k] = $a->id;
    $k++;
}
$anterior = 0;
$proximo = 0;
/*
echo $_GET['curso']."<pre>";
    print_r($ids_alunos);
    echo "</pre>";
*/
for ($j = 0; $j < count($ids_alunos); $j++) {
    //    echo "aki = ".$ids_alunos[$j];
    if ($_GET['id'] == $ids_alunos[$j]) {

        $anterior = $ids_alunos[$j - 1];
        $proximo = $ids_alunos[$j + 1];
    }
}
if ($anterior == $ids_alunos[-1]) {
    $anterior = $ids_alunos[count($ids_alunos) - 1];
}
if ($proximo == $ids_alunos[count($ids_alunos)]) {
    $proximo = $ids_alunos[0];
}


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
unset($_GET['id']);
$gets = http_build_query($_GET);
$oc = '';
foreach ($ocorrencias as $ocorrencia) {

    $oc .= '<tr>
    <td>'.date('d/m/Y - H:i', strtotime($ocorrencia->data_ocorrencia)).'</td>
    <td>' . $ocorrencia->descricao . '</td>
    <td>' . $ocorrencia->servidor . '</td>
    </tr>';
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
            <tr><th class="table-dark">Curso</th><th class="table-secondary">' . $aluno->curso . '</th></tr>
            <tr><th class="table-dark">Periodo</th><th class="table-secondary">' . $aluno->periodo . '</th></tr>
            
            ';
$resultados = strlen($resultados) ? $resultados : '<tr><td colspan="10" class="text-center">Não há alunos disponiveis no momento!</td></tr>';

include(__DIR__ . '/../includes/header.php');

include(__DIR__ . '/../includes/menu.php');


?>


<main>
    <?= $mensagem ?>
    <div class="col my-4">
        <a href="listar.php"><button class="btn btn-success">Voltar</button></a>
        <a href="editar.php?id=<?= $aluno->id ?>"><button type="button" class="btn btn-primary">Editar</button></a>
        <a href="../ocorrencia/cadastrar.php?aluno=<?= $aluno->id ?>&<?= $gets ?>"><button class="btn btn-primary">Fazer ocorrência</button></a>
        <a href="vizualizar.php?id=<?= $anterior ?>&<?= $gets ?>"><button class="btn btn-primary">Anterior</button></a>
        <a href="vizualizar.php?id=<?= $proximo ?>&<?= $gets ?>"><button class="btn btn-primary">Proximo</button></a>
    </div>
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
                
            </div>
            <table class="table bg-light table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Data da Ocorrencia</th>
                            <th>Descrição da ocorrencias</th>
                            <th>Servidor que registrou</th>
                        </tr>
                    </thead>
                    <tbody class="table-secondary">
                        <?= $oc ?>
                    </tbody>
                </table>
        </div>
    </section>
</main>
<?php


include(__DIR__ . '/../includes/footer.php');

?>
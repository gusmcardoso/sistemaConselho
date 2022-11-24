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

foreach ($notificacoes as $notificacao) {

$aluno = Aluno::getAluno($notificacao->aluno);

    $resultados .= '<tr>
            <td>' . $notificacao->id . '</td>
            <td>' . $aluno->nome . '</td>
            <td>' . $notificacao->descricao . '</td>
            <td>' . $notificacao->servidor . '</td>
            <td>' . date('d/m/Y - H:i', strtotime($notificacao->data)) . '</td>
            
            
        </tr>';
}
$resultados = strlen($resultados) ? $resultados : '<tr><td colspan="10" class="text-center">Você não tem nenhuma notificação!</td></tr>';

?>
<main>
    <?= $mensagem ?>

    <section class="my-4">

        <table class="table bg-light table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Aluno</th>
                    <th>Notificação</th>
                    <th>Servidor</th>
                    <th>Data e Hora</th>
            
                </tr>
            </thead>
            <tbody>
                <?= $resultados ?>
            </tbody>
        </table>
    </section>
    
</main>
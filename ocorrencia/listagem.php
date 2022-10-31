<?php

use App\Entity\Aluno;
use App\Entity\Ocorrencia;
use App\Entity\Setor;

$mensagem = '';
if(isset($_GET['status'])){
    switch ($_GET['status']){
        case 'success':
            $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
        break;
        case 'error':
            $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
        break;    
    }

}
if (!empty($_GET['search'])) {
    $pesquisa = $_GET['search'];
    $ocorrencias = Ocorrencia::getOcorrencias('id LIKE "%'.$pesquisa.'%" OR servidor LIKE "%'.$pesquisa.'%" OR descricao LIKE "%'.$pesquisa.'%"');
    
} else {
    
    $ocorrencias = Ocorrencia::getOcorrencias();
}
$resultados = '';
    foreach($ocorrencias as $ocorrencia){
        $aluno = new Aluno;
        $setor_registro = new Setor;
        $setor_destino = new Setor;
        $aluno = $aluno->getAluno($ocorrencia->aluno);
        $setor_registro = $setor_registro->getSetor($ocorrencia->setor_registro);
        $setor_destino = $setor_destino->getSetor($ocorrencia->setor_destino);
        $resultados .= '<tr>
            <td>'.$ocorrencia->id.'</td>
            <td>'.$aluno->nome.'</td>
            <td>'.$ocorrencia->descricao.'</td>
            <td>'.$ocorrencia->servidor.'</td>
            <td>'.$setor_registro->nome.'</td>
            <td>'.$setor_destino->nome.'</td>
            <td>'.date('d/m/Y - H:i', strtotime($ocorrencia->data_ocorrencia)).'</td>
            <td><a href="editar.php?id=' . $aluno->id . '"><button type="button" class="btn btn-sm btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/></svg>
            </button></a>  
            <a href="excluir.php?id=' . $aluno->id . '"><button type="button" class="btn btn-sm btn-danger">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/></svg>
            
            </button></a></td>
        </tr>';    
    }
    $resultados = strlen($resultados) ? $resultados : '<tr><td colspan="8" class="text-center">Não há ocorrencias até esse momento!</td></tr>';
?>
<main>
    <?=$mensagem?>
    <section>
        <table id="tabela" class="table bg-light">
            <tr>
                <td><a href="cadastrar.php"><button class="btn btn-success">Nova Ocorrência</button></a></td>
                <td><input type="search" class="form-control" placeholder="Pesquisar" id="pesquisar"></td>
                <td><button onclick="searchData()" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg></button>
                </td>
            </tr>
        </table>
        <table class="table bg-light table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Aluno</th>
                    <th>Descrição</th>
                    <th>Servidor</th>
                    <th>Setor de Registro</th>
                    <th>Setor de Destino</th>
                    <th>Data da Ocorrencia</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?=$resultados?>
            </tbody>
        </table>
    </section>
</main>
<script>
            var search = document.getElementById('pesquisar');
            
            search.addEventListener("keydown", function(event) {
                if (event.key === "Enter") {
                    searchData();
                    
                }
            });


            function searchData() {
                console.log('seach = '+search.value);
                window.location = 'listar.php?search='+ search.value;
            }
            
        </script>
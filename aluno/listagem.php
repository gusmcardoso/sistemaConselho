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
if(!empty($_GET['search']) and !empty($_GET['pCurso']) and !empty($_GET['pPeriodo'])){
    $pCurso = $_GET['pCurso'];
    $pesquisa = $_GET['search'];
    $pPeriodo = $_GET['pPeriodo'];
    $alunos = Aluno::getAlunos('curso LIKE "%' . $pCurso . '%" AND periodo LIKE "%' . $pPeriodo . '%" AND (nome LIKE "%' . $pesquisa . '%" OR cpf LIKE "%' . $pesquisa . '%" OR matricula LIKE "%' . $pesquisa . '%")');

}elseif(!empty($_GET['search']) and !empty($_GET['pCurso'])){
    
    $pCurso = $_GET['pCurso'];
    $pesquisa = $_GET['search'];
    $alunos = Aluno::getAlunos('curso LIKE "%' . $pCurso . '%" AND (nome LIKE "%' . $pesquisa . '%" OR cpf LIKE "%' . $pesquisa . '%" OR matricula LIKE "%' . $pesquisa . '%")');

}elseif(!empty($_GET['pCurso']) and !empty($_GET['pPeriodo'])){
    
        $pCurso = $_GET['pCurso'];
        $pPeriodo = $_GET['pPeriodo'];
        $alunos = Aluno::getAlunos('curso LIKE "%' . $pCurso . '%" AND periodo LIKE "%' . $pPeriodo . '%"');

    }elseif (!empty($_GET['pCurso']) or !empty($_GET['search'])) {
    if(!empty($_GET['pCurso'])){
        $pCurso = $_GET['pCurso']; 
        $pesquisa = $_GET['pCurso'];   
    }else{
        $pCurso = $_GET['search'];  
        $pesquisa = $_GET['search'];  
    }
    
    $alunos = Aluno::getAlunos('nome LIKE "%' . $pesquisa . '%" OR cpf LIKE "%' . $pesquisa . '%" OR matricula LIKE "%' . $pesquisa . '%" OR curso LIKE "%' . $pCurso . '%"');
}else{
   
    $alunos = Aluno::getAlunos();
}

$resultados = '';
foreach ($alunos as $aluno) {
    $resultados .= '<tr>
            <td>' . $aluno->nome . '</td>
            <td>' . $aluno->telefone . '</td>
            <td>' . $aluno->telefone_responsavel . '</td>
            <td>' . $aluno->email_institucional . '</td>
            <td>' . $aluno->curso . '</td>
            <td>' . $aluno->periodo . '</td>
            <td><a href="vizualizar.php?id=' . $aluno->id . '"><button class="btn btn-sm btn-info"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
        </svg></button></a>
                <a href="editar.php?id=' . $aluno->id . '"><button type="button" class="btn btn-sm btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/></svg>
                </button></a>  
            </td>
        </tr>';
}
$resultados = strlen($resultados) ? $resultados : '<tr><td colspan="10" class="text-center">Não há alunos disponiveis no momento!</td></tr>';
?>
<main>
    <?= $mensagem ?>
    <section>
        <table id="tabela" class="table bg-light">
            <tr>
                <td></td>
                <td><select class="form-control" name="pCurso" id="pCurso">
                <option value="">Selecione o Curso</option>
                    <option value="Administração">Técnico em Administração - Integrada - Série Anual</option>
                    <option value="Meio Ambiente">Técnico em Meio Ambiente - Integrada - Série Anual</option>
                    <option value="Informática para Internet">Técnico em Informática para Internet - Integrada - Série Anual</option>
                </select></td>
                <td><select class="form-control" name="pPeriodo" id="pPeriodo">
                <option value="">Selecione o Periodo</option>
                    <option value="1">1º</option>
                    <option value="2">2º</option>
                    <option value="3">3º</option>
                </select></td>
            </tr>
            <tr>
                <td><a href="/sistemas/aluno/cadastrar.php"><button class="btn btn-success">Nova Aluno</button></a></td>
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
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Telefone do Responsavel</th>
                    <th>Email Institucional</th>
                    <th>Curso</th>
                    <th>Periodo</th>
                    <th><--Ações--></th>
                </tr>
            </thead>
            <tbody>
                <?= $resultados ?>
            </tbody>
        </table>
    </section>
</main>
<script>
            var search = document.getElementById('pesquisar');
            var pCurso = document.getElementById('pCurso');
            var pPeriodo = document.getElementById('pPeriodo');
            
            search.addEventListener("keydown", function(event) {
                if (event.key === "Enter") {
                    searchData();
                    
                }
            });


            function searchData() {
                window.location = 'listar.php?search='+ search.value +'&pCurso='+ pCurso.value +'&pPeriodo='+ pPeriodo.value;
            }
            
        </script>
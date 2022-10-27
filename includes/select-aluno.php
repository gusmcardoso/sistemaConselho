<?php

use App\Entity\Aluno;
//require ('../vendor/autoload.php');

$alunos = Aluno::getAlunos();

$resultados = '';
foreach ($alunos as $aluno) {
    $resultados .= '<option value="' . $aluno->id . '">' . $aluno->nome . '</option>';
}
?>
<?= $resultados ?>

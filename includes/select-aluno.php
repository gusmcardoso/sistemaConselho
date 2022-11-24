<?php

use App\Entity\Aluno;
//require ('../vendor/autoload.php');
$alunos = Aluno::getAlunos();

$r = '';
foreach ($alunos as $aluno) {
    $r .= '<option value="' . $aluno->id . '">' . $aluno->nome . '</option>';
}
?>
<?= $r ?>

<?php

use App\Entity\Setor;
//require ('../vendor/autoload.php');

$setores = Setor::getSetores();

$resultados = '';
foreach ($setores as $setor) {
    $resultados .= '<option value="' . $setor->id . '">' . $setor->nome . '</option>';
}
?>
<?= $resultados ?>
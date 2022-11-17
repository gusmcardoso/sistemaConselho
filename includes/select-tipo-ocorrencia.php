<?php

use App\Entity\TipoOcorrencia;

$tipo_ocorrencias = TipoOcorrencia::getTipoOcorrencias();

$results = '';
foreach ($tipo_ocorrencias as $tipo_ocorrencia) {
    $results .= '<option value="' . $tipo_ocorrencia->id . '">' . $tipo_ocorrencia->tipo_ocorrencia . '</option>';
}
?>
<?= $results ?>
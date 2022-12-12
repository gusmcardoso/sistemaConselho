<?php

use App\Entity\Vaga;

require __DIR__ . '/../vendor/autoload.php';
use \App\Session\Login;

Login::requireLogin();

include __DIR__ . '/../includes/header.php';

include __DIR__ . '/../includes/menu.php';

include __DIR__ . '/listagem.php';

include __DIR__ . '/../includes/paginacao.php';

include __DIR__ . '/../includes/footer.php';

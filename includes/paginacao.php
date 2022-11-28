<section>
    <div class="align-items-center">
        <ul class="pagination">
            <li class="page-item disabled"><a class="page-link" href="#">Total = <?= $paginacao->results ?></a></li>
            <li class="page-item"><a class="page-link" href="listar.php?pagina=1&<?= $gets ?>">Primeira pagina</a></li>
            <?php
            if (($paginacao->currentPage - 1) > 0) { ?>
                <li class="page-item"><a class="page-link" href="listar.php?pagina=<?= $paginacao->currentPage - 1 ?>&<?= $gets ?>">Anterior</a></li>
            <?php } else { ?>
                <li class="page-item disabled"><a class="page-link" href="#">Anterior</a></li>
                <?php
            }
            for ($i = 1; $i <= $paginacao->pages; $i++) {
                if ($i > ($paginacao->currentPage - 3) && $i < ($paginacao->currentPage + 3)) {
                    if ($i == $paginacao->currentPage) {
                ?>
                        <li class="page-item"><a class="page-link active" href="listar.php?pagina=<?= $i ?>&<?= $gets ?>"><?= $i ?></a></li>
                    <?php
                    } else {
                    ?>
                        <li class="page-item"><a class="page-link" href="listar.php?pagina=<?= $i ?>&<?= $gets ?>"><?= $i ?></a></li>
            <?php
                    }
                }
            }
            ?>

            <?php if ($paginacao->currentPage < $paginacao->pages) { ?>

                <li class="page-item"><a class="page-link" href="listar.php?pagina=<?= $paginacao->currentPage + 1 ?>&<?= $gets ?>">Proxima</a></li>

            <?php } else { ?>
                <li class="page-item disabled"><a class="page-link" href="#">Proxima</a></li>
            <?php
            }
            ?>
            <li class="page-item"><a class="page-link" href="listar.php?pagina=<?= $paginacao->pages ?>&<?= $gets ?>">Ultima pagina</a></li>
        </ul>
    </div>
</section>
<?php $pager->setSurroundCount(2) ?>

<nav aria-label="Page navigation">
    <ul class="pagination">
        <!-- Cek apakah ada halaman sebelumnya -->
        <?php if ($pager->hasPreviousPage()) : ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getFirst() ?>">First</a>
            </li>
            <li class="page-item">
                <!-- Gunakan getPreviousPage() agar cuma mundur 1 halaman -->
                <a class="page-link" href="<?= $pager->getPreviousPage() ?>">Previous</a>
            </li>
        <?php endif ?>

        <!-- Angka Halaman (1, 2, 3, dst) -->
        <?php foreach ($pager->links() as $link) : ?>
            <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
                <a class="page-link" href="<?= $link['uri'] ?>"><?= $link['title'] ?></a>
            </li>
        <?php endforeach ?>

        <!-- Cek apakah ada halaman berikutnya -->
        <?php if ($pager->hasNextPage()) : ?>
            <li class="page-item">
                <!-- Gunakan getNextPage() agar cuma maju 1 halaman -->
                <a class="page-link" href="<?= $pager->getNextPage() ?>">Next</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getLast() ?>">Last</a>
            </li>
        <?php endif ?>
    </ul>
</nav>
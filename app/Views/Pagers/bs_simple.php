<?php

/**
 * bs_simple - Bootstrap 4.5.2 Pager Template.
 * @var \CodeIgniter\Pager\PagerRenderer $pager
 */

$pager->setSurroundCount(0);
?>
<nav aria-label="Page Results">
    <ul class="pager pagination justify-content-center">
        <li <?= $pager->hasPrevious() ? 'class="page-item active"' : 'class="page-item disabled"' ?>>
            <a class="page-link" href="<?= $pager->getPrevious() ?? '#' ?>" aria-label="<?= lang('Pager.previous') ?>">
                <span aria-hidden="true"><?= lang('Pager.newer') ?></span>
            </a>
        </li>
        <li <?= $pager->hasNext() ? 'class="page-item active"' : 'class="page-item disabled"' ?>>
            <a class="page-link" href="<?= $pager->getnext() ?? '#' ?>" aria-label="<?= lang('Pager.next') ?>">
                <span aria-hidden="true"><?= lang('Pager.older') ?></span>
            </a>
        </li>
    </ul>
</nav>
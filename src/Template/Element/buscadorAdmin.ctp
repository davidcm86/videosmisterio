<h3><?= __('Buscador') ?></h3>
<?= $this->Form->create('buscador-admin') ?>
<?php
    echo $this->Form->input('titulo');
?>
<?= $this->Form->button(__('Buscar')) ?>
<?= $this->Form->end() ?>

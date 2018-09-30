<?php echo $this->element('tiny'); ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $video->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $video->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Videos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="videos form large-9 medium-8 columns content">
    <?= $this->Form->create($video) ?>
    <fieldset>
        <legend><?= __('Edit Video') ?></legend>
        <?php
            echo $this->Form->input('publicado', ['type' => 'checkbox', 'default' => '1']);
            echo $this->Form->input('titulo');
            echo $this->Form->input('slug_titulo');
            echo $this->Form->input('description');
            echo $this->Form->input('enlace');
            echo $this->Form->input('descripcion');
            echo $this->Form->input('categoria_id', ['options' => $categorias]);
            echo $this->Form->input('keyword_seo');
            echo $this->Form->input('keywords');
            echo $this->Form->input('libro_afiliado_1');
            echo $this->Form->input('libro_afiliado_2');
            echo $this->Form->input('created');
            echo $this->Form->input('user_id', ['options' => $usuarios]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

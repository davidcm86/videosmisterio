<?= $this->Html->script('jquery.min') ?> 
<?= $this->Html->script('TinyMCE./js/tiny_mce4/tinymce.min') ?> 
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
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
        <legend><?= __('Add Video') ?></legend>
        <?php
            echo $this->Form->input('titulo');
            echo $this->Form->input('slug_titulo');
            echo $this->Form->input('enlace');
            echo $this->TinyMCE->editor(['selector' => 'textarea']);
            echo $this->Form->input('descripcion');
            echo $this->Form->input('publicado');
            echo $this->Form->input('verde');
            echo $this->Form->input('naranja');
            echo $this->Form->input('rojo');
            echo $this->Form->input('total_votos');
            echo $this->Form->input('user_id', ['options' => $usuarios]);
            echo $this->Form->input('categoria_id', ['options' => $categorias]);
            echo $this->Form->input('keywords');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

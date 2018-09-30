<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Encuestas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="encuestas form large-9 medium-8 columns content">
    <?= $this->Form->create($encuesta) ?>
    <fieldset>
        <legend><?= __('Add Encuesta') ?></legend>
        <?php
            echo $this->Form->input('nombre');
            echo $this->Form->input('pregunta_principal');
            echo $this->Form->input('pregunta_radio_0');
            echo $this->Form->input('pregunta_radio_1');
            echo $this->Form->input('pregunta_radio_2');
            echo $this->Form->input('pregunta_radio_3');
            echo $this->Form->input('resultado_radio_0');
            echo $this->Form->input('resultado_radio_1');
            echo $this->Form->input('resultado_radio_2');
            echo $this->Form->input('resultado_radio_3');
            echo $this->Form->input('activo');
            echo $this->Form->input('categoria_id', ['options' => $categorias]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

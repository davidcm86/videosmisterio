<?= $this->Html->script('jquery.min') ?> 
<?= $this->Html->script('TinyMCE./js/tiny_mce4/tinymce.min') ?> 
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Blog'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="blog form large-9 medium-8 columns content">
    <?= $this->Form->create($blog, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Blog') ?></legend>
        <?php
            echo $this->Form->input('nombre');
            echo $this->Form->input('slug');
            echo $this->Form->input('categoria_id', ['options' => $categorias]);
            echo $this->Form->input('descripcion');
            echo $this->TinyMCE->editor(['selector' => 'textarea']);
            echo $this->Form->input('cuerpo');
            echo $this->Form->input('imagen', ['type' => 'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

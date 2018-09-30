<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Categoria'), ['action' => 'edit', $categoria->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Categoria'), ['action' => 'delete', $categoria->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categoria->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categorias'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categoria'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Videos'), ['controller' => 'Videos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Video'), ['controller' => 'Videos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categorias view large-9 medium-8 columns content">
    <h3><?= h($categoria->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= h($categoria->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Nombre') ?></th>
            <td><?= h($categoria->nombre) ?></td>
        </tr>
        <tr>
            <th><?= __('Alias') ?></th>
            <td><?= h($categoria->alias) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($categoria->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($categoria->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Videos') ?></h4>
        <?php if (!empty($categoria->videos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Titulo') ?></th>
                <th><?= __('Categoria Id') ?></th>
                <th><?= __('Slug Titulo') ?></th>
                <th><?= __('Enlace') ?></th>
                <th><?= __('Descripcion') ?></th>
                <th><?= __('Publicado') ?></th>
                <th><?= __('Verde') ?></th>
                <th><?= __('Naranja') ?></th>
                <th><?= __('Rojo') ?></th>
                <th><?= __('Total Votos') ?></th>
                <th><?= __('Usuario Id') ?></th>
                <th><?= __('Categoria Hija') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Keywords') ?></th>
                <th><?= __('Top') ?></th>
                <th><?= __('Afiliado Enlace 1') ?></th>
                <th><?= __('Afiliado Enlace 2') ?></th>
                <th><?= __('Afiliado Imagen 1') ?></th>
                <th><?= __('Afiliado Imagen 2') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($categoria->videos as $videos): ?>
            <tr>
                <td><?= h($videos->id) ?></td>
                <td><?= h($videos->titulo) ?></td>
                <td><?= h($videos->categoria_id) ?></td>
                <td><?= h($videos->slug_titulo) ?></td>
                <td><?= h($videos->enlace) ?></td>
                <td><?= h($videos->descripcion) ?></td>
                <td><?= h($videos->publicado) ?></td>
                <td><?= h($videos->verde) ?></td>
                <td><?= h($videos->naranja) ?></td>
                <td><?= h($videos->rojo) ?></td>
                <td><?= h($videos->total_votos) ?></td>
                <td><?= h($videos->user_id) ?></td>
                <td><?= h($videos->categoria_hija) ?></td>
                <td><?= h($videos->created) ?></td>
                <td><?= h($videos->modified) ?></td>
                <td><?= h($videos->keywords) ?></td>
                <td><?= h($videos->top) ?></td>
                <td><?= h($videos->afiliado_enlace_1) ?></td>
                <td><?= h($videos->afiliado_enlace_2) ?></td>
                <td><?= h($videos->afiliado_imagen_1) ?></td>
                <td><?= h($videos->afiliado_imagen_2) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Videos', 'action' => 'view', $videos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Videos', 'action' => 'edit', $videos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Videos', 'action' => 'delete', $videos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $videos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

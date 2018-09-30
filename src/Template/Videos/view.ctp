<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Video'), ['action' => 'edit', $video->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Video'), ['action' => 'delete', $video->id], ['confirm' => __('Are you sure you want to delete # {0}?', $video->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Videos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Video'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="videos view large-9 medium-8 columns content">
    <h3><?= h($video->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= h($video->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Titulo') ?></th>
            <td><?= h($video->titulo) ?></td>
        </tr>
        <tr>
            <th><?= __('Slug Titulo') ?></th>
            <td><?= h($video->slug_titulo) ?></td>
        </tr>
        <tr>
            <th><?= __('Enlace') ?></th>
            <td><?= h($video->enlace) ?></td>
        </tr>
        <tr>
            <th><?= __('Usuario') ?></th>
            <td><?= $video->has('user') ? $this->Html->link($video->user->id, ['controller' => 'Users', 'action' => 'view', $video->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Categoria') ?></th>
            <td><?= $video->has('categoria') ? $this->Html->link($video->categoria->id, ['controller' => 'Categorias', 'action' => 'view', $video->categoria->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Keywords') ?></th>
            <td><?= h($video->keywords) ?></td>
        </tr>
        <tr>
            <th><?= __('Publicado') ?></th>
            <td><?= $this->Number->format($video->publicado) ?></td>
        </tr>
        <tr>
            <th><?= __('Verde') ?></th>
            <td><?= $this->Number->format($video->verde) ?></td>
        </tr>
        <tr>
            <th><?= __('Naranja') ?></th>
            <td><?= $this->Number->format($video->naranja) ?></td>
        </tr>
        <tr>
            <th><?= __('Rojo') ?></th>
            <td><?= $this->Number->format($video->rojo) ?></td>
        </tr>
        <tr>
            <th><?= __('Total Votos') ?></th>
            <td><?= $this->Number->format($video->total_votos) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($video->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($video->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descripcion') ?></h4>
        <?= $this->Text->autoParagraph(h($video->descripcion)); ?>
    </div>
</div>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Video'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Users/users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Users/users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="videos index large-9 medium-8 columns content">
    <?php echo $this->element('buscadorAdmin'); ?>
    <h3><?= __('Videos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('titulo') ?></th>
                <th><?= $this->Paginator->sort('publicado') ?></th>
                <th><?= $this->Paginator->sort('verde') ?></th>
                <th><?= $this->Paginator->sort('naranja') ?></th>
                <th><?= $this->Paginator->sort('rojo') ?></th>
                <th><?= $this->Paginator->sort('total_votos') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('categoria_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($videos as $video): ?>
            <tr>
                <td><?= h($video->titulo) ?></td>
                <td><?= $this->Number->format($video->publicado) ?></td>
                <td><?= $this->Number->format($video->verde) ?></td>
                <td><?= $this->Number->format($video->naranja) ?></td>
                <td><?= $this->Number->format($video->rojo) ?></td>
                <td><?= $this->Number->format($video->total_votos) ?></td>
                <td><?= $video->has('user') ? $this->Html->link($video->user->username, ['controller' => 'Users', 'action' => 'view', $video->user->id]) : '' ?></td>
                <td><?= $video->has('categoria') ? $this->Html->link($video->categoria->nombre, ['controller' => 'Categorias', 'action' => 'view', $video->categoria->id]) : '' ?></td>
                <td><?= date('d-m-Y H:i:s', strtotime($video->created)) ?></td>
                <td><?= date('d-m-Y H:i:s', strtotime($video->modified)) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $video->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $video->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $video->id], ['confirm' => __('Are you sure you want to delete # {0}?', $video->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>

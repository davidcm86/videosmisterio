<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Blog'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="blog index large-9 medium-8 columns content">
    <h3><?= __('Blog') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('nombre') ?></th>
                <th><?= $this->Paginator->sort('slug') ?></th>
                <th><?= $this->Paginator->sort('descripcion') ?></th>
                <th><?= $this->Paginator->sort('imagen_portada') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($blog as $blog): ?>
            <tr>
                <td><?= $this->Number->format($blog->id) ?></td>
                <td><?= h($blog->nombre) ?></td>
                <td><?= h($blog->slug) ?></td>
                <td><?= h($blog->descripcion) ?></td>
                <td><?= h($blog->imagen_portada) ?></td>
                <td><?= h($blog->modified) ?></td>
                <td><?= h($blog->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $blog->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $blog->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $blog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blog->id)]) ?>
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

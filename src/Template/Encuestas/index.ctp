<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Encuesta'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="encuestas index large-9 medium-8 columns content">
    <h3><?= __('Encuestas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('pregunta_principal') ?></th>
                <th><?= $this->Paginator->sort('pregunta_radio_0') ?></th>
                <th><?= $this->Paginator->sort('pregunta_radio_1') ?></th>
                <th><?= $this->Paginator->sort('pregunta_radio_2') ?></th>
                <th><?= $this->Paginator->sort('resultado_radio_0') ?></th>
                <th><?= $this->Paginator->sort('resultado_radio_1') ?></th>
                <th><?= $this->Paginator->sort('resultado_radio_2') ?></th>
                <th><?= $this->Paginator->sort('suma_votos') ?></th>
                <th><?= $this->Paginator->sort('activo') ?></th>
                <th><?= $this->Paginator->sort('categoria_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($encuestas as $encuesta): ?>
            <tr>
                <td><?= $this->Number->format($encuesta->id) ?></td>
                <td><?= h($encuesta->pregunta_principal) ?></td>
                <td><?= h($encuesta->pregunta_radio_0) ?></td>
                <td><?= h($encuesta->pregunta_radio_1) ?></td>
                <td><?= h($encuesta->pregunta_radio_2) ?></td>
                <td><?= h($encuesta->resultado_radio_0) ?></td>
                <td><?= h($encuesta->resultado_radio_1) ?></td>
                <td><?= h($encuesta->resultado_radio_2) ?></td>
                <td><?= h($encuesta->suma_votos) ?></td>
                <td><?= h($encuesta->activo) ?></td>
                <td><?= $encuesta->has('categoria') ? $this->Html->link($encuesta->categoria->nombre, ['controller' => 'Categorias', 'action' => 'view', $encuesta->categoria->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $encuesta->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $encuesta->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $encuesta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $encuesta->id)]) ?>
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

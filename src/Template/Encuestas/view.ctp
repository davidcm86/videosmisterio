<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Encuesta'), ['action' => 'edit', $encuesta->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Encuesta'), ['action' => 'delete', $encuesta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $encuesta->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Encuestas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Encuesta'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="encuestas view large-9 medium-8 columns content">
    <h3><?= h($encuesta->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nombre') ?></th>
            <td><?= h($encuesta->nombre) ?></td>
        </tr>
        <tr>
            <th><?= __('Pregunta Principal') ?></th>
            <td><?= h($encuesta->pregunta_principal) ?></td>
        </tr>
        <tr>
            <th><?= __('Pregunta Radio 0') ?></th>
            <td><?= h($encuesta->pregunta_radio_0) ?></td>
        </tr>
        <tr>
            <th><?= __('Pregunta Radio 1') ?></th>
            <td><?= h($encuesta->pregunta_radio_1) ?></td>
        </tr>
        <tr>
            <th><?= __('Pregunta Radio 2') ?></th>
            <td><?= h($encuesta->pregunta_radio_2) ?></td>
        </tr>
        <tr>
            <th><?= __('Pregunta Radio 3') ?></th>
            <td><?= h($encuesta->pregunta_radio_3) ?></td>
        </tr>
        <tr>
            <th><?= __('Resultado Radio 0') ?></th>
            <td><?= h($encuesta->resultado_radio_0) ?></td>
        </tr>
        <tr>
            <th><?= __('Resultado Radio 1') ?></th>
            <td><?= h($encuesta->resultado_radio_1) ?></td>
        </tr>
        <tr>
            <th><?= __('Resultado Radio 2') ?></th>
            <td><?= h($encuesta->resultado_radio_2) ?></td>
        </tr>
        <tr>
            <th><?= __('Resultado Radio 3') ?></th>
            <td><?= h($encuesta->resultado_radio_3) ?></td>
        </tr>
        <tr>
            <th><?= __('Categoria') ?></th>
            <td><?= $encuesta->has('categoria') ? $this->Html->link($encuesta->categoria->id, ['controller' => 'Categorias', 'action' => 'view', $encuesta->categoria->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($encuesta->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($encuesta->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($encuesta->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Activo') ?></th>
            <td><?= $encuesta->activo ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>

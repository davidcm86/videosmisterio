<!-- Content -->
<div id="content-wrapper">
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="12u">
                    <?= $this->Flash->render() ?>
                    <!-- Main Content -->
                    <section>
                        <header>
                            <h1 id="h1VideoMisterio">Mis videos subidos</h1>
                        </header>
                        <table cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <th><?= $this->Paginator->sort('titulo') ?></th>
                                    <th><?= $this->Paginator->sort('created', ['label' => 'Creado el']) ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($videos as $video): ?>
                                <tr>
                                    <td><?= h($video->titulo) ?></td>
                                    <td><?= date('d-m-Y H:i:s', strtotime($video->created)) ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="paginator">
                            <ul class="pagination">
                                <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
                                <?= $this->Paginator->numbers() ?>
                                <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
                            </ul>
                            <?= $this->Paginator->counter(
                                'Página {{page}} de {{pages}}, mostrando {{current}} resultados
                                {{count}} total, empezando {{start}}, acabando {{end}}'
                            ); ?>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
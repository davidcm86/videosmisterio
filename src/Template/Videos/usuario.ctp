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
                            <h1 id="h1VideoMisterio">Videos subidos por <?php echo $user->username ?> (<?php echo $countVideos; ?>)</h1>
                            <?php
                                //if (!empty($user->url_web)) echo "<h3>Web: <a href='$user->url_web' target='_blank'>$user->url_web</a></h3>";
                                //if (!empty($user->url_facebook)) echo "<h3>Facebook: <a href='$user->url_facebook' target='_blank'>$user->url_facebook</a></h3>";
                                //if (!empty($user->url_youtube)) echo "<h3>Youtube: <a href='$user->url_youtube' target='_blank'>$user->url_youtube</a></h3>";
                                //if (!empty($user->url_twitter)) echo "<h3>Twitter: <a href='$user->url_twitter' target='_blank'>$user->url_twitter</a></h3>";
                            ?>
                        </header>
                        <table cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <th><?= $this->Paginator->sort('titulo') ?></th>
                                    <th>Categoria</th>
                                    <th><?= $this->Paginator->sort('created', ['label' => 'Creado el']) ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($videos as $video): ?>
                                <tr>
                                    <td>
                                       <?php 
                                            echo $this->Html->link(
                                                $video->titulo,
                                                ['controller' => 'videos', 'action' => 'misterio', $video->slug_titulo],
                                                ['itemprop' => 'url', 'target' => '_blank']
                                            );
                                        ?>
                                    </td>
                                    <td>
                                    <?= 
                                        $this->Html->link(
                                            $video->categoria['nombre'],
                                            ['controller' => 'categoria', $video->categoria['alias']],
                                            ['rel' => 'nofollow', 'itemprop' => 'thumbnailUrl', 'target' => '_blank']
                                        );
                                    ?>
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
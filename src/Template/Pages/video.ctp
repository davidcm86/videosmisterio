<!-- Features -->
<div id="features-wrapper">
    <div id="features">
        <div class="container">
            <span class="margin-cinco"><?php echo $this->element('publicidadMisterio'); ?></span>
            <header>
                <h1 id="h1VideoMisterioDocumental">Documentales de misterio</h1>
            </header>
            <div class="row">
                <?php foreach ($videos as $video) { ?>
                    <div class="3u 12u(mobile)">
                        <section itemscope itemtype="http://schema.org/VideoObject">
                            <!-- Imagen video -->
                            <?php
                                $rutaImagen = '/img/banner-rip-image.jpg';
                                if (file_exists(WWW_ROOT . 'img/thumbnails/' . date('Y', strtotime($video->created)) . '/' . $video->id . '.jpg')) {
                                    $rutaImagen = '/img/thumbnails/' . date('Y', strtotime($video->created)) . '/' . $video->id . '.jpg';
                                }
                                echo $this->Html->image($rutaImagen, [
                                    "alt" => $video->titulo,
                                    "title" => $video->titulo,
                                    'url' => ['controller' => 'videos', 'action' => 'misterio', $video->slug_titulo],
                                    "class" => "bordered-feature-image hvr-shrink width-cien",
                                    "itemprop" => "thumbnailUrl"
                                ]);
                            ?>
                            <!-- Titulo video -->
                            <h2 itemprop="name">
                                <?php
                                    $titulo = $this->Text->truncate(
                                        $video->titulo,
                                        35,
                                        [
                                            'ellipsis' => '...',
                                            'exact' => false,
                                            'html' => true
                                        ]
                                    );
                                    echo $this->Html->link(
                                        $titulo,
                                        ['controller' => 'videos', 'action' => 'misterio', $video->slug_titulo]
                                    );
                                ?>
                            </h2>
                            <!-- Descripcion video -->
                            <span itemprop="description">
                                <?=
                                    $this->Text->truncate(
                                        $video->descripcion,
                                        125,
                                        [
                                            'ellipsis' => '...',
                                            'exact' => false,
                                            'html' => true
                                        ]
                                    );
                                    echo 'Subido el: <span class="fechaPages" itemprop="uploadDate">' . date('d-m-Y', strtotime($video->created)) . '</span>';
                                ?>
                            </span>
                        </section>
                    </div>
                <?php } ?>
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
            </div>
            <span class="margin-cinco"><?php echo $this->element('publicidadMisterio'); ?></span>
        </div>
    </div>
</div>

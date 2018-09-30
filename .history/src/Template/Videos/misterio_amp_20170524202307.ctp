<!-- Content -->
<div id="content-wrapper">
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="9u 12u(mobile)">
                    <?= $this->element('publicidadMisterioAmp'); ?>
                    <!-- Main Content -->
                    <section>
                        <a href="/"><p class="tituloMisterioAmp">Videos de Misterio</p></a>
                        <h1 id="h1VideoMisterio"><?= $video->titulo; ?></h1>
                        <?php if (!empty($video->description)) { ?>
                            <blockquote>
                                <p><?= $video->description; ?></p>
                            </blockquote>
                        <?php } ?>
                        <amp-youtube
                            data-videoid="<?= $video->enlace; ?>"
                            layout="responsive"
                            width="480" height="270">
                        </amp-youtube>
                        <p class="resetP">
                            Video subido </b> el día: <b><?= date('d-m-Y', strtotime($video->created)); ?>,</b> en la categoría de:                                    
                            <?= 
                                $this->Html->link(
                                    $video['categoria']['nombre'],
                                    ['controller' => 'categoria', $video['categoria']['alias']]
                                );
                            ?>, 
                        <span>
                        </p>
                        <?php echo $this->element('redesSociales'); ?>
                        <div><?php echo $video->descripcion; ?></div>
                        <amp-img  src="<?php echo $rutaImagen; ?>" alt="<?php echo $video->keywords; ?>"  height="200px" width="auto"></amp-img>
                        <!--<div class="fb-comments" data-href="http://www.videosmisterio.com<?php //echo $urlAcesso; ?>" data-numposts="5" data-mobile="true"></div>-->
                    </section>
                </div>
                <div class="3u 12u(mobile)">
                    <section class="publicidad-movil-columna-derecha">
                        <?= $this->element('publicidadMisterioAmp'); ?>
                    </section>
                    <!-- Sidebar -->
                    <section>
                        <?php 
                            if (empty($encuesta['encuesta'])) {
                                echo $this->element('categorias');
                            } else {
                                //echo $this->element('encuesta-amp', [$encuesta]);
                            } 
                        ?>
                    </section>
                </div>
            </div>
            <div class="row">
                <!-- Videos Random -->
                <?php foreach ($videosRandom as $videoRandom) { ?>
                    <div class="3u 12u(mobile)">
                        <section>
                            <!-- Imagen videoRandom -->
                            <?php
                                $rutaImagen = '/img/banner-rip-image.jpg';
                                if (file_exists(WWW_ROOT . 'img/thumbnails/' . date('Y', strtotime($videoRandom->created)) . '/' . $videoRandom->id . '.jpg')) {
                                    $rutaImagen = '/img/thumbnails/' . date('Y', strtotime($videoRandom->created)) . '/' . $videoRandom->id . '.jpg';
                                }
                            ?>
                            <a href="<?php echo $videoRandom->slug_titulo; ?>"><amp-img  src="<?php echo $rutaImagen; ?>" alt="<?php echo $videoRandom->titulo; ?>"  height="200px" width="auto"></amp-img></a>
                            <!-- Titulo videoRandom -->
                            <h2>
                                <?php
                                    $titulo = $this->Text->truncate(
                                        $videoRandom->titulo,
                                        30,
                                        [
                                            'ellipsis' => '...',
                                            'exact' => true,
                                            'html' => true,
                                        ]
                                    );
                                    echo $this->Html->link(
                                        $titulo,
                                        ['controller' => 'videos', 'action' => 'misterio', $videoRandom->slug_titulo]
                                    );
                                ?>
                            </h2>
                            <!-- Descripcion videoRandom -->
                            <div>
                                <a href="/videos/misterio/<?php echo $videoRandom->slug_titulo; ?>">
                                    <?=
                                        $this->Text->truncate(
                                            $videoRandom->descripcion,
                                            '135',
                                            [
                                                'ellipsis' => '...',
                                                'exact' => true,
                                                'html' => true,
                                            ]
                                        );
                                    ?>
                                </a>
                            </div>
                            <span><?php echo date('d-m-Y', strtotime($videoRandom->created)); ?></span>
                        </section>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
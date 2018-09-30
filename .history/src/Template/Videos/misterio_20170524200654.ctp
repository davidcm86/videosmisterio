<!-- Content -->
<div id="content-wrapper">
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="9u 12u(mobile)">
                    <!-- Main Content -->
                    <section>
                        <h1 id="h1VideoMisterio"><?= $video->titulo; ?></h1>
                        <?php if (!empty($video->description)) { ?>
                            <blockquote>
                                <p><?= $video->description; ?></p>
                            </blockquote>
                        <?php } ?>
                        <iframe class="iframeYoutube" src="http://www.youtube.com/embed/<?= $video->enlace; ?>?version=3" allowfullscreen></iframe>
                        <p class="resetP">
                            Video subido por: <b><a href="/videos/usuario/<?php echo $video['user']['id'] ?>" title="Ver lo videos subidos de <?php echo $video['user']['username'] ?>"><?= $video['user']['username']; ?></a>,</b> el día: <b><?= date('d-m-Y', strtotime($video->created)); ?>,</b> en la categoría de:                                    
                            <?= 
                                $this->Html->link(
                                    $video['categoria']['nombre'],
                                    ['controller' => 'categoria', $video['categoria']['alias']]
                                );
                            ?>, 
                            <a href="https://plus.google.com/103291225037835840257" title="Autoría de Videos Misterio" rel="publisher">Videos Misterio</a>
                        <span>
                        </p>
                        <?php echo $this->element('redesSociales'); ?>
                        <!--<div class="fb-like" data-href="http://www.videosmisterio.com<?= $compartirRedesSociales; ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>-->
                        <!--<div class="g-plus" data-action="share" data-annotation="bubble"></div>-->
                        <!--<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.videosmisterio.com<?php echo $compartirRedesSociales; ?>" data-text="<?= $video->titulo; ?>" data-via="VideosMisterio">Tweet</a>-->
                        <!--<script type="IN/Share" data-url="http://www.videosmisterio.com<?= $compartirRedesSociales; ?>" data-counter="right"></script>-->
                        <!--<a href="//www.reddit.com/submit" onclick="window.location = '//www.reddit.com/submit?url=' + encodeURIComponent(window.location); return false"> <img src="//www.redditstatic.com/spreddit1.gif" alt="submit to reddit" border="0" /> </a>-->
                        <div><?php echo $video->descripcion; ?></div>
                        <!--<div class="fb-comments" data-href="http://www.videosmisterio.com<?php echo $urlAcesso; ?>" data-numposts="5" data-mobile="true"></div>-->
                        <?php 
                            echo $this->Html->image($rutaImagen, [
                                "alt" => $video->keywords,
                                "title" => $video->keywords,
                                "style" => "width:100%;"
                            ]);
                        ?>
                    </section>
                </div>
                <div class="3u 12u(mobile)">
                    <section class="publicidad-movil-columna-derecha">
                            <?php 
                                /*if (isset($video->libro_afiliado_1) && !empty($video->libro_afiliado_1) || isset($video->libro_afiliado_2) && !empty($video->libro_afiliado_2)) {
                                    echo $this->element('columnaLibros', array($video)); 
                                } else {*/
                                    //echo "<h3>";
                                        echo $this->element('publicidadMisterio');
                                    //echo "</h3>";
                               //}
                            ?>
                    </section>
                    <!-- Sidebar -->
                    <section>
                        <?php 
                            if (empty($encuesta['encuesta'])) {
                                echo $this->element('categorias');
                            } else {
                                echo $this->element('encuesta', [$encuesta]);
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
                                echo $this->Html->image($rutaImagen, [
                                    "alt" => $videoRandom->titulo,
                                    "title" => $videoRandom->titulo,
                                    "url" => ['controller' => 'videos', 'action' => 'misterio', $videoRandom->slug_titulo],
                                    "style" => "width:100%;",
                                    "class" => "bordered-feature-image hvr-shrink"
                                ]);
                            ?>
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
                                <a style="text-decoration:none;color:#222333;" href="/videos/misterio/<?php echo $videoRandom->slug_titulo; ?>">
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
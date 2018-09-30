<!-- Features -->
<div id="features-wrapper">
    <div id="features">
        <div class="container">
            <div class="row">
                <div class="12u 12u(mobile)">
                    <?= $this->element('publicidadMisterio'); ?>
                </div>
                <?php if (isset($categoria)) {?>
                    <div class="12u 12u(mobile)">
                        <h1><span id="categoriaBuscada"><?= $categoria ?></span></h1>
                    </div>
                <?php } ?>
                <?php foreach ($videos as $key => $video) { ?>
                    <div class="4u 12u(mobile)">
                        <section itemscope itemtype="http://schema.org/VideoObject">
                            <!-- Imagen video -->
                            <?php
                                $rutaImagen = '/img/banner-rip-image.jpg';
                                if (file_exists(WWW_ROOT . 'img/thumbnails/' . date('Y', strtotime($video->created)) . '/' . $video->id . '.jpg')) {
                                    $rutaImagen = '/img/thumbnails/' . date('Y', strtotime($video->created)) . '/' . $video->id . '.jpg';
                                }
                            ?>
                            <amp-img  src="<?php echo $rutaImagen; ?>" alt="<?php echo $video->titulo; ?>"  height="200px" width="auto"></amp-img>
                            <!-- Titulo video -->
                            <h2 itemprop="name">
                                <?php
                                    $titulo = $this->Text->truncate(
                                        $video->titulo,
                                        50,
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
                            <div itemprop="description">
                                <a class="no-text-decoration" href="/videos/misterio/<?php echo $video->slug_titulo; ?>">
                                <?=
                                    $this->Text->truncate(
                                        $video->descripcion,
                                        175,
                                        [
                                            'ellipsis' => '...',
                                            'exact' => false,
                                            'html' => true
                                        ]
                                    );
                                ?>
                                </a>
                                <?php echo 'Subido el: <span class="fechaPages" itemprop="uploadDate">' . date('d-m-Y', strtotime($video->created)) . '</span>'; ?>
                            </div>
                        </section>
                    </div>
                <?php } ?>
            </div>
            <span class="margin-cinco"><?= $this->element('publicidadMisterioAmp'); ?></span>
        </div>
    </div>
</div>

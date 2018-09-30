<?php use Cake\View\Helper; ?>
<div id="header-wrapper">
    <header id="header" class="container">
        <div class="row">
            <div class="12u" id="simularLogoTitulo">
                <!-- Logo -->
                    <?php
                        if (!isset($tituloH1)) {
                            echo "<h1>";
                            echo $this->Html->link(
                                'Videos de Misterio',
                                '/',
                                ['class' => 'button']
                            );
                            echo "</h1>";
                        } else {
                            echo $this->Html->link(
                                'Videos de Misterio',
                                '/',
                                ['class' => 'titulo-misterio button']
                            );
                        }
                    ?>
                <!-- Nav -->
                    <nav id="nav">
                        <?= 
                            $this->Html->link(
                                '<i title="Facebook de Videos Misterio" class="fa fa-facebook-square fa-lg pointer" aria-hidden="true"></i><span style="display:none;" class="iconoTexto">Facebook</span>',
                                'https://www.facebook.com/videosmisterio/',
                                ['class' => 'redes-sociales', 'escape' => false, 'target' => '_blank']
                            );
                        ?>
                        <?= 
                            $this->Html->link(
                                '<i title="Google de Videos Misterio" class="fa fa-google fa-lg pointer" aria-hidden="true"></i><span style="display:none;" class="iconoTexto">Google</span>',
                                'https://plus.google.com/103291225037835840257/posts',
                                ['class' => 'redes-sociales', 'escape' => false, 'target' => '_blank', 'rel' => 'publisher']
                            );
                        ?>
                        <?= 
                            $this->Html->link(
                                '<i title="Twitter de Videos Misterio" class="fa fa-twitter fa-lg pointer" aria-hidden="true"></i><span style="display:none;" class="iconoTexto">Twitter</span>',
                                'https://twitter.com/VideosMisterio',
                                ['class' => 'redes-sociales', 'escape' => false, 'target' => '_blank']
                            );
                        ?>
                        <?php
                            echo $this->Html->link(
                                'Sube un video de misterio',
                                '/videos/sube_tu_video_de_misterio',
                                ['class' => 'button']
                            );
                        ?>
                        <?php
                            echo $this->Html->link(
                                'Tags',
                                '/categorias/listado',
                                ['class' => 'button']
                            );
                        ?>
                        <?php
                            /*if ($this->request->session()->read('Auth.User.username')) {
                                echo $this->Html->link(
                                    'Mis videos',
                                    '/videos/mis_videos',
                                    ['class' => 'button']
                                );
                            }*/
                        ?>
                        <?php
                            if (!$this->request->session()->read('Auth.User.username')) {
                                echo $this->Html->link(
                                    'Participa',
                                    '/encuestas/listado',
                                    ['class' => 'button']
                                );
                            ?>
                            <a href="/logout" alt="Salir de Videos Misterio"><i title="Salir de Videos Misterio" class="fa fa-sign-out" aria-hidden="true"></i><span style="display:none;" class="iconoTexto">Desconectar</span></a>

                            <?php if (!$this->request->session()->read('Auth.User.username')) { ?>
                                <a href="/login" alt="Entrar a Videos Misterio"><i title="Entrar a Videos Misterio" class="fa fa-sign-in" aria-hidden="true"></i><span style="display:none;" class="iconoTexto">Login</span></a>
                            <?php }
                            } else {
                                echo $this->Html->link(
                                    'Mi cuenta',
                                    '/mi-cuenta',
                                    ['class' => 'button']
                                ); ?>
                                <a href="/videos/usuario/<?php echo $this->request->session()->read('Auth.User.id') ?>" alt="Mis videos de misterio"><i title="Mis videos de misterio" class="fa fa-youtube-play" aria-hidden="true"></i><span style="display:none;" class="iconoTexto">Mis videos</span></a>
                            <?php } ?>
                        <?php if ($this->request->session()->read('Auth.User.username')) { ?>
                            <a href="/logout" alt="Salir de Videos Misterio"><i title="Salir de Videos Misterio" class="fa fa-sign-out" aria-hidden="true"></i><span style="display:none;" class="iconoTexto">Desconectar</span></a>
                        <?php } ?>                              
                    </nav>
            </div>
        </div>
    </header>
    <?php if (isset($videoDestacado)) { ?>
        <div id="banner">
            <div class="container">
                <div class="row" itemscope itemtype="http://schema.org/VideoObject">
                    <div class="6u 12u(mobile)">
                        <!-- Titulo video -->
                        <h2 class="h2PagesVideo" itemprop="name">
                            <?= 
                                $this->Html->link(
                                    $videoDestacado->titulo,
                                    '/videos/misterio/' . $videoDestacado->slug_titulo,
                                    ['class' => 'h2PagesVideo', 'itemprop' => 'url']
                                );
                            ?>
                        </h2>
                        <!-- Descripcion video -->
                        <div itemprop="description">
                            <?=
                                $this->Text->truncate(
                                    $videoDestacado->descripcion,
                                    300,
                                    [
                                        'ellipsis' => '',
                                        'exact' => false,
                                        'html' => true
                                    ]
                                );
                            ?>
                        </div>
                        <div class="clear-both"></div>
                        <div class="button-big-video-principal">
                            <?= 
                                $this->Html->link(
                                    '! Ver video !',
                                    '/videos/misterio/' . $videoDestacado->slug_titulo,
                                    ['class' => 'button-big', 'itemprop' => 'url']
                                );
                            ?>
                        </div>    
                    </div>
                    <div class="6u 12u(mobile)">
                        <!-- Imagen video -->
                            <?= 
                                $this->Html->image($videoDestacado->image, [
                                    "alt" => $videoDestacado->titulo,
                                    "title" => $videoDestacado->titulo,
                                    'url' => ['controller' => 'videos', 'action' => 'misterio', $videoDestacado->slug_titulo],
                                    "class" => "bordered-feature-image hvr-shrink width-sesentacinco",
                                    "itemprop" => "thumbnailUrl"
                                ]);
                            ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<!-- Footer -->
    <div id="footer-wrapper">
        <footer id="footer" class="container">
            <div class="row">
                <div class="8u 12u(mobile)">

                    <!-- Links -->
                        <section>
                            <h2>Links relevantes</h2>
                            <div>
                                <div class="row">
                                    <div class="3u 12u(mobile)">
                                        <ul class="link-list last-child">
                                            <li>
                                                <?= 
                                                    $this->Html->link(
                                                        'Categorias',
                                                        '/categorias/listado',
                                                        ['class' => 'button']
                                                    );
                                                ?>
                                            </li>
                                            <li>
                                                <?php
                                                    echo $this->Html->link(
                                                        '¿Qué es Videos Misterio?',
                                                        ['controller' => 'pages', 'action' => 'queEsVideosMisterio']
                                                    );
                                                ?>
                                            </li>
                                            <li>
                                                <?php
                                                    echo $this->Html->link(
                                                        'Política de privacidad',
                                                        ['controller' => 'pages', 'action' => 'politicaDePrivacidad']
                                                    );
                                                ?>
                                            </li>
                                            <li>
                                                <?php
                                                    echo $this->Html->link(
                                                        'Las Noticias Más Comentadas',
                                                        'http://www.lasnoticiasmascomentadas.es'
                                                    );
                                                ?>
                                            </li>
                                            <li>
                                                <?php
                                                    echo $this->Html->link(
                                                        'Listado de Nombres',
                                                        'http://www.listadodenombres.com'
                                                    );
                                                ?>
                                            </li>
                                            <li><a href="mailto:dcarretero86@hotmail.com">Contacta con la web</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </section>

                </div>
                <div class="4u 12u(mobile)">
		            <div class="fb-like-box" data-href="https://www.facebook.com/pages/videosmisteriocom/272692842939205?ref=hl" data-width="275" data-height="400" data-colorscheme="dark" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
                </div>
            </div>
        </footer>
    </div>
</div>

<?= $this->Html->css('hover.min.css', ['async']) ?>
<?= $this->Html->css('font-awesome.min', ['async']) ?>
<!-- Scripts -->
<?= $this->Html->script('jquery.min.js') ?>
<?= $this->Html->script('skel.min.js') ?>
<?= $this->Html->script('skel-viewport.min.js') ?>
<?= $this->Html->script('util.min.js') ?>
<?= $this->Html->script('main.min.js') ?>
<?= $this->Html->script('videosmisterio.min.js') ?>
<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->

<!-- Content -->
    <div id="content-wrapper">
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="12u">

                        <!-- Main Content -->
                            <section>
                                <header>
                                    <h1 id="h1VideoMisterio"><?= $tituloH1 ?></h1>
                                </header>
                                <p>
                                    <?php 
                                        foreach ($categorias as $categoria) {
                                            echo "<li>";
                                            echo $this->Html->link(
                                                $categoria->nombre,
                                                ['controller' => 'categoria', $categoria->alias],
                                                ['class' => 'button']
                                            );
                                            echo "</li>";
                                        } 
                                    ?>
                                </p>
                            </section>

                    </div>
                </div>
            </div>
        </div>
    </div>
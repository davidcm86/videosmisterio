<!-- Content -->
<div id="content-wrapper">
    <div id="content">
        <div class="container">
            <section>
                <h1 id="h1VideoMisterio">Encuestas de misterio</h1>
                <div class="row">
                    <div class="12u">
                        <?php 
                            foreach ($encuestas as $encuesta) {
                                echo "<section style='margin:5px;'>";
                                echo $this->element('todasEncuestas', ['encuesta' => $encuesta]);
                                echo "</section>";
                            }
                        ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
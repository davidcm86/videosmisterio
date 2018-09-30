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
                            <h1 id="h1VideoMisterio">Sube un video de misterio</h1>
                        </header>
                        <div class="videos form large-9 medium-8 columns content">
                            <?= $this->Form->create($subirVideo) ?>
                            <fieldset>
                                <?php
                                    echo $this->Form->input('titulo', ['label' => 'Título (Procura poner un título diferente al de youtube para mayor alcance)', 'title' => 'Escriba el título con el que quiera que se muestre el video o el título que aparece en youtube.']);
                                    echo $this->Form->input('enlace', ['label' => 'Url o link de youtube (Inserta el enlace que se encuentra en compartir del video de youtube)', 'title' => 'Vaya al video de youtube que desea insertar. Debajo del video verá la opción compartir, pinche en ella y copie aquí la dirección o url que le aparece.']);
                                    echo $this->Form->input('descripcion', ['label' => 'Descripción (Procura poner una descripción diferente a la de youtube para mayor alcance)']);
                                    echo $this->Form->input('categoria_id', ['options' => $categorias]);
                                ?>
                            </fieldset>
                            <?= $this->Form->button(__('Enviar')) ?>
                            <?= $this->Form->end() ?>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
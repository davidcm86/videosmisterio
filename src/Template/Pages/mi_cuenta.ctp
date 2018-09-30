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
                            <h1 id="h1VideoMisterio">Mi cuenta</h1>
                        </header>
                        <div class="videos form large-9 medium-8 columns content">
                            <?= $this->Form->create($user) ?>
                            <fieldset>
                                <?php
                                    echo $this->Form->input('username', ['label' => 'Username', 'title' => 'Escriba el nombre con el que quiera ser visto.', 'value' => $user['username'], 'required' => true]);
                                    echo $this->Form->input('url_web', ['placeholder' => 'http://www.miweb.com', 'title' => 'Escriba la url de su web.']);
                                    echo $this->Form->input('url_facebook', ['placeholder' => 'https://www.facebook.com/misitiofacebook/', 'label' => 'Url de su página de facebook', 'title' => 'Escriba la url de su página de facebook.']);
                                    echo $this->Form->input('url_youtube', ['placeholder' => 'https://www.youtube.com/channel/UCN6EMEKimwC7mh4mTLMJYBA', 'label' => 'Url de su canal de youtube', 'title' => 'Escriba la url de su canal de youtube.']);
                                    echo $this->Form->input('url_twitter', ['placeholder' => 'https://twitter.com/misitiotwitter','label' => 'Url de su cuenta twitter', 'title' => 'Escriba la url de su cuenta en twitter.']);
                                ?>
                            </fieldset>
                            <?= $this->Form->button(__('Guardar')) ?>
                            <?= $this->Form->end() ?>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
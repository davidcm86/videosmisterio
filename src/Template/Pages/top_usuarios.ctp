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
                            <h1 id="h1VideoMisterio">Top usuarios</h1>
                        </header>
                        <table cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Usuario</th>
                                    <th>Total videos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($usuariosVideos as $usuarioVideo): ?>
                                <?php //debug($usuarioVideo); ?>
                                <tr>
                                    <td>
                                        <a href="/videos/usuario/<?php echo $usuarioVideo['id'] ?>" title="Ver lo videos subidos de <?php echo $usuarioVideo['username'] ?>"><?= $usuarioVideo['username']; ?></a>
                                    </td>
                                    <td><?= $usuarioVideo['ContadorVideos'] ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
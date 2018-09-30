<h2>Algunas Categorias</h2>
<ul class="link-list">
    <?php foreach ($categoriasRandom as $categoriaRandom) { ?>
        <li>
            <?= 
                $this->Html->link(
                    $categoriaRandom->nombre,
                    ['controller' => 'categoria', $categoriaRandom->alias]
                );
            ?>
        </li>
    <?php } ?>
</ul>
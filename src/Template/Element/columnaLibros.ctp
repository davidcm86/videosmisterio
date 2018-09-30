<?php if (!empty($video->libro_afiliado_1) && !empty($video->libro_afiliado_2)) { ?>
    <h2 style="text-align:center;">Ofertas Amazon</h2>
    <div style="text-align: center;">
    <iframe src="<?php echo $video->libro_afiliado_1; ?>" style="width:120px;height:240px;" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe>
    <iframe src="<?php echo $video->libro_afiliado_2; ?>" style="width:120px;height:240px;" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe>  
    </div>
<?php } else if (!empty($video->libro_afiliado_1)) { ?>
    <h2>Libros relacionados</h2>
    <div style="text-align: center;">
        <p><iframe src="<?php echo $video->libro_afiliado_1; ?>" style="width:120px;height:240px;" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe></p>
    </div>
<?php } else if (!empty($video->libro_afiliado_2)) { ?>
    <h2>Libros relacionados</h2>
    <div style="text-align: center;">
        <p><iframe src="<?php echo $video->libro_afiliado_2; ?>" style="width:120px;height:240px;" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe></p>
    </div>
<?php } else { ?>
    <h2>Sube tu video</h2>
    <p>
        Si deseas subir algún video de misterio de youtube a VideosMisterio puedes hacerlo pinchando  
        <?= $this->Html->link(
                'aquí',
                ['controller' => 'videos', 'action' => 'sube_tu_video_de_misterio']
            );
        ?>. Da igual si el video es de tu canal o de otro. Lo importante es hacer una base de datos con videos de misterio que merezcan la pena verlos.
    </p>
<?php } ?>
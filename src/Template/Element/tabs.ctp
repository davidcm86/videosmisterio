<div id="containertabs">
<!--Pestaña 1 activa por defecto-->
<input id="tab-1" type="radio" name="tab-group" checked="checked" />
<label for="tab-1">Redes Sociales</label>
<!--Pestaña 2 inactiva por defecto-->
<input id="tab-2" type="radio" name="tab-group" />
<label for="tab-2">Descripción</label>
<!--Pestaña 3 inactiva por defecto-->
<input id="tab-3" type="radio" name="tab-group" />
<label for="tab-3">Info Video</label>
<!--Contenido a mostrar/ocultar-->
<div id="contenttabs">
    <!--Contenido de la Pestaña 1-->
    <div id="contenttabs-1">
        <?php echo $this->element('redesSociales', array('amp' => false)); ?>
    </div>
    <!--Contenido de la Pestaña 2-->
    <div id="contenttabs-2">
    <?php echo $video->descripcion; ?>
    </div>
    <!--Contenido de la Pestaña 3-->
    <div id="contenttabs-3">
    </div>
</div>
</div>
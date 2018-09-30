<?php
echo '<div class="encuesta" data-encuesta="' . $encuesta->id . '">';
echo '<h2>' . $encuesta->pregunta_principal . '</h2>';
echo $this->Form->input('respuestaEncuesta-' . $encuesta->id, [
    'type' => 'radio',
    'options' => $encuesta['listPreguntas'],
    'required' => 'required',
    'separator'=> '<br/>',
    'templates' => ['radioWrapper' => '<div>{{label}}</div>'],
    'label' => false,
    'legend' => false
    ]);
echo "<button class='votar-encuesta boton'>Votar</button>";
echo "<div class='total-votos'></div>";
echo '<span style="font-size:1em;">* Vota para ver los resultados</span>';
echo '</div>';
?>
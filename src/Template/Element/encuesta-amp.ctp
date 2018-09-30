<h2>Encuesta</h2>
<?php
echo '<div class="encuesta" data-encuesta="' . $encuesta['encuesta']->id . '">';
echo $encuesta['encuesta']->pregunta_principal;
echo $this->Form->input('respuestaEncuesta-' . $encuesta['encuesta']->id, [
    'type' => 'radio',
    'options' => $encuesta['listPreguntas'],
    'required' => 'required',
    'separator'=> '<br/>',
    'templates' => ['radioWrapper' => '<div>{{label}}</div>'],
    'label' => false,
    'legend' => false
    ]);
echo $this->Form->button('Votar', ['class' => 'votar-encuesta']);
echo "<div class='total-votos'></div>";
echo '<span>* Vota para ver los resultados</span>';
echo '</div>';
?>
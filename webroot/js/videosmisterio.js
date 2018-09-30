$(document).ready(function() {
	//Selector buscador. Para buscar los videos por filtros.
	$('.encuesta').on('click','.votar-encuesta',function(){
		votarEncuesta(this);
	});
});

// Votamos la encuesta de la pagina de misterio.
function votarEncuesta(objeto){
    var idEncuesta = $(objeto).parent().attr('data-encuesta');
    if ($('input:radio[name=respuestaEncuesta-' + idEncuesta + ']:checked').val() == null) {
        $('.message').remove(); // borramos el posible mensaje ya mostrado con anterioridad
        $(objeto).after('<div class="message error">Elige una opción.</div>');
    } else {
        var respuestaEncuesta = $('input:radio[name=respuestaEncuesta-' + idEncuesta + ']:checked').val();
        $.ajax({
            type: "POST",
            dataype: "JSON",
            url: "/encuestas/guardar_votacion_encuesta",
            data: { 
                'respuestaEncuesta': respuestaEncuesta,
                'idEncuesta':  idEncuesta,
            }
        })
        .success(function(datos) {
		    var data = JSON.parse(datos);
            if (data.estado == 1) {
                $("label[for='respuestaencuesta-" + idEncuesta + "-0']").append(' ' + data.resultado_radio_0_porcentaje + ' % con: ' + data.resultado_radio_0 + ' votos');
                $("label[for='respuestaencuesta-" + idEncuesta + "-1']").append(' ' + data.resultado_radio_1_porcentaje + ' % con: ' + data.resultado_radio_1 + ' votos');
                $("label[for='respuestaencuesta-" + idEncuesta + "-2']").append(' ' + data.resultado_radio_2_porcentaje + ' % con: ' + data.resultado_radio_2 + ' votos');
                $("label[for='respuestaencuesta-" + idEncuesta + "-3']").append(' ' + data.resultado_radio_3_porcentaje + ' % con: ' + data.resultado_radio_3 + ' votos');
                var totalVotos = $(objeto).next().next();
                $(totalVotos).empty('');
                $(totalVotos).text('Total de: ' + data.totalVotos + ' votos');
            } else {
                $('.message').remove(); // borramos el posible mensaje ya mostrado con anterioridad
                $(objeto).after('<div class="message error">' + data.mensaje + '</div>');
            }
        })
        .error(function(datos){
            console.log('Error votarEncuesta');
        });
    }


}


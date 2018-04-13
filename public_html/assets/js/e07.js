function fill_medicamento_form(medicamento)
{
    $nombre = $('#medicamento_nombre');
    $presentacion = $('#medicamento_presentacion');
    $cantidad = $('#medicamento_cantidad');
    $vias = $('input[name="medicamento_via"]');

    $nombre.val(medicamento.nombre);
    $presentacion.val(medicamento.presentacion);
    $cantidad.val(medicamento.cantidad != 0 ? medicamento.cantidad : "");

    $vias.each(function(){
        var $this = $(this);
        $this.prop('checked', $this.val() == medicamento.via);
        if($this.val() == medicamento.via){
            $this.closest('label').addClass('active');
        }else{
            $this.closest('label').removeClass('active').removeClass('focus');
        }
    })

}
$(function(){
    $('.chosen').on('change', function(evt, params) {
        var selected = params.selected;
        if(typeof medicamentos[selected] != "undefined")
            fill_medicamento_form(medicamentos[selected]);
    });

    if(medicamento)
        fill_medicamento_form(medicamento);

    //Hora
    $hora = $('#hora');
    $horaAgregar = $('#hora-agregar');
    $horas = $('#horas');

    if($horaAgregar.length > 0) {
        $.mask.definitions['h'] = "[0|1|2]";
        $.mask.definitions['m'] = "[0-5]";
        $hora.mask("h9:m9", {placeholder: "00:00"});

        $horas.tagsInput({
            'interactive': false,
            'height': "50px",
            'width': '100%'
        });

        $horaAgregar.click(function () {
            var hora = $hora.val();
            if (hora && !$horas.tagExist(hora))
                $horas.addTag(hora);

        })
    }
});
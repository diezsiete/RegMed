function loadFlatpickr() {
    if(jQuery().flatpickr){
        $('.flatpickr').each(function(){
            var $this = $(this);
            var dateFormat = $this.data('dateformat') ? $this.data('dateformat') : 'Y-m-d H:i';
            var defaultDate = typeof $this.data('defaultdate') == "undefined" ? new Date() : $this.data('defaultdate');
            var enabletime = typeof $this.data('enabletime') == "undefined" ? true : $this.data('enabletime');
            $this.flatpickr({
                enableTime:enabletime,
                dateFormat:dateFormat,
                defaultDate: defaultDate,
                locale:'es'
                //noCalendar: true
            })
        });
    }
}

$(function(){
    loadFlatpickr();

    if(jQuery().chosen) {
        $('.chosen').chosen({
            no_results_text: "Ningun resultado coincide con"
        });
    }

    var $modals = $('.modal');
    if($modals.length > 0)
        $modals.each(function(){
            var $this = $(this);
            if($this.hasClass('ver'))
                $this.modal('show');
        });

    //form con esta class no hace submit al dar enter
    $('form.enter-no-submit').submit(function () {
        return $(document.activeElement).attr('type') == 'submit'
    });

    //form button group checkbox con opcion Ninguno
    $('.btn-group input[type="checkbox"][value="n/a"], .btn-group input[type="checkbox"][value="Ninguno"]').each(function(){
        var $ninguno = $(this).closest('label.btn');

        $ninguno.click(function(e){
            var $this = $(this);
            //ninguno se activa, desactiva todos los demas
            if(!$this.hasClass('active')){
                $this.siblings('label.btn').each(function(){
                    if($(this).hasClass('active'))
                        $(this).button('toggle');
                })
            }
            //ninguno no se puede desactivar por si solo
            else{
                e.stopPropagation();
            }
        });

        //demas botones
        $ninguno.siblings('label.btn').click(function(){
            //se activa, desactiva ninguno
            if(!$(this).hasClass('active')) {
                if($ninguno.hasClass('active'))
                    $ninguno.button('toggle');
            }
            //se desactiva y no hay mas activados activa ninguno
            else{
                var todos_desactivados = true;
                $(this).siblings('label.btn').each(function(){
                    if($(this).hasClass('active'))
                        todos_desactivados = false;
                });
                if(todos_desactivados)
                    $ninguno.button('toggle');
            }
        });
    })
});
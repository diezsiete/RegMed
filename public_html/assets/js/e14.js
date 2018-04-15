$(function(){
    //form button group checkbox con opcion Ninguno o n/a deselecciona los demas o viceversa
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
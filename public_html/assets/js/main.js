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

    //tooltips
    $('[data-toggle="tooltip"]').tooltip();
    
});
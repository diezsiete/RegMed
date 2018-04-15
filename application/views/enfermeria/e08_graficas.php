<?php $this->load->view('enfermeria/e08_consultar_header'); ?>
<script>
    var graf_data = <?php echo json_encode($graf_data) ?>;
</script>

        <div class="x_content graficas-content">
            <div class="col-xs-1 nav-tabs-wrap">
                <!-- required for floating -->
                <!-- Nav tabs -->
                <ul class="nav nav-tabs tabs-left">
                    <li class="active">
                        <a href="#tension_arterial_tab" data-toggle="tab">Tensión Arterial</a>
                    </li>
                    <li>
                        <a href="#frecuencia_cardiaca_tab" data-toggle="tab">Frecuencia cardiaca</a>
                    </li>
                    <li>
                        <a href="#frecuencia_respiratoria_tab" data-toggle="tab">Frecuencia respiratoria</a>
                    </li>
                    <li>
                        <a href="#saturacion_tab" data-toggle="tab">Saturación</a>
                    </li>
                    <li>
                        <a href="#temperatura_tab" data-toggle="tab">Temperatura</a>
                    </li>
                    <li>
                        <a href="#peso_tab" data-toggle="tab">Peso</a>
                    </li>
                </ul>
            </div>

            <div class="col-xs-11 tab-content-wrap">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="tension_arterial_tab">
                        <canvas id="tension_arterial"></canvas>
                    </div>
                    <div class="tab-pane" id="frecuencia_cardiaca_tab">
                        <canvas id="frecuencia_cardiaca"></canvas>
                    </div>
                    <div class="tab-pane" id="frecuencia_respiratoria_tab">
                        <canvas id="frecuencia_respiratoria"></canvas>
                    </div>
                    <div class="tab-pane" id="saturacion_tab">
                        <canvas id="saturacion"></canvas>
                    </div>
                    <div class="tab-pane" id="temperatura_tab">
                        <canvas id="temperatura"></canvas>
                    </div>
                    <div class="tab-pane" id="peso_tab">
                        <canvas id="peso"></canvas>
                    </div>
                </div>
            </div>
        </div>

<?php $this->load->view('enfermeria/e08_consultar_footer', ['scripts' => [
    'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js',
    'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.0/locale/es.js',
    'vendors/Chart.js/dist/Chart.min.js',
    'assets/js/e08_graficas.js'
]]); ?>




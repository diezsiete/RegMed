<?php $this->load->view('enfermeria/e08_consultar_header'); ?>
<script>
    var graf_data = <?php echo json_encode($graf_data) ?>;
</script>
        <div class="x_content">
            <div class="col-md-12">
                <?php
                $i = 0;
                foreach($graf_data as $param => $data): ?>
                    <button class="btn btn-sm btn-primary graf-button"
                            data-param="<?php echo $param ?>">
                        <?php echo ucfirst(str_replace('_', ' ', $param)) ?>
                    </button>
                <?php
                $i++;
                endforeach
                ?>
            </div>
            <div class="row">
                <div class="graf-content">
                    <div class="col-md-6 tab-pane active" id="tension_arterial_tab">
                        <canvas id="tension_arterial"></canvas>
                    </div>
                    <div class="col-md-6 tab-pane active" id="frecuencia_cardiaca_tab">
                        <canvas id="frecuencia_cardiaca"></canvas>
                    </div>
                    <div class="col-md-6 tab-pane active" id="frecuencia_respiratoria_tab">
                        <canvas id="frecuencia_respiratoria"></canvas>
                    </div>
                    <div class="col-md-6 tab-pane active" id="saturacion_tab">
                        <canvas id="saturacion"></canvas>
                    </div>
                    <div class="col-md-6 tab-pane active" id="temperatura_tab">
                        <canvas id="temperatura"></canvas>
                    </div>
                    <div class="col-md-6 tab-pane active" id="peso_tab">
                        <canvas id="peso"></canvas>
                    </div>
                    <div class="col-md-6 tab-pane active" id="peso_tab">
                        <canvas id="glucometria"></canvas>
                    </div>
                </div>
            </div>
        </div>


<?php $this->load->view('enfermeria/e08_consultar_footer', ['scripts' => [
    'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js',
    'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.0/locale/es.js',
    'vendors/Chart.js/dist/Chart.min.js',
    'assets/js/e08_graficas.js?v=1'
]]); ?>




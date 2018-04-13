<?php
$this->load->view('layout/header_formato_form', ['links' => [
    'vendors/flatpickr/flatpickr.min.css'
]]);
$disabled = $view;
k($disabled);
?>

<div class="col-md-12">
    <h2>1) Datos generales</h2>
</div>
<div class="col-md-12">
    <div class="col-md-6">
        <?php echo input_text('conquien', $view, "¿Con quién vive?") ?>
    </div>
    <div class="col-md-6">
        <?php echo input_text('deque', $view, "¿De qué vive?") ?>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-6">
        <div class="checkbox">
            <label for=lee">
                <input type="hidden" name="lee" value="0">
                <?php echo form_checkbox(['name' => 'lee', 'id' => 'lee','value'=> '1', 'checked' => false]); ?>
                ¿Lee?
            </label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="checkbox">
            <label for="escribe">
                <input type="hidden" name="escribe" value="0">
                <?php echo form_checkbox(['name' => 'escribe', 'id' => 'escribe','value' => '1', 'checked' => false]); ?>
                ¿Escribe?
            </label>
        </div>
    </div>
    <div class="col-md-12">
        <?php echo input_text('otrainstitucion', $view, "¿Ha estado en otra institución?") ?>
    </div>
    <div class="col-md-6">
        <?php echo input_textarea('enfermedades', $view, "Enfermedades Importantes") ?>
    </div>
    <div class="col-md-6">
        <?php echo input_textarea('motivoingresar', $view, "Motivo por el cual desea ingresar") ?>
    </div>
</div>

<div class="col-md-12">
    <h2>2) Datos piscologicos</h2>
</div>
<div class="col-md-12">
    <div class="col-md-12">
        <h3>2.1 Trastornos</h3>
    </div>
    <div class="col-md-12">
        <div class="col-md-6">
            <?php echo input_textarea('tratamientopsi', $view, "¿Ha estado en tratamiento psicológico o psciquiátrico?") ?>
        </div>
        <div class="col-md-6">
            <?php echo input_textarea('drogapsi', $view, "¿Toma droga psiquiátrica?") ?>
        </div>
        <div class="col-md-12">
            <?php echo input_textarea('problemasfamilia', $view, "¿Hubo o hay problemas mentales en su familia?") ?>
        </div>
    </div>
    <div class="col-md-12">
        <h3>2.2 Depresión</h3>
    </div>

    <div class="col-md-12">
        <table border=1 style="width:100%">
            <tr>
                <td><label for="satisfecho">¿Está satisfecho con su vida?</label></td>
                <td>
                    <input type="hidden" name="satisfecho" value="0" >
                    <?php
                    echo form_checkbox(['name'=> 'satisfecho', 'id' => 'satisfecho', 'value'=> 0]);
                    ?>
                </td>
            </tr>
            <tr>
                <td><label for="disminuidointeres">¿Ha disminuido o abandonado muchos de sus intereses o actividades previas?</label></td>
                <td>
                    <input type="hidden" name="disminuidointeres" value="0" >
                    <?php
                    echo form_checkbox(['name' => 'disminuidointeres', 'id' => 'disminuidointeres', 'value' => '0']);
                    ?>
                </td>
            </tr>
            <tr>
                <td><label for="vidavacia">¿Siente que su vida está vacía o no tiene sentido?</label></td>
                <td>
                    <input type="hidden" name="vidavacia" value="0" >
                    <?php
                    echo form_checkbox(['name'=> 'vidavacia','id' => 'vidavacia','value'=> '1']);
                    ?>
                </td>
            </tr>

            <tr>
                <td><label for="aburrido">¿Se siente aburrido frecuentemente?</label></td>
                <td>
                    <input type="hidden" name="aburrido" value="0" >
                    <?php
                    echo form_checkbox(['name'=> 'aburrido', 'id' => 'aburrido', 'value' => '1']);
                    ?>
                </td>
            </tr>
            <tr>
                <td><label for="buenanimo">¿Está usted de buen ánimo la mayoría de tiempo?</label></td>
                <td>
                    <input type="hidden" name="buenanimo" value="0" >
                    <?php
                    echo form_checkbox(['name' => 'buenanimo', 'id'=> 'buenanimo', 'value' => '1']);
                    ?>
                </td>
            </tr>

            <tr>
                <td><label for="temor">¿Está preocupado o teme que algo malo le va a pasar?</label></td>
                <td>
                    <input type="hidden" name="temor" value="0" >
                    <?php
                    echo form_checkbox(['name'=> 'temor', 'id'  => 'temor', 'value' => '1']);
                    ?>
                </td>
            </tr>

            <tr>
                <td><label for="feliz">¿Se siente feliz la mayor parte de tiempo?</label></td>
                <td>
                    <input type="hidden" name="feliz" value="0" >
                    <?php
                    echo form_checkbox(['name' => 'feliz', 'id' => 'feliz', 'value' => '1']);
                    ?>
                </td>
            </tr>

            <tr>
                <td><label for="desamparado">¿Se siente con frecuencia desamparado, desvalido o que no vale nada?</label></td>
                <td>
                    <input type="hidden" name="desamparado" value="0" >
                    <?php
                    echo form_checkbox(['name'=> 'desamparado', 'id' => 'desamparado', 'value' => '1']);
                    ?>
                </td>
            </tr>

            <tr>
                <td><label for="encasaosalir">¿Prefiere quedarse en casa en vez de salir a hacer cosas?</label></td>
                <td>
                    <input type="hidden" name="encasaosalir" value="0" >
                    <?php
                    echo form_checkbox(['name' => 'encasaosalir', 'id'=> 'encasaosalir', 'value'=> '1']);
                    ?>
                </td>
            </tr>

            <tr>
                <td><label for="memoria">¿Tiene más problemas con su memoria que otras personas de su edad?</label></td>
                <td>
                    <input type="hidden" name="memoria" value="0" >
                    <?php
                    echo form_checkbox(['name'=> 'memoria', 'id' => 'memoria', 'value'=> '1']);
                    ?>
                </td>
            </tr>

            <tr>
                <td><label for="Estarvivo">¿Cree usted que es maravilloso estar vivo?</label></td>
                <td>
                    <input type="hidden" name="estarvivo" value="0" >
                    <?php
                    echo form_checkbox(['name'=> 'estarvivo', 'id' => 'estarvivo', 'value' => '1']);
                    ?>
                </td>
            </tr>

            <tr>
                <td><label for="inutil">¿Actualmente se siente inutil o despreciable?</label></td>
                <td>
                    <input type="hidden" name="inutil" value="0" >
                    <?php
                    echo form_checkbox(['name' => 'inutil', 'id' => 'inutil', 'value' => '1']);
                    ?>
                </td>
            </tr>

            <tr>
                <td><label for="energia">¿Se siente lleno de energía?</label></td>
                <td>
                    <input type="hidden" name="energia" value="0" >
                    <?php
                    echo form_checkbox(['name' => 'energia', 'id' => 'energia', 'value' => '1']);
                    ?>
                </td>
            </tr>

            <tr>
                <td><label for="sinesperanza">¿Se siente sin esperanzas actualmente?</label></td>
                <td>
                    <input type="hidden" name="sinesperanza" value="0" >
                    <?php
                    echo form_checkbox(['name' => 'sinesperanza', 'id' => 'sinesperanza', 'value' => '1']);
                    ?>
                </td>
            </tr>

            <tr>
                <td><label for="otrosmejor">¿Cree usted que las demás personas están, en general, mejor que usted?</label></td>
                <td>
                    <input type="hidden" name="otrosmejor" value="0" >
                    <?php
                    echo form_checkbox(['name' => 'otrosmejor', 'id' => 'otrosmejor', 'value' => '1']);
                    ?>
                </td>
            </tr>
        </table>
        <div class="clearfix"><br></div>
        <div class="col-md-12">
            <?php echo input_textarea('quepreocupa', $view, "¿Qué cosas le preocupan?") ?>
        </div>
        <div class="col-md-12">
            <?php echo input_textarea('quetriste', $view, "¿Qué cosas le ponen triste?") ?>
        </div>
        <div class="col-md-12">
            <?php echo input_textarea('quemolesta', $view, "¿Qué cosas le molestan?") ?>
        </div>
        <div class="col-md-6">
            <?php echo input_textarea('horasduerme', $view, "¿Cuántas horas duerme al día?") ?>
        </div>
        <div class="col-md-6">
            <div class="checkbox">
                <label for="duerme">
                    <input type="hidden" name="duerme" value="0">
                    <?php
                    echo form_checkbox(['name' => 'duerme', 'id' => 'duerme', 'value' => '1']);
                    ?>
                    ¿Duerme bien?
                </label>
            </div>
        </div>

        <div class="col-md-12">
            <?php echo input_textarea('noharia', $view, "Si volviera a nacer, ¿Qué no haría?") ?>
        </div>
        <div class="col-md-12">
            <label>Depresión</label>
        </div>
        <div class="col-md-12">
            <?php echo input_button_radio('depresion', $view, '', [
                'Ausente' => 'Ausente',
                'Moderada' => 'Moderada',
                'Severa' => 'Severa'
            ], 'Ausente') ?>
        </div>
    </div>
    <div class="col-md-12">
        <h3>2.3 Area familiar</h3>
    </div>
    <div class="col-md-12">
        <div class="col-md-12">
            <?php echo input_textarea('familia', $view, "Área familiar") ?>
        </div>
    </div>
    <div class="col-md-12">
        <h3>2.4 Area social</h3>
    </div>
    <div class="col-md-12">
        <div class="col-md-12">
            <?php echo input_textarea('socialanterior', $view, "Anterior") ?>
        </div>
        <div class="col-md-12">
            <?php echo input_textarea('socialactual', $view, "Actual: ¿Quiénes son sus amigos?") ?>
        </div>
        <div class="col-md-6">
            <?php echo input_text('lollamavisita', $view, "¿Cada cuánto lo llaman o visitan sus amigos?") ?>
        </div>
        <div class="col-md-6">
            <?php echo input_text('llamavisita', $view, "¿Cada cuánto llama o visita a sus amigos?") ?>
        </div>
    </div>
    <div class="col-md-12">
        <h3>2.5 Area recreativa</h3>
    </div>
    <div class="col-md-12">
        <div class="col-md-6">
            <?php echo input_textarea('divierte', $view, "¿Cómo se divierte?") ?>
        </div>
        <div class="col-md-6">
            <?php echo input_textarea('gustadivertirse', $view, "¿Cómo le gustaría divertirse?") ?>
        </div>
    </div>
    <div class="col-md-12">
        <h3>2.6 Area afectiva</h3>
    </div>
    <div class="col-md-12">
        <div class="col-md-12">
            <?php echo input_text('quienesvisita', $view, "¿Quiénes la visitan y cada cuánto?") ?>
        </div>
        <div class="col-md-12">
            <?php echo input_text('quienestelefono', $view, "¿Con quién mantiene contacto telefónico y cada cuánto?") ?>
        </div>
    </div>
    <div class="col-md-12">
        <h3>2.7 Area laboral</h3>
    </div>
    <div class="col-md-12">
        <div class="col-md-2">
            <div class="form-group">
                <label for="tienetrabajo">¿Trabajó?<br>
                    <input type="hidden" name="tienetrabajo" value="0">
                    <?php
                    echo form_checkbox(['name' => 'tienetrabajo', 'id' => 'tienetrabajo', 'value' => '1' ]);
                    ?>
                    <br>

                </label>
            </div>
        </div>
        <div class="col-md-5">
            <?php echo input_text('desdedad', $view, "¿Dese qué edad?") ?>
        </div>
        <div class="col-md-5">
            <?php echo input_text('hacecuantodejo', $view, "¿Cuánto hace que dejó de trabajar?") ?>
        </div>
        <div class="col-md-12">
            <?php echo input_textarea('labores', $view, "¿Qué labores realizó?") ?>
        </div>

    </div>
    <div class="col-md-12">
        <h3>2.8 Area religiosa</h3>
    </div>
    <div class="col-md-12">
        <?php echo input_textarea('areareligiosa', $view) ?>
    </div>
    <div class="col-md-12">
        <h3>2.9 Percepción de la Fundación</h3>
    </div>
    <div class="col-md-12">
        <div class="col-md-6">
            <?php echo input_text('actividadesdificil', $view, "¿Qué actividades que realiza se le dificultan?") ?>
        </div>
        <div class="col-md-6">
            <?php echo input_text('actividadesgustaria', $view, "¿Qué actividades le gustaría realizar?") ?>
        </div>
        <div class="col-md-6">
            <?php echo input_text('fundacionbrinda', $view, "¿Qué le gustaría que la fundación brindara para sentirse feliz?") ?>
        </div>
        <div class="col-md-6">
            <?php echo input_text('gustariahacer', $view, "¿Si tuviera la oportunidad, ¿Qué le gustaría hacer?") ?>
        </div>
    </div>
    <div class="col-md-12">
        <h3>2.10 Proyecto de vida</h3>
    </div>
    <div class="col-md-12">
        <div class="col-md-12">
            <?php echo input_text('deseahacervida', $view, "¿Qué es lo que más desea hacer en su vida?") ?>
        </div>
        <div class="col-md-12">
            <?php echo input_textarea('en6meses', $view, "¿Qué es lo que le gustaría estar haciendo en 6 meses, cuándo y cómo empezaría?") ?>
        </div>
        <div class="col-md-12">
            <?php echo input_textarea('en1anio', $view, "¿Qué es lo que le gustaría estar haciendo en 1 año, cuándo y cómo empezaría?") ?>
        </div>
        <div class="col-md-12">
            <?php echo input_textarea('satisfechovida', $view, "¿Se siente satisfecho con como está llevando su vida actualmente? ¿Qué le cambiaría?") ?>
        </div>
        <div class="col-md-12">
            <?php echo input_textarea('comprar', $view, "¿Qué le gustaría comprar?") ?>
        </div>
    </div>
</div>
<div class="col-md-12">
    <h2>3) Aspectos neuropsicológicos</h2>
</div>
<div class="col-md-12">
    <div class="col-md-3">
        <?php echo input_text('puntajeorientacion', $view, "Puntaje prueba de orientación") ?>
    </div>
    <div class="col-md-3">
        <?php echo input_text('puntajememoria', $view, "Puntaje prueba de memoria") ?>
    </div>
    <div class="col-md-3">
        <?php echo input_text('puntajecalculo', $view, "Puntaje prueba atención y cálculo") ?>
    </div>
    <div class="col-md-3">
        <?php echo input_text('puntajeevocacion', $view, "Puntaje prueba de evocación") ?>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-3">
        <?php echo input_text('puntaje2objetos', $view, "Puntaje prueba de lenguaje: denominar 2 objetos") ?>
    </div>
    <div class="col-md-3">
        <?php echo input_text('puntajerepetir', $view, "Puntaje prueba de lenguaje: Repetición") ?>
    </div>
    <div class="col-md-3">
        <?php echo input_text('puntajeobedecer', $view, "Puntaje prueba de lenguaje: Comprensión") ?>
    </div>
    <div class="col-md-3">
        <?php echo input_text('puntajeleeobedece', $view, "Puntaje prueba de lenguaje: Leer y obedecer") ?>
    </div>
    <div class="col-md-3">
        <?php echo input_text('puntajeescribefrase', $view, "Puntaje prueba de lenguaje: Escribir una frase") ?>
    </div>
    <div class="col-md-3">
        <?php echo input_text('puntajemilitarcrus', $view, "Puntaje prueba de lenguaje: Saludo militar y signo de la cruz") ?>
    </div>
    <div class="col-md-3">
        <?php echo input_text('puntajecopia', $view, "Puntaje prueba de lenguaje: Copiar diseño") ?>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-12">
        <h3>Pensamiento abstracto</h3>
    </div>
    <div class="col-md-12">
        <div class="col-md-4">
            <?php echo input_text('similarfrutas', $view, "Similitudes: ¿En qué son similares las uvas y el banano?") ?>
        </div>
        <div class="col-md-4">
            <?php echo input_text('similarropa', $view, "Similitudes: ¿En qué se parecen el saco pantalón?") ?>
        </div>
        <div class="col-md-4">
            <?php echo input_text('similaranimal', $view, "Similitudes: ¿En qué se parecen el perro y la gallina?") ?>
        </div>
        <div class="col-md-6">
            <?php echo input_text('refrancaballo', $view, "Respuesta a refrán 1") ?>
        </div>
        <div class="col-md-6">
            <?php echo input_text('refranrio', $view, "Respuesta a refrán 2") ?>
        </div>
        <div class="col-md-12">
            <?php echo input_text('solucioninunda', $view, "Imagínese que anoche llovió muy fuerte y hoy cuando se levantó se da cuenta que todo está inundado
                    y el agua le da hasta los tobillos. ¿Qué haría ud?") ?>
        </div>
        <div class="col-md-4">
            <?php echo input_text('memoriadesayuno', $view, "¿Qué desayunó?") ?>
        </div>
        <div class="col-md-4">
            <?php echo input_text('memoriaalmuerzo', $view, "¿Qué almorzó?") ?>
        </div>
        <div class="col-md-4">
            <?php echo input_text('memoriaayer', $view, "¿Qué hizo ayer?") ?>
        </div>
        <div class="col-md-12">
            <?php echo input_text('praxiafosforos', $view, "Resultado: Suponga que tiene en su mano una caja de cigarrillos y una caja de fósforos. Encienda el cigarrillo") ?>
        </div>
        <div class="col-md-12">
            <?php echo input_text('praxiamartillo', $view, "Resultado: Suponga que tiene en su mano un martillo y una puntilla. ¿Cómo haría para clava la puntilla?") ?>
        </div>
    </div>
    <div class="col-md-12">
        <h3>Integridad comportamental</h3>
    </div>
    <div class="col-md-12">
        <table border=1 style="width:100%">
            <tr>
                <td><label for="olvidointencion">Olvido frecuente de intenciones</label></td>
                <td>
                    <input type="hidden" name="olvidointencion" value="0">
                    <?php
                    echo form_checkbox(['name' => 'olvidointencion', 'id' => 'olvidointencion', 'value' => '1']);
                    ?>
                </td>
                <td><label for="Defectoatencion">Defectos de atención</label></td>
                <td>
                    <input type="hidden" name="defectoatencion" value="0">
                    <?php
                    echo form_checkbox(['name' => 'defectoatencion', 'id' => 'defectoatencion', 'value' => '1']);
                    ?>
                </td>
            </tr>
            <tr>
                <td><label for="Esfinteres">Pérdida de control de esfínteres</label></td>
                <td>
                    <input type="hidden" name="esfinteres" value="0">
                    <?php
                    echo form_checkbox(['name' => 'esfinteres', 'id' => 'esfinteres', 'value' => '1']);
                    ?>
                </td>
                <td><label for="Desconfianza">Desconfianza exagerada</label></td>
                <td>
                    <input type="hidden" name="desconfianza" value="0">
                    <?php
                    echo form_checkbox(['name' => 'desconfianza', 'id' => 'desconfianza', 'value' => '1']);
                    ?>
                </td>
            </tr>
            <tr>
                <td><label for="Agresividadverbal">Agresividad verbal</label></td>
                <td>
                    <input type="hidden" name="agresividadverbal" value="0">
                    <?php
                    echo form_checkbox(['name' => 'agresividadverbal', 'id' => 'agresividadverbal', 'value' => '1']);
                    ?>
                </td>

                <td><label for="Tendenciasmalas">Tendencia al alcohol, drogas, etc</label></td>
                <td>
                    <input type="hidden" name="tendenciasmalas" value="0">
                    <?php
                    echo form_checkbox(['name' => 'tendenciasmalas', 'id' => 'tendenciasmalas', 'value' => '1']);
                    ?>
                </td>
            </tr>
            <tr>
                <td><label for="Fatiga">Fatiga</label></td>
                <td>
                    <input type="hidden" name="fatiga" value="0">
                    <?php
                    echo form_checkbox(['name' => 'fatiga', 'id' => 'fatiga', 'value' => '1']);
                    ?>
                </td>

                <td><label for="Descuidopersonal">Descuido personal</label></td>
                <td>
                    <input type="hidden" name="descuidopersonal" value="0">
                    <?php
                    echo form_checkbox(['name' => 'descuidopersonal', 'id' => 'descuidopersonal', 'value' => '1']);
                    ?>
                </td>
            </tr>
            <tr>
                <td><label for="Rupturanormas">Ruptura de normas sociales</label></td>
                <td>
                    <input type="hidden" name="rupturanormas" value="0">
                    <?php
                    echo form_checkbox(['name' => 'rupturanormas', 'id' => 'rupturanormas', 'value' => '1']);
                    ?>
                </td>
                <td><label for="Labialidad">Labialidad emocional</label></td>
                <td>
                    <input type="hidden" name="labialidad" value="0">
                    <?php
                    echo form_checkbox(['name' => 'labialidad', 'id' => 'labialidad', 'value' => '1']);
                    ?>
                </td>
            </tr>
            <tr>
                <td><label for="Celos">Celos exagerados</label></td>
                <td>
                    <input type="hidden" name="celos" value="0">
                    <?php
                    echo form_checkbox(['name' => 'celos', 'id' => 'celos', 'value' => '1']);
                    ?>
                </td>
                <td><label for="Apatia">Apatia</label></td>
                <td>
                    <input type="hidden" name="apatia" value="0">
                    <?php
                    echo form_checkbox(['name' => 'apatia', 'id' => 'apatia', 'value' => '1']);
                    ?>
                </td>
            </tr>
            <tr>
                <td><label for="Irrita">Irritabilidad</label></td>
                <td>
                    <input type="hidden" name="irrita" value="0">
                    <?php
                    echo form_checkbox(['name' => 'irrita', 'id' => 'irrita', 'value' => '1']);
                    ?>
                </td>
            </tr>
        </table>
    </div>
</div>
<div class="clearfix">&nbsp;</div>
<div class="col-md-12">
    <?php echo input_textarea('impresion', $view, "Impresión diagnóstica") ?>
</div>
<div class="col-md-12">
    <?php echo input_flatpickr('fechahora', $view, "Fecha de terminación de la evaluación") ?>
</div>

<?php $this->load->view('layout/footer_formato_form', ['scripts' => [
    'vendors/flatpickr/flatpickr.min.js',
    'vendors/flatpickr/es.js',
]]) ?>
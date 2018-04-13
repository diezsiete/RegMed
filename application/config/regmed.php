<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
//adding config items.
$config['formatos'] = [
    //Formatos enfermeria
    'e07' => [
        'titulo' => 'Suministro de medicamentos',
        'roles' => [1, 7],
        'codigo' => 'e07'
    ],
    'e07c' => [
        'titulo' => 'Control suministro de medicamentos',
        'roles' => [1, 2, 7]
    ],
    'e08' => [
        'titulo' => 'Signos vitales',
        'codigo' => 'e08'
    ],
    'e08bis' => [
        'titulo' => 'Signos vitales en situacion particular',
        'codigo' => 'e08bis'
    ],
    'e14' => [
        'titulo' => 'Seguimiento enfermería',
        'codigo' => 'e14'
    ],
    'e28' => [
        'titulo' => 'Resumen de control de peso',
        'codigo' => 'e28'
    ],
    'curacion' => [
        'titulo' => 'Curaciones',
    ],
    //Formatos nutricion
    'e35' => [
        'titulo' => 'Valoración nutricionista',
        'codigo' => 'e35'
    ],
    'e24' => [
        'titulo' => 'Seguimiento dietas',
        'consulta_cols' => [],
        'codigo' => 'e24'
    ],
    //Formatos medico
    'e10' => [
        'titulo' => 'Historia clinica',
        'codigo' => 'e10'
    ],
    'e23' => [
        'titulo' => 'Notas de seguimiento',
        'codigo' => 'e23'
    ],
    //Formatos Fisioterapia
    'e21' => [
        'titulo' => 'Valoración fisioterapia',
        'codigo' => 'e21'
    ],
    //Formatos psicologia
    'e36' => [
        'titulo' => 'Evaluación Psicologica',
        'codigo' => 'e36',
    ],
    //Administracion
    'residente' => [
        'titulo' => 'Residente',
        'roles'  => [1, 7],
        'controller' => 'residente',
    ],
    'acudiente' => [
        'titulo' => 'Acudiente',
        'roles' => [1, 7],
        'controller' => 'residente',
    ]
    ,
    'objeto' => [
        'titulo' => 'Objeto personal',
        'roles' => [1, 7],
        'controller' => 'residente',
    ],
    'usuario' => [
        'titulo' => 'Usuario',
        'roles' => [1, 7],
        'controller' => 'usuario'
    ]
];
$config['modulos'] = [
    'enfermeria' => [
        'titulo' => 'Enfermería',
        'formatos' => ['e07', 'e07c', 'e08', 'e08bis', 'e14', 'e28', 'curacion'],
        'consulta' => [
            'enfermeria' => ['e07', 'e07c', 'e08', 'e08bis', 'e14', 'e28', 'curacion'],
            'medico' => ['e10', 'e23']
        ],
        'roles' => [1, 2, 7],
        'residente' => true,
    ],
    'nutricion' => [
        'titulo' => 'Nutrición',
        'formatos' => ['e35', 'e24'],
        'consulta' => [
            'nutricion' => ['e35', 'e24'],
            'enfermeria' => ['e07', 'e07c', 'e08', 'e08bis', 'e14'],
            'medico' => ['e10', 'e23']
        ],
        'roles' => [1, 4],
        'residente' => true,
    ],
    'medico' => [
        'titulo' => 'Medico',
        'formatos' => ['e10', 'e23'],
        'consulta' => [
            'medico' => ['e10', 'e23'],
            'enfermeria' => ['e07', 'e07c', 'e08', 'e08bis', 'e14'],
            'nutricion' => ['e35', 'e24'],
        ],
        'roles' => [1, 3],
        'residente' => true,
    ],
    'fisioterapia' => [
        'titulo' => 'Fisioterapia',
        'formatos' => ['e21'],
        'consulta' => [
            'fisioterapia' => ['e21'],
            'medico' => ['e10']
        ],
        'roles' => [1, 5],
        'residente' => true,
    ],
    'psicologia' => [
        'titulo' => 'Psicología',
        'formatos' => ['e36'],
        'consulta' => [
            'psicologia' => ['e36'],
            'medico' => ['e10'],
            'fisioterapia' => ['e21']
        ],
        'roles' => [1, 6],
        'residente' => true,
    ],
    'administracion' => [
        'titulo' => 'Administración',
        'formatos' => ['residente', 'usuario', 'acudiente', 'objeto', 'usuario'],
        'consulta' => [
            'administracion' => ['residente', 'usuario', 'acudiente', 'objeto', 'usuario']
        ],
        'roles' => [1, 7],
        'residente' => false
    ]
];

$config['formatos_consulta'] = [
    'e07' => ['cols' => [
        ['fn'   => 'getFechaHora', 'label' => 'Fecha creación'],
        ['attr' => 'usuario_id', 'label' => 'Usuario'],
        ['fn'   => 'getMedNombre', 'label' => 'Medicamento'],
        ['attr' => 'dosis', 'label' => 'Dosis'],
        ['fn'   => 'getHorasDosisBadges', 'label' => 'Horas dósis'],
        ['attr' => 'observaciones', 'label' => 'Observaciones']
    ]],
    'e07c' => ['cols' => [

    ]],
    'e08' => ['cols' => [
        ['attr' => 'id', 'label' => '#'],
        ['attr' => 'usuario_id', 'label' => 'Usuario'],
        ['fn'   => 'getFechaHora', 'label' => 'Fecha control'],
        ['attr' => 'tension_arterial', 'label' => 'Tensión arterial'],
        ['attr' => 'frecuencia_cardiaca', 'label' => 'Freq. cardiaca'],
        ['attr' => 'frecuencia_respiratoria', 'label' => 'Freq. respiratoria'],
        ['attr' => 'saturacion', 'label' => 'Saturación O2'],
        ['attr' => 'temperatura', 'label' => 'Temperatura'],
        ['attr' => 'peso', 'label' => 'Peso'],
        ['attr' => 'glucometria', 'label' => 'Glucometría'],
    ]],
    'e08bis' => ['cols' => [
        ['attr' => 'usuario_id', 'label' => 'Usuario'],
        ['fn'   => 'getFechaHora', 'label' => 'Fecha control'],
        ['attr' => 'tension_arterial', 'label' => 'Tensión arterial'],
        ['attr' => 'frecuencia_cardiaca', 'label' => 'Freq. cardiaca'],
        ['attr' => 'observaciones', 'label' => 'Observaciones'],
        ['attr' => 'tratamiento', 'label' => 'Tratamiento'],
        ['attr' => 'diagnostico', 'label' => 'Diagnóstico']
    ]],
    'e14' => ['cols' => [
        ['attr' => 'usuario_id', 'label' => 'Usuario'],
        ['fn'   => 'getFechaHora', 'label' => 'Fecha'],
        ['fn'   => 'getResumen', 'label' => 'Resumen'],
        ['attr' => 'observaciones', 'label' => 'Observaciones'],
        /*['attr' => 'bano', 'label' => 'Baño'],
        ['attr' => 'alimentacion', 'label' => 'Alimentación'],
        ['attr' => 'lubricacion', 'label' => 'Lub.'],
        ['attr' => 'orientacion', 'label' => 'Orientación'],
        ['attr' => 'curacion', 'label' => 'Curación'],
        ['attr' => 'terapia_fisica', 'label' => 'T.Física'],
        ['attr' => 'terapia_ocupacional', 'label' => 'T.Ocupa.'],
        ['attr' => 'eliminacion', 'label' => 'Eliminación'],
        ['attr' => 'sueno', 'label' => 'Sueño'],
        ['attr' => 'deambulacion', 'label' => 'Deambula.']*/
    ]],
    'e28' => ['cols' => [
        ['attr' => 'usuario_id', 'label' => 'Usuario'],
        ['fn'   => 'getFechaHora', 'label' => 'Fecha control'],
        ['attr' => 'peso', 'label' => 'Peso'],
        ['attr' => 'gluco', 'label' => 'Glucosa'],
        ['attr' => 'evol', 'label' => 'Evolución']
    ]],
    'curacion' => ['cols' => [
        ['attr' => 'usuario_id', 'label' => 'Usuario'],
        ['fn'   => 'getFechaHora', 'label' => 'Fecha control'],
        ['attr' => 'tipo_curacion', 'label' => 'Tipo curación'],
        ['attr' => 'acciones', 'label' => 'Acciones']

    ]],
    //Formatos nutricion
    'e35' => ['cols' => [
        ['fn'   => 'getFechaHora', 'label' => 'Fecha control'],
        ['attr' => 'peso', 'label' => 'Peso'],
        ['attr' => 'talla', 'label' => 'Talla'],
        ['attr' => 'problema_digestivo', 'label' => 'Probl. Digest.'],
        ['fn'   => 'getIndicadoresHtml', 'label' => 'Indicadores']
    ]],
    'e24' => ['cols' => [
        ['fn'   => 'getFechaHora', 'label' => 'Fecha control'],
        ['attr' => 'peso', 'label' => 'Peso'],
        ['attr' => 'peso_imc', 'label' => 'IMC'],
    ]],
    //Formatos medico
    'e10' => ['cols' => [
        ['fn'   => 'getFechaHora', 'label' => 'Fecha control'],
        ['attr' => 'peso', 'label' => 'Peso'],
        ['attr' => 'talla', 'label' => 'Talla'],
        ['attr' => 'tension_arterial', 'label' => 'Tensión'],
        ['attr' => 'frecuencia_respiratoria', 'label' => 'Freq. respi.'],
        ['attr' => 'frecuencia_cardiaca', 'label' => 'Freq. respi.'],
        ['attr' => 'temperatura', 'label' => 'Temp.']
    ]],
    'e23' => ['cols' => [
        ['fn'   => 'getFechaHora', 'label' => 'Fecha control'],
        ['attr' => 'observaciones', 'label' => 'Peso'],
        ['attr' => 'recomendaciones', 'label' => 'Talla'],
    ]],
    //formatos fisioterapia
    'e21' => ['cols' => [
        ['fn' => 'getFechaHora', 'label' => 'Fecha control'],
        ['attr' => 'valdolor', 'label' => 'Valoración dolor']
    ]],
    //Formatos psicologia
    'e36' => ['cols' => [
        ['attr' => 'usuario_id', 'label' => 'Usuario'],
        ['fn' => 'getFechaHora', 'label' => 'Fecha control'],
    ]],
    //Administracion
    'acudiente' => ['cols' => [
        ['attr' => 'cedula', 'label' => 'Cedula'],
        ['attr' => 'nombre', 'label' => 'Nombre'],
        ['attr' => 'direccion', 'label' => 'Dirección'],
        ['attr' => 'telefono', 'label' => 'Teléfono'],
        ['attr' => 'celular', 'label' => 'Celular'],
        ['attr' => 'email', 'label' => 'Email'],
        ['attr' => 'parentesco', 'label' => 'Parentesco']
    ]],
    'objeto' => ['cols' => [
        ['attr' => 'nombre', 'label' => 'Nombre'],
        ['attr' => 'descripcion', 'label' => 'Descripcion'],
        ['attr' => 'estado', 'label' => 'Estado']
    ]],
    'usuario' => ['cols' => [
        ['attr' => 'id', 'label' => 'usuario'],
        ['attr' => 'cedula', 'label' => 'Cédula'],
        ['attr' => 'nombre', 'label' => 'Nombre'],
        ['attr' => 'celular', 'label' => 'Celular'],
        ['fn' => 'getEstadoLabel', 'label' => 'Estado'],
        ['attr' => 'rol', 'label' => 'Rol']
    ]],
];


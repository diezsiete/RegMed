<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
//adding config items.
$config['formatos'] = [
    //Formatos enfermeria
    'e07' => [
        'titulo' => 'Suministro de medicamentos',
        'codigo' => 'e07',
        'permiso' => ['C' => [7, 8], 'R' => [7, 8], 'U' => [7, 8], 'D' => [7, 8]]
    ],
    'e07c' => [
        'titulo' => 'Control suministro de medicamentos',
        'permiso' => ['C' => [2, 7, 8], 'R' => [2, 3, 4, 7, 8], 'U' => [8], 'D' => [8]]
    ],
    'e08' => [
        'titulo' => 'Signos vitales',
        'codigo' => 'e08',
        'permiso' => ['C' => [2, 7, 8], 'R' => [2, 3, 4, 7, 8], 'U' => [8], 'D' => [8]]
    ],
    'e08bis' => [
        'titulo' => 'Signos vitales en situacion particular',
        'codigo' => 'e08bis',
        'permiso' => ['C' => [2, 7, 8], 'R' => [2, 3, 4, 7, 8], 'U' => [8], 'D' => [8]]
    ],
    'e14' => [
        'titulo' => 'Seguimiento enfermería',
        'codigo' => 'e14',
        'permiso' => ['C' => [2, 7, 8], 'R' => [2, 3, 4, 7, 8], 'U' => [8], 'D' => [8]]
    ],
    'e28' => [
        'titulo' => 'Resumen de control de peso',
        'codigo' => 'e28',
        'permiso' => ['C' => [2, 7, 8], 'R' => [2, 7, 8], 'U' => [8], 'D' => [8]]
    ],
    'curacion' => [
        'titulo' => 'Curaciones',
        'permiso' => ['C' => [2, 7, 8], 'R' => [2, 7, 8], 'U' => [8], 'D' => [8]]
    ],
    //Formatos nutricion
    'e35' => [
        'titulo' => 'Valoración nutricionista',
        'codigo' => 'e35',
        'permiso' => ['C' => [4, 8], 'R' => [3, 4, 8], 'U' => [8], 'D' => [8]]
    ],
    'e24' => [
        'titulo' => 'Seguimiento dietas',
        'codigo' => 'e24',
        'permiso' => ['C' => [4, 8], 'R' => [3, 4, 8], 'U' => [8], 'D' => [8]]
    ],
    //Formatos medico
    'e10' => [
        'titulo' => 'Historia clinica',
        'codigo' => 'e10',
        'permiso' => ['C' => [3, 8], 'R' => [2, 3, 4, 5, 6, 7, 8], 'U' => [8], 'D' => [8]]
    ],
    'e23' => [
        'titulo' => 'Notas de seguimiento',
        'codigo' => 'e23',
        'permiso' => ['C' => [3, 8], 'R' => [2, 3, 4, 7, 8], 'U' => [8], 'D' => [8]]
    ],
    //Formatos Fisioterapia
    'e21' => [
        'titulo' => 'Valoración fisioterapia',
        'codigo' => 'e21',
        'permiso' => ['C' => [5, 8], 'R' => [5, 6, 8], 'U' => [8], 'D' => [8]]
    ],
    //Formatos psicologia
    'e36' => [
        'titulo' => 'Evaluación Psicologica',
        'codigo' => 'e36',
        'permiso' => ['C' => [6, 8], 'R' => [6, 8], 'U' => [8], 'D' => [8]]
    ],
    //Administracion
    'residente' => [
        'titulo' => 'Residentes',
        'controller' => 'residente',
        'permiso' => ['C' => [1, 7, 8], 'R' => [1, 2, 7, 8], 'U' => [1, 7, 8], 'D' => [8]]
    ],
    'acudiente' => [
        'titulo' => 'Acudiente',
        'controller' => 'residente',
        'permiso' => ['C' => [1, 7, 8], 'R' => [1, 2, 7, 8], 'U' => [1, 7, 8], 'D' => [8]]
    ]
    ,
    'objeto' => [
        'titulo' => 'Objeto personal',
        'controller' => 'residente',
        'permiso' => ['C' => [1, 7, 8], 'R' => [1, 2, 7, 8], 'U' => [1, 7, 8], 'D' => [8]]
    ],
    'usuario' => [
        'titulo' => 'Usuarios',
        'controller' => 'usuario',
        'permiso' => ['C' => [1, 8], 'R' => [1, 8], 'U' => [1, 8], 'D' => [8]]
    ],
    'e14global' => [
        'titulo' => 'Seguimiento enfermería global',
        'controller' => 'enfermeria',
        'permiso' => ['C' => [2, 7, 8], 'R' => [2, 7, 8], 'U' => [], 'D' => []],
        'codigo' => 'e14'
    ]
];
$config['modulos'] = [
    'enfermeria' => [
        'titulo' => 'Enfermería',
        'formatos' => ['e07', 'e07c', 'e08', 'e08bis', 'e14', 'e28', 'curacion'],
        'residente' => true,
    ],
    'nutricion' => [
        'titulo' => 'Nutrición',
        'formatos' => ['e35', 'e24'],
        'residente' => true,
    ],
    'medico' => [
        'titulo' => 'Medico',
        'formatos' => ['e10', 'e23'],
        'residente' => true,
    ],
    'fisioterapia' => [
        'titulo' => 'Fisioterapia',
        'formatos' => ['e21'],
        'residente' => true,
    ],
    'psicologia' => [
        'titulo' => 'Psicología',
        'formatos' => ['e36'],
        'residente' => true,
    ],
    'administracion' => [
        'titulo' => 'Administración',
        'formatos' => ['residente', 'usuario', 'acudiente', 'objeto', 'e14global'],
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


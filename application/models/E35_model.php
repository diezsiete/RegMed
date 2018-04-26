<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once ENTITIES_DIR . 'E35Entity.php';

class E35_model extends MY_Model
{
    protected $table = 'e35';
    protected $entityClass = 'E35Entity';
    
    public $fields = [
        ['field' => 'residente_cedula','label' => 'Cedula','rules' => 'trim|required|max_length[20]|numeric'],
        ['field' => 'fechahora','label' => 'Hora de Registro',  'rules' => 'trim|required|max_length[200]'],
        ['field' => 'peso',         'label' => 'Peso Actual',       'rules' => 'trim|required|max_length[20]|numeric'],
        ['field' => 'peso_conv',     'label' => 'Peso Conveniente',  'rules' => 'trim|max_length[20]|numeric'],
        ['field' => 'talla',        'label' => 'Talla Actual',      'rules' => 'trim|required|max_length[20]|numeric'],
        ['field' => 'altura_rodilla','label' => 'Altura Rodilla',    'rules' => 'trim|max_length[20]|numeric'],
        ['field' => 'carpo',        'label' => 'C Carpo',           'rules' => 'trim|max_length[20]|numeric'],
        ['field' => 'cir_brazo',     'label' => 'Circunferencia Brazo','rules' => 'trim|max_length[20]|numeric'],
        ['field' => 'estructura_corporal','label' => 'Estructura Corporal','rules' => 'trim|max_length[20]|numeric'],
        ['field' => 'imc',          'label' => 'IMC',               'rules' => 'trim|required|max_length[20]'],
        ['field' => 'estado_nutricional','label' => 'Estado Nutricional', 'rules' => 'trim|required|max_length[200]'],
        ['field' => 'diagnostico_medico','label' => 'Diagnostico Medico', 'rules' => 'trim|max_length[300]'],
        ['field' => 'problema_digestivo','label' => 'Problema Digestivo', 'rules' => 'trim|max_length[30]'],
        ['field' => 'examenes_laboratorio','label' => 'Examenes de Laboratorio', 'rules' => 'trim|max_length[300]'],
        ['field' => 'tratamiento_nutricional', 'label' => 'Tratamiento nutricional', 'rules' => 'trim|max_length[300]'],
        ['field' => 'observaciones', 'label' => 'Observaciones y Recomendaciones', 'rules' => 'trim|required|max_length[300]'],
        ['field' => 'otros',        'label' => 'Otros',             'rules' => 'trim|max_length[300]'],
        ['field' => 'cabello_facil', 'label' => 'CabelloFacial',     'rules' => 'trim|max_length[1]'],
        ['field' => 'palidez',      'label' => 'Palidez',           'rules' => 'trim|max_length[1]'],
        ['field' => 'dermatitis',   'label' => 'Dermatitis',        'rules' => 'trim|max_length[1]'],
        ['field' => 'encias',       'label' => 'Encias',            'rules' => 'trim|max_length[1]'],
        ['field' => 'pigmentacion', 'label' => 'Pigmentacion',      'rules' => 'trim|max_length[1]'],
        ['field' => 'edema',        'label' => 'Edema',             'rules' => 'trim|max_length[1]'],
        ['field' => 'glucometria',  'label' => 'Glucometria',       'rules' => 'trim|max_length[11]|numeric']
    ];

}
?>

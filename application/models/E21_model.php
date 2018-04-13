<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once ENTITIES_DIR . 'E21Entity.php';

class E21_model extends MY_Model
{
    
    protected $table = 'e21';
    protected $entityClass = 'E21Entity';

    public $valoracionesDolor = [
        '0'       => 'No dolor (0)',
        '1-3'     => 'Dolor leve (1-3)',
        '4-5'     => 'Moderado (4-5)',
        '6-8'     => 'Intenso (6-8)',
        '9-10'    => 'Insoportable (9-10)',
    ];
    
    public $fields = [
        ['field' => 'residente_cedula', 'rules' => 'trim|required|max_length[20]|numeric', 'label' => 'Cedula'],
        ['field' => 'fechahora',        'rules' => 'required',             'label' => 'Fecha de registro'],
        ['field' => 'antecedentes',     'rules' => 'trim|max_length[300]', 'label' => 'Antecedentes'],
        ['field' => 'obsantropo',       'rules' => 'trim|max_length[300]', 'label' => 'Observaciones de características antropométricas'],
        ['field' => 'obsintegu',        'rules' => 'trim|max_length[300]', 'label' => 'Observaciones de integridad integumentaria'],
        ['field' => 'valdolor',         'rules' => 'trim|max_length[20]',  'label' => 'Valoración de dolor'],
        ['field' => 'obscirculacion',   'rules' => 'trim|max_length[300]', 'label' => 'Observaciones de Circulación'],
        ['field' => 'obsrespira',       'rules' => 'trim|max_length[300]', 'label' => 'Observaciones de ventilación, respiración e intercambio gaseoso'],
        ['field' => 'obsmov',           'rules' => 'trim|max_length[300]', 'label' => 'Observaciones de rango de movimiento y flexibilidad'],
        ['field' => 'obsflex',          'rules' => 'trim|max_length[300]', 'label' => 'Observaciones de flexibilidad'],
        ['field' => 'obsmuscular',      'rules' => 'trim|max_length[300]', 'label' => 'Observaciones de desempeño muscular'],
        ['field' => 'obspostura',       'rules' => 'trim|max_length[300]', 'label' => 'Observaciones de postura'],
        ['field' => 'obscoord',         'rules' => 'trim|max_length[300]', 'label' => 'Observaciones de coordinación'],
        ['field' => 'obseq',            'rules' => 'trim|max_length[300]', 'label' => 'Observaciones de equilibrio'],
        ['field' => 'obsintegridadner', 'rules' => 'trim|max_length[300]', 'label' => 'Observaciones de integridad de nervio periférico'],
        ['field' => 'obsmarcha',        'rules' => 'trim|max_length[300]', 'label' => 'Observaciones de marcha'],
        ['field' => 'obsexfunc',        'rules' => 'trim|max_length[300]', 'label' => 'Observaciones de examen funcional'],
        ['field' => 'obscapaero',       'rules' => 'trim|max_length[300]', 'label' => 'Observaciones de capacidad aeróbica'],
        ['field' => 'diag',             'rules' => 'trim|max_length[300]', 'label' => 'Diagnóstico fisioterapéutico'],
        ['field' => 'pronostico',       'rules' => 'trim|max_length[300]', 'label' => 'Pronóstico'],
        ['field' => 'plantratamiento',  'rules' => 'trim|max_length[300]', 'label' => 'Plan de tratamiento'],
    ];

    
}
?>

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once ENTITIES_DIR . 'E24Entity.php';

class E24_model extends MY_Model
{
    
    protected $table = 'e24';
    protected $entityClass = 'E24Entity';
    
    public $fields = [
        ['field' => 'fechahora','label' => 'Hora de Registro',  'rules' => 'trim|required|max_length[200]'],
        ['field' => 'residente_cedula','label' => 'Cedula',    'rules' => 'trim|required|max_length[20]|numeric'],
        ['field' => 'peso',     'label' => 'Peso',      'rules' => 'trim|required|max_length[20]|numeric'],
        ['field' => 'peso_imc', 'label' => 'IMC',       'rules' => 'trim|required|max_length[20]'],
        ['field' => 'evolucion','label' => 'Evolución', 'rules' => 'trim|required|max_length[200]'],
        ['field' => 'dieta_recomendaciones', 'label' => 'Dietas y recomendaciones', 'rules' => 'trim|required|max_length[200]'],
        ['field' => 'glucometria','label' => 'Glucometria','rules' => 'trim|max_length[11]|numeric'],
    ];
}
?>

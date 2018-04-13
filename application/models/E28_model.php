<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once ENTITIES_DIR . 'E28Entity.php';


class E28_model extends MY_Model
{
    
    protected $table = 'e28';
    protected $entityClass = 'E28Entity';
    
    public $fields = [
        ['field' => 'residente_cedula', 'label' => 'Cedula Residente',  'rules' => 'trim|required|max_length[20]|numeric'],
        ['field' => 'fechahora',        'label' => 'Fecha',             'rules' => 'trim|required'],
        ['field' => 'peso',             'label' => 'Peso',              'rules' => 'trim|required|numeric'],
        ['field' => 'evol',             'label' => 'Evolución',         'rules' => 'trim|required|max_length[1]'],
        ['field' => 'dieta',            'label' => 'Dieta',             'rules' => 'trim|max_length[50]'],
        ['field' => 'gluco',            'label' => 'Glucosa',           'rules' => 'trim|required|max_length[10]|numeric']
    ];
    
    
    public function getLastPeso($cedula)
    {
        $query = $this->db->select('peso')
            ->where('residente_cedula', $cedula)
            ->order_by('id', 'desc')
            ->get($this->table, 1);
        $last_peso = $query->row('peso');
        return $last_peso ? $last_peso + 0 : 0;

    }
}
?>

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require_once ENTITIES_DIR . 'E07Entity.php';


class Acudiente_model extends MY_Model
{
    
    protected $table = 'acudiente';
    //protected $entityClass = 'E07Entity';
    
    public $fields = [
        ['field' => 'residente_cedula', 'label' => 'Cedula Residente',  'rules' => 'trim|required|max_length[20]|numeric'],
        ['field' => 'cedula',           'label' => 'Cedula',            'rules' => 'trim|required|max_length[20]|numeric'],
        ['field' => 'nombre',           'label' => 'Nombre',            'rules' => 'trim|required|max_length[20]'],
        ['field' => 'direccion',        'label' => 'Dirección',         'rules' => 'trim|required|max_length[20]'],
        ['field' => 'telefono',         'label' => 'Telefono',          'rules' => 'trim|required|max_length[10]|numeric'],
        ['field' => 'celular',          'label' => 'Celular',           'rules' => 'trim|max_length[12]|numeric'],
        ['field' => 'email',            'label' => 'Email',             'rules' => 'trim|max_length[50]'],
        ['field' => 'parentesco',       'label' => 'Parentesco',        'rules' => 'trim|required|max_length[20]'],
    ];


    public function findAllResident($cedula, $limit = null, $offset = null)
    {
        $get =  $this->db->select($this->queryCols)
            ->where("residente_cedula", $cedula)
            ->get($this->table, $limit, $offset);
        return $this->result($get);
    }
    public function insert(CI_Input $input, $user = null)
    {
        return parent::insert($input);
    }
}
?>

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require_once ENTITIES_DIR . 'E07Entity.php';


class Objeto_model extends MY_Model
{
    
    protected $table = 'objeto_personal';
    //protected $entityClass = 'E07Entity';
    
    public $fields = [
        ['field' => 'residente_cedula', 'label' => 'Cedula Residente',  'rules' => 'trim|required|max_length[20]|numeric'],
        ['field' => 'nombre',           'label' => 'Nombre',            'rules' => 'trim|required|max_length[20]'],
        ['field' => 'descripcion',      'label' => 'Descripción',       'rules' => 'trim|max_length[200]'],
        ['field' => 'estado',           'label' => 'Estado',            'rules' => 'trim|max_length[20]'],
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

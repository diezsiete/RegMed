<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once ENTITIES_DIR . 'E07Entity.php';
/**
 * Modelo para persistencia  de enfermeria.
 */
class E07_model extends MY_Model
{
    
    protected $table = 'e07';
    protected $entityClass = 'E07Entity';
    
    public $fields = [
        ['field' => 'residente_cedula',     'label' => 'Cedula Residente',  'rules' => 'trim|required|max_length[20]|numeric'],
        ['field' => 'observaciones',        'label' => 'Observaciones',     'rules' => 'trim|max_length[300]'],
        ['field' => 'dosis',                'label' => 'Dosis',             'rules' => 'trim|max_length[15]'],
        ['field' => 'medicamento_nombre',   'label' => 'Medicamento',       'rules' => 'trim|required|max_length[50]'],
        ['field' => 'medicamento_presentacion','label' => 'Presentación',   'rules' => 'trim|required|max_length[25]'],
        ['field' => 'medicamento_cantidad', 'label' => 'Cantidad',          'rules' => 'trim|numeric'],
        ['field' => 'medicamento_via',      'label' => 'Via Administracion','rules' => 'trim|max_length[25]'],
        ['field' => 'medicamento_cantidad_unidad','label' => 'Cantidad unidad','rules' => 'trim|max_length[15]'],
        ['field' => 'medicamento_cantidad_excepcional','label' => 'Cantidad excepcional','rules' => 'trim|max_length[65]'],
    ];

    protected function result($get)
    {
        $result = $get->result();
        $entities = [];
        foreach($result as $row) {
            $hora = $row->hora;
            unset($row->hora);
            if(!isset($entities[$row->id]))
                $entities[$row->id] = new $this->entityClass($row);
            $entities[$row->id]->horas[] = $hora;
        }
        return array_values($entities);
    }


    /**
     * TODO no permitir crear repetidos con mismo medicamento
     * @param CI_Input $input
     * @param null $user
     * @return false|stdClass
     */
    public function insert(CI_Input $input, $user = null)
    {
        $set = [];
        foreach($this->fields as $field)
            $set[$field['field']] = $input->post($field['field'], true);
        if($user)
            $set['usuario_id'] = $user;

        if($set['medicamento_cantidad_excepcional']){
            $set['medicamento_cantidad'] = 0;
            $set['medicamento_cantidad_unidad'] = 0;
        }

        if($this->db->insert($this->table, $set)){
            $id = $this->db->query('SELECT LAST_INSERT_ID()')->row_array()['LAST_INSERT_ID()'];
            $entity = $this->findById($id);
            return $entity;
        }else
            return false;
    }

    public function update(CI_Input $input, $entity, $user = null)
    {
        $set = [];
        foreach($this->fields as $field) {
            $value = $input->post($field['field'], true);
            if(is_array($value))
                $value = implode(',', $value);
            $set[$field['field']] = $value;
        }

        if($user)
            $set['usuario_id'] = $user;

        if($set['medicamento_cantidad_excepcional']){
            $set['medicamento_cantidad'] = 0;
            $set['medicamento_cantidad_unidad'] = 0;
        }

        return $this->db->update($this->table, $set, [$this->primary => $entity->{$this->primary}]);
    }

    public function setRules(CI_Form_validation $form_validation)
    {
        parent::setRules($form_validation);
        $form_validation->set_rules('horas', 'Horas', 'required');
    }

    public function insertHora($e07_id, $residente_cedula, $hora)
    {
        return $this->db->insert('e07_hora', [
            'e07_id' => $e07_id,
            'e07_residente_cedula' => $residente_cedula,
            'hora' => $hora
        ]);
    }
    public function deleteHora($e07_id, $residente_cedula)
    {
        return $this->db->delete('e07_hora', ['e07_id' => $e07_id, 'e07_residente_cedula' => $residente_cedula]);
    }

    public function findAllResident($cedula, $limit = null, $offset = null)
    {
        $get =  $this->db->select($this->queryCols)
            ->join('e07_hora', 'id = e07_id')
            ->where("residente_cedula", $cedula)
            ->order_by('fechahora','desc')
            ->get($this->table, $limit, $offset);
        return $this->result($get);
    }

    public function findById($id)
    {
        $res = $this->db->select($this->queryCols)
            ->from($this->table)
            ->join('e07_hora', 'id = e07_id', 'left')
            ->where($this->primary, $id)
            ->get();
        if($res->num_rows() == 0)
            throw new Exception("El formato '".$this->table."' con id '$id' no existe");
        return $this->result($res)[0];
    }

}
?>

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once ENTITIES_DIR . 'MedicamentoEntity.php';
/**
 * Modelo para persistencia  de enfermeria.
 */
class Medicamento_model extends MY_Model
{
    
    protected $table = 'medicamento';
    protected $entityClass = 'MedicamentoEntity';
    
    public $vias = [
        'Oral' => 'Oral', 
        'Rectal' => 'Rectal', 
        'Parenteral' => 'Parenteral', 
        'Respiratoria' => 'Respiratoria', 
        'Tópica' => 'Tópica'
    ];

    public $unidades = [
        'g' => 'g', 'mg' => 'mg', 'ug' => 'µg', 'ml' => 'ml', 'UI' => 'UI', 'mg/ml' => 'mg/ml', 'g/ml', 'ug/ml' => 'µg/ml'
    ];
    
    public $fields = [
        ['field' => 'nombre',       'label' => 'Nombre',            'rules' => 'trim|required|max_length[50]'],
        ['field' => 'presentacion', 'label' => 'Presentación',      'rules' => 'trim|max_length[15]'],
        ['field' => 'cantidad',     'label' => 'Cantidad',          'rules' => 'trim|numeric'],
        ['field' => 'via',          'label' => 'Via',               'rules' => 'trim|max_length[25]'],
        ['field' => 'cantidad_unidad','label' => 'Unidad',          'rules' => 'trim|max_length[15]'],
        ['field' => 'cantidad_excepcional', 'label' => 'Cantidad excepcional', 'rules' => 'trim|max_length[65]'],
    ];

    public function insert(CI_Input $input, $user = null)
    {
        //TODO: validar que no exista un mismo medicamento con mismos atributos
        $set = [];
        foreach($this->fields as $field) {
            $value = $input->post($field['field'], true);
            if(is_array($value))
                $value = implode(',', $value);
            $set[$field['field']] = $value;
        }
        if($user)
            $set['usuario_id'] = $user;

        if($set['cantidad_excepcional']){
            $set['cantidad'] = "";
            $set['cantidad_unidad'] = null;
        }

        if($this->db->insert($this->table, $set)){
            $id = $this->db->query('SELECT LAST_INSERT_ID()')->row_array()['LAST_INSERT_ID()'];
            $entity = $this->findById($id);
            return $entity;
        }else
            throw new Exception("Error en creación de registro");
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

        if($set['cantidad_excepcional']){
            $set['cantidad'] = "";
            $set['cantidad_unidad'] = null;
        }

        return $this->db->update($this->table, $set, [$this->primary => $entity->{$this->primary}]);
    }

    /**
     * @param E07Entity $e07
     * @return null|MedicamentoEntity
     */
    public function findByE07(E07Entity $e07)
    {

        $get =  $this->db->select($this->queryCols)
            ->where("nombre", $e07->attrs->medicamento_nombre)
            ->where("presentacion", $e07->attrs->medicamento_presentacion)
            ->where("cantidad = ".$e07->getMedicamentoCantidad())
            ->where("via", $e07->attrs->medicamento_via)
            ->get($this->table);
        
        $medicamento = $this->result($get);

        return $medicamento ? $medicamento[0] : null;
    }
}
?>

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(ENTITIES_DIR  . "Entity.php");

class MY_Model extends CI_Model
{
    /**
     * @var string la tabla para este modelo
     */
    protected $table = "";
    protected $primary = "id";
    protected $queryCols = "*";
    protected $entityClass = 'Entity';
    /**
     * @var CI_DB_query_builder
     */
    public $db = null;
    
    public $fields = [];

    /**
     * @var CI_Controller
     */
    protected $CI;

    /**
     * Class constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->CI =& get_instance();
        $this->load->database();
        $this->db = get_instance()->db;
    }

    /**
     * @param CI_DB_result $get
     * @return array
     */
    protected function result($get)
    {
        $result = $get->result();
        $entities = [];
        foreach($result as $row)
            $entities[] = new $this->entityClass($row);
        return $entities;
    }
    
    public function setRules(CI_Form_validation $form_validation)
    {
        foreach($this->fields as $field) {
            $errors = isset($field['errors']) ? $field['errors'] : [];
            $form_validation->set_rules($field['field'], $field['label'], $field['rules'], $errors);
        }
    }

    public function insert(CI_Input $input, $user = null)
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

        return $this->db->update($this->table, $set, ['id' => $entity->id]);
    }

    /**
     * @param Entity $entity
     * @return mixed
     */
    public function delete($entity)
    {
        return $this->db->delete($this->table, ['id' => $entity->id]);
    }

    /**
     * Obtener todos los registros de una tabla
     * @param int $limit
     * @param int $offset
     * @return array
     */
    public function findAll($limit = null, $offset = null)
    {
        $get = $this->db
            ->select($this->queryCols)
            ->get($this->table, $limit, $offset);
        return $this->result($get);
    }
    public function countAll()
    {
        return $this->db->select($this->queryCols)->get($this->table)->num_rows();
    }

    /**
     * Obtener formatos de residente almacenados en la BD ordenados por fecha
     * @param  string $cedula [cédula de la residente]
     * @return array de reportes asociados.
     */
    public function findAllResident($cedula, $limit = null, $offset = null)
    {
        $get =  $this->db->select($this->queryCols)
            ->where("residente_cedula", $cedula)
            ->order_by('fechahora','desc')
            ->get($this->table, $limit, $offset);
        return $this->result($get);
    }
    public function countAllResident($cedula)
    {
        return $this->db->select($this->queryCols)->where("residente_cedula", $cedula)->get($this->table)->num_rows();
    }

    /**
     * Función para obtener de la BD un reporte dada su llave primaria id
     * @param  int $id [identificador único del registro]
     * @return Entity
     * @throws Exception
     */
    public function findById($id)
    {
        $res = $this->db->select($this->queryCols)
            ->from($this->table)
            ->where($this->primary, $id)
            ->get();
        if($res->num_rows() == 0)
            throw new Exception("El formato '".$this->table."' con id '$id' no existe");
        return new $this->entityClass($res->result()[0]);
    }

    /**
     * @param null $cedula
     * @return array
     */
    public function findAllToday($cedula = null)
    {
        $this->db->select($this->queryCols)
            ->from($this->table)
            ->where("DATE(fechahora) = CURDATE()");
        if($cedula)
            $this->db->where('residente_cedula', $cedula);
        $get = $this->db->get();
        return $this->result($get);
    }


    /**
     * atributos de entidad de este modelo se pasan al array $_POST
     * usar en caso de querer que set_value muestre los valores de una entidad
     * @param Entity $entity
     */
    public function entityToPost($entity)
    {
        foreach($this->fields as $field_data)
            $_POST[$field_data['field']] = $entity->{$field_data['field']};
    }
    
    public function getField($field_name)
    {
        $field = [];
        foreach($this->fields as $f)
            if($f['field'] == $field_name)
                $field = $f;
        return $field;
    }
}
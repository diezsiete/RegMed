<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once ENTITIES_DIR . 'ResidenteEntity.php';

class Residente_model extends MY_Model
{

    protected $entityClass = 'ResidenteEntity';
    protected $table = 'residente';
    protected $primary = 'cedula';
    protected $queryCols = '*, DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), fecha_nacimiento)), "%Y")+0 as anos,
        DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), fecha_nacimiento)), "%m")+0 as meses,';

    /**
     * @var CI_DB_query_builder
     */
    public $db = null;
    
    public $fields = [
        ['field' => 'tipo_documento',   'label' => 'Tipo Documento',     'rules' => 'trim|required|max_length[8]'],
        ['field' => 'cedula',          'label' => 'Documento' ,         'rules' => 'trim|required|max_length[20]|numeric'],
        ['field' => 'nombre',          'label' => 'Nombre' ,            'rules' => 'trim|required|max_length[50]'],
        ['field' => 'direccion',       'label' => 'Direccion' ,         'rules' => 'trim|required|max_length[50]'],
        ['field' => 'estrato',         'label' => 'Estrato' ,           'rules' => 'trim|required|max_length[20]|numeric'],
        ['field' => 'genero',          'label' => 'Género' ,            'rules' => 'trim|required|max_length[50]'],
        ['field' => 'etnia',           'label' => 'Etnia' ,             'rules' => 'trim|max_length[50]'],
        ['field' => 'fecha_nacimiento', 'label' => 'fecha Nacimiento' ,  'rules' => 'trim|required'],
        ['field' => 'lugar_nacimiento', 'label' => 'Lugar Nacimiento' ,  'rules' => 'trim|required|max_length[50]'],
        ['field' => 'fecha_ingreso',    'label' => 'fecha Ingreso' ,     'rules' => 'trim|required'],
        ['field' => 'eps',             'label' => 'EPS' ,               'rules' => 'trim|required|max_length[20]'],
        ['field' => 'tipo_contrato',    'label' => 'Tipo Contrato' ,     'rules' => 'trim|required|max_length[20]'],
        ['field' => 'prepagada',       'label' => 'Prepagada' ,         'rules' => 'trim|max_length[20]'],
        ['field' => 'idprepagada',     'label' => 'Contrato Prepagda' , 'rules' => 'trim|max_length[20]|alpha_numeric'],
        ['field' => 'ocupacion_anterior','label' => 'Ocupacion Anterior','rules' => 'trim|max_length[20]'],
        ['field' => 'ambulancia',      'label' => 'Ambulancia' ,        'rules' => 'trim|max_length[20]'],
        ['field' => 'ips',             'label' => 'IPS',                'rules' => 'trim|required|max_length[20]'],
        ['field' => 'servicio_de_urgencias','label' => 'Servicio de Urgencias' ,'rules' => 'trim|max_length[20]'],
        ['field' => 'valor_pension',    'label' => 'ValorPension' ,      'rules' => 'trim|max_length[20]|numeric'],
        ['field' => 'numero_hijos',     'label' => 'Número Hijos' ,      'rules' => 'trim|max_length[20]|required|numeric'],
        ['field' => 'escolaridad',     'label' => 'Escolaridad',        'rules' => 'trim|required'],
        ['field' => 'pensionado',      'label' => 'Pensionado',         'rules' => 'trim|required'],
        ['field' => 'estado_civil',     'label' => 'Estado Civil',       'rules' => 'trim|required'],
        ['field' => 'tipo_plan',        'label' => 'Tipo Plan',          'rules' => 'trim|required'],
        ['field' => 'activo',          'label' => 'Activo',             'rules' => 'trim|required'],
        ['field' => 'motivo_desactivacion', 'label' => 'Motivo desactivación', 'rules' => 'trim|max_length[140]'],
    ];


    public function findAllActive($limit = null, $offset = null)
    {
        $get = $this->db
            ->select($this->queryCols)
            ->where('activo', 'Si')
            ->get($this->table, $limit, $offset);
        return $this->result($get);
    }
    
    public function search($query)
    {
        $this->db->select($this->queryCols);
        $this->db->from($this->table);
        if(is_numeric($query)){
            $this->db->like('cedula', $query);
        }else
            $this->db->like('nombre', $query);
        
        return $this->db->get()->result();
    }

    /**
     * @param CI_Input $input
     * @param null $user
     * @return Entity
     * @throws Exception
     */
    public function insert(CI_Input $input, $user = null)
    {
        try {
            $residente = $this->findById($input->post('cedula'));
        }catch (Exception $e){
            $set = [];
            foreach($this->fields as $field)
                $set[$field['field']] = $input->post($field['field'], true);

            if($this->db->insert($this->table, $set)){
                $entity = $this->findById($set['cedula']);
                $this->uploadPhotoAndUpdateFotoName($entity);
                return $entity;
            }else
                throw new Exception("Error en creación de registro");
        }
        throw new Exception("El residente con cedula '".$residente->cedula."' ya existe");
    }

    public function update(CI_Input $input, $entity, $user = null) {
        $set = [];
        foreach($this->fields as $field)
            $set[$field['field']] = $input->post($field['field'], true);

        if($set['activo'] == "Si")
            $set['motivo_desactivacion'] = null;

        $return = $this->db->update($this->table, $set, [$this->primary => $entity->{$this->primary}]);

        if($return)
            $return = $this->uploadPhotoAndUpdateFotoName($entity);
        return $return;
    }

    /**
     * @param Entity $entity
     * @return mixed
     */
    public function delete($entity)
    {
        return $this->db->delete($this->table, ['cedula' => $entity->cedula]);
    }
}
?>

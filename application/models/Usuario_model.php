<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once ENTITIES_DIR . 'UsuarioEntity.php';

class Usuario_model extends MY_Model
{
    protected $entityClass = 'UsuarioEntity';
    protected $table = 'usuario';
    
    public $fields = [
        ['field' => 'tipo_documento',   'label' => 'Tipo Documento','rules' => 'trim|required|max_length[8]'],
        ['field' => 'cedula',           'label' => 'Documento',     'rules' => 'trim|required|max_length[20]|numeric'],
        ['field' => 'id',               'label' => 'Usuario',       'rules' => 'trim|required|max_length[15]|alpha_dash',
            'errors' => ['alpha_dash' => 'El campo usuario solo puede tener caracteres alfanumericos, guion bajo y guion.']
        ],
        ['field' => 'nombre',           'label' => 'Nombre',        'rules' => 'trim|required|max_length[50]'],
        ['field' => 'celular',          'label' => 'Telefono',      'rules' => 'trim|required|max_length[20]|numeric'],
        ['field' => 'direccion',        'label' => 'Direccion',     'rules' => 'trim|required|max_length[50]'],
        ['field' => 'email',            'label' => 'email',         'rules' => 'required|valid_email|max_length[50]'],
        ['field' => 'rol_id',           'label' => 'Rol',           'rules' => 'required'],
        ['field' => 'estado',           'label' => 'Estado',        'rules' => 'required'],
    ];

    public function countAllExceptSuperadmin()
    {
        return $this->db->select($this->queryCols)->where('rol_id != 8')->get($this->table)->num_rows();
    }

    /**
     * Obtener todos los registros de una tabla
     * @param int $limit
     * @param int $offset
     * @param bool $except_superadmin
     * @return array
     */
    public function findAll($limit = null, $offset = null, $except_superadmin = false)
    {
        $this->db
            ->select("u.".$this->queryCols . ", r.nombre as rol")
            ->from($this->table . " u");
        if($except_superadmin)
            $this->db->where('u.rol_id != 8');

        $get = $this->db->join('rol r', 'u.rol_id = r.id')
            ->order_by('u.id ASC')
            ->limit($limit, $offset)
            ->get();
        return $this->result($get);
    }

    /**
     * @Override
     */
    public function insert(CI_Input $input, $user = null)
    {
        if(!$this->find($input->post('id', true), $input->post('email', true), $input->post('cedula', true))) {
            $set = [];
            foreach ($this->fields as $field)
                $set[$field['field']] = $input->post($field['field'], true);
            $set['pass'] = password_hash($set['id'], PASSWORD_BCRYPT);
            if ($this->db->insert($this->table, $set)) {
                return $this->findById($set['id']);
            } else
                throw new Exception("Error en creación de registro");
        }else
            throw new Exception("Usuario ya existe");
    }

    public function update(CI_Input $input, $entity, $user = null)
    {
        return parent::update($input, $entity, null);
    }

    public function login($username, $password)
    {
        $query = $this->db->select('*')
            ->from($this->table)
            ->where("id", $username)->where("estado", "activo")
            ->limit(1)
            ->get();

        $return = false;
        if ($query->num_rows() == 1) {
            $result = $query->result();
            if(password_verify($password, $result[0]->pass)){
                $return = $this->findById($username);
            }
        }
        return $return;
    }

    public function consPass($id, $pass_act)
    {
        $query = $this->db->select('*')
            ->from($this->table)
            ->where('id', $id)
            ->limit(1)
            ->get();

        return $query->num_rows() == 1 && password_verify($pass_act, $query->result()[0]->pass);
    }

    public function cambiarPass($id, $pass)
    {
        return $this->db->update($this->table, ['pass' => password_hash($pass, PASSWORD_BCRYPT)], ['id' => $id]);
    }

    public function obtenerRoles($array = false, $except_superadmin = false)
    {
        if($except_superadmin)
            $this->db->where('id != 8');
        $roles = $this->db->get('rol')->result();
        if($array){
            $roles_array = [];
            foreach($roles as $rol)
                $roles_array[$rol->id] = $rol->nombre;
            $roles = $roles_array;
        }
        return $roles;
    }

    public function find($id = "", $email = "", $cedula = "")
    {
        if($id || $email || $cedula) {
            $this->db->select('*')
                ->from($this->table);
            if ($id)
                $this->db->or_where("id", $id);
            if ($email)
                $this->db->or_where("email", $email);
            if ($cedula)
                $this->db->or_where("cedula", $cedula);
            $get = $this->db->get();
            $usuarios = $this->result($get);
            if($usuarios)
                return $usuarios;
        }
        return false;
    }

    public function entityToPost($entity)
    {
        foreach($this->fields as $field_data)
            $_POST[$field_data['field']] = $entity->{$field_data['field']};
    }
}


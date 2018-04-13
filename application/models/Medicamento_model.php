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
    
    public $fields = [
        ['field' => 'nombre',       'label' => 'Nombre',            'rules' => 'trim|required|max_length[50]'],
        ['field' => 'presentacion', 'label' => 'Presentación',      'rules' => 'trim|max_length[15]'],
        ['field' => 'cantidad',     'label' => 'Cantidad',          'rules' => 'trim|numeric'],
        ['field' => 'via',          'label' => 'Via',               'rules' => 'trim|max_length[25]'],
    ];

    public function insert(CI_Input $input, $user = null)
    {
        //TODO: validar que no exista un mismo medicamento con mismos atributos
        return parent::insert($input, $user);
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

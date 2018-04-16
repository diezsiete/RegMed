<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once ENTITIES_DIR . 'E14Entity.php';


class E14_model extends MY_Model
{
    
    protected $table = 'e14';
    protected $entityClass = 'E14Entity';
    
    protected $alimentaciones = [
        ["label" => "n/a", "abrev" => "N/A"],
        ["label" => "Desayuno", "abrev" => "D"],
        ["label" => "Medias Nueves", "abrev" => "M N"],
        ["label" => "Almuerzo", "abrev" => "A"],
        ["label" => "Onces", "abrev" => "O"],
        ["label" => "Comida", "abrev" => "C"],
        ["label" => "Refrigerio Nocturno", "abrev" => "R N"]
    ];
    
    protected $orientaciones = [
        ["label" => "n/a", "abrev" => "N/A"],
        ["label" => "Ninguno", "abrev" => "N"],
        ["label" => "Tiempo", "abrev" => "T"],
        ["label" => "Persona", "abrev" => "P"],
        ["label" => "Lugar", "abrev" => "L"],
    ];

    protected $eliminaciones = [
        ["label" => "n/a", "abrev" => "N/A"],
        ["label" => "Diuresis", "abrev" => "D"],
        ["label" => "Heces", "abrev" => "H"],
    ];
    
    public $fields = [
        ['field' => 'fechahora',        'label' => 'Fecha hora control','rules' => 'trim|required'],
        ['field' => 'residente_cedula', 'label' => 'Cedula Residente',  'rules' => 'trim|required|max_length[20]|numeric'],
        ['field' => 'bano',             'label' => 'Baño',              'rules' => 'trim|max_length[20]'],
        ['field' => 'alimentacion',     'label' => 'Alimentación',      'rules' => 'trim|max_length[100]'],
        ['field' => 'orientacion',      'label' => 'Orientación',       'rules' => 'trim|max_length[50]'],
        ['field' => 'lubricacion',      'label' => 'Lubricación',       'rules' => 'trim|max_length[50]'],
        ['field' => 'curacion',         'label' => 'Curación',          'rules' => 'trim|max_length[3]'],
        ['field' => 'terapia_fisica',   'label' => 'Terapia Física',    'rules' => 'trim|max_length[3]'],
        ['field' => 'terapia_ocupacional','label' => 'Terapia Ocupacional','rules' => 'trim|max_length[3]'],
        ['field' => 'eliminacion',      'label' => 'Eliminación',       'rules' => 'trim|max_length[50]'],
        ['field' => 'sueno',            'label' => 'Sueño',             'rules' => 'trim|max_length[50]'],
        ['field' => 'deambulacion',     'label' => 'Deambulación',      'rules' => 'trim|max_length[50]'],
        ['field' => 'observaciones',    'label' => 'Observaciones',     'rules' => 'trim']
    ];


    public function findAllResident($cedula, $limit = null, $offset = null)
    {
        $get =  $this->db->select($this->queryCols)
            ->where("residente_cedula", $cedula)
            ->order_by('fechahora','desc')
            ->order_by('id', 'desc')
            ->get($this->table, $limit, $offset);
        return $this->result($get);
    }
    
    public function getAlimentaciones($full = false){
        $alimentaciones = $this->alimentaciones;
        if(!$full){
            $alimentaciones = [];
            foreach($this->alimentaciones as $alimentacion)
                $alimentaciones[$alimentacion['label']] = $alimentacion['label'];
        }
        return $alimentaciones;
    }
    
    public function getOrientaciones($full = false){
        $orientaciones = $this->orientaciones;
        if(!$full){
            $orientaciones = [];
            foreach($this->orientaciones as $orientacion)
                $orientaciones[$orientacion['label']] = $orientacion['label'];
        }
        return $orientaciones;
    }

    public function getEliminaciones($full = false){
        $eliminaciones = $this->eliminaciones;
        if(!$full){
            $eliminaciones = [];
            foreach($this->eliminaciones as $eliminacion)
                $eliminaciones[$eliminacion['label']] = $eliminacion['label'];
        }
        return $eliminaciones;
    }


}
?>

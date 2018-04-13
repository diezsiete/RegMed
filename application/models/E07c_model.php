<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once ENTITIES_DIR . 'E07cEntity.php';
/**
 * Modelo para persistencia  de enfermeria.
 */
class E07c_model extends MY_Model
{
    
    protected $table = 'e07_control';
    protected $entityClass = 'E07cEntity';

    /**
     * @var E07_model
     */
    private $E07_model;
    
    public $fields = [
        ['field' => 'residente_cedula',     'label' => 'Cedula Residente',  'rules' => 'trim|required|max_length[20]|numeric'],
        ['field' => 'observaciones',          'label' => 'Observaciones',     'rules' => 'trim|max_length[300]'],
        ['field' => 'dosis',                'label' => 'Dosis',             'rules' => 'trim|max_length[15]'],
        ['field' => 'medicamento_nombre',   'label' => 'Medicamento',       'rules' => 'trim|required|max_length[50]'],
        ['field' => 'medicamento_presentacion','label' => 'Presentación',   'rules' => 'trim|required|max_length[25]'],
        ['field' => 'medicamento_cantidad', 'label' => 'Cantidad',          'rules' => 'trim|required|numeric'],
        ['field' => 'medicamento_via',      'label' => 'Via Administracion','rules' => 'trim|required|max_length[25]'],
        ['field' => 'fechahora',            'label' => 'Fecha hora',        'rules' => 'trim|required'],
        ['field' => 'e07_id',               'label' => 'E07 id',            'rules' => 'trim'],
    ];

    /**
     * @param  E07Entity $e07
     * @return E07CEntity
     */
    protected function copyE07($e07)
    {
        $e07c = new E07cEntity();
        foreach($this->fields as $field_data) {
            $field = $field_data['field'];
            $e07c->$field = $e07->$field;
        }
        $e07c->e07_id = $e07->id;
        return $e07c;
    }

    /**
     * @param $cedula
     * @return E07cEntity[]
     */
    public function findAdministrarHoy($cedula)
    {
        $this->CI->load->model('E07_model');
        $e07s = $this->CI->E07_model->findAllResident($cedula);
        //los que ya se le han dado
        $e07c_hoy = $this->findAllToday($cedula);
        $administrar_hoy = [];
        foreach($e07s as $e07){
            foreach($e07->horas as $hora){
                $continue = false;
                foreach($e07c_hoy as $e07c) {
                    if ($e07c->e07_id == $e07->id && $hora == $e07c->getHora()) {
                        $continue = true;
                    }
                }
                if($continue)
                    continue;

                $e07c = $this->copyE07($e07);

                $e07c_fecha = date("Y-m-d");
                $e07c_seg = 0;
                $e07c_fechahora = $e07c_fecha . " " . $hora . ":" . str_pad($e07c_seg, 2, '0', STR_PAD_LEFT);
                while(isset($administrar_hoy[$e07c_fechahora])){
                    $e07c_seg++;
                    $e07c_fechahora = $e07c_fecha . " " . $hora . ":" . str_pad($e07c_seg, 2, '0', STR_PAD_LEFT);
                }

                $e07c->fechahora = $e07c_fechahora;
                $administrar_hoy[$e07c_fechahora] = $e07c;
            }
        }
        ksort($administrar_hoy);
        return $administrar_hoy;
    }
    

}
?>

<?php


class Medicamento extends MY_Controller
{
    /**
     * @var Medicamento_model
     */
    public $medicamento_model;
    /**
     * @var Paginacion
     */
    public $paginacion;
    /**
     * Medicamento constructor.
     */
    public function __construct()
    {
        date_default_timezone_set("America/Bogota");
        parent::__construct();


        $this->load->model('medicamento_model');
        $this->load->library('paginacion');
    }

    public function consultarMedicamento()
    {
        $formato = $this->modulo->getFormato('medicamento');
        $model   = $this->modulo->getFormatoModel($formato);
        $cols    = $this->modulo->getFormatoConsultaCols($formato);


        $this->paginacion->setTotal($model->countAll());
        $limit = $this->paginacion->getLimit();
        $entities = $model->findAll($limit[1], $limit[0]);

        $this->load->view('formato/consultar', [
            'formato' => $formato,
            'entities'=> $entities,
            'cols'    => $cols,
            'paginacion' => $this->paginacion->paginacion($this->load)
        ]);
    }
}
<?php


class Formato_helper
{
    /**
     * @var CI_Session
     */
    public $session;
    /**
     * @var CI_Form_validation
     */
    public $form_validation;
    /**
     * @var CI_Input
     */
    public $input;
    
    public function __construct($params)
    {
        $this->form_validation = $params['form_validation'];
        $this->input = $params['input'];
        $this->session = $params['session'];
    }

    /**
     * @param MY_Model $model
     * @param bool $redirect
     * @return array
     */
    public function crear($model, $redirect = false)
    {
        $vars = [];
        $model->setRules($this->form_validation);
        if($this->input->post('crear')){
            if ($this->form_validation->run()) {
                try{
                    $entity = $model->insert($this->input, $this->session->userdata('login')['id']);
                    $vars['success_message'] = 'Registro guardado exitosamente';
                    $vars['entity'] = $entity;
                    if($redirect) {
                        redirect($redirect);
                    }
                }catch(Exception $e){
                    $vars['error_message'] = $e->getMessage();
                }
            }
        }
        return $vars;
    }

    /**
     * @param MY_Model $model
     * @param Entity $entity
     * @param bool|string $redirect
     * @return array
     */
    public function actualizar($model, $entity, $redirect = false)
    {
        $vars = [];
        $model->setRules($this->form_validation);
        if($this->input->post('actualizar')){
            if ($this->form_validation->run()) {
                if($model->update($this->input, $entity, $this->session->userdata('login')['id'])){
                    $vars['success_message'] = 'Registro guardado exitosamente';
                    $vars['entity'] = $entity;
                    if($redirect)
                        redirect($redirect);
                }else
                    $vars['error_message'] = 'Error en actualización de formato';
            }
        }
        return $vars;
    }

    /**
     * @param MY_Model $model
     * @param $entity
     * @param bool $redirect
     * @return array
     */
    public function borrar($model, $entity, $redirect = false)
    {
        $vars = [];
        if($model->delete($entity)){
            $vars['success_message'] = 'Registro guardado exitosamente';
            if($redirect)
                redirect($redirect);
        }else
            $vars['error_message'] = 'Error en borrar formato';
        return $vars;
    }
}
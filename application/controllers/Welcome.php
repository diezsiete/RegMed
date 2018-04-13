<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Controlador de bienvenida al sistema, verifica sesiones activas y redirecciona
 * acorde a rol asociado a la sesión.
 */
class Welcome extends MY_Controller 
{
	/**
	 * @var Modulo
	 */
	public $modulo;


	public function __construct()
	{
		parent::__construct();
		$this->load->library('modulo');
	}
	public function index()
	{
		$this->load->view('welcome/index');
	}
}

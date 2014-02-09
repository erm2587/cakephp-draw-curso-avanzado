<?php
App::uses('AppController', 'Controller');
/**
 * Empresas Controller
 *
 */
class EmpresasController extends AppController {

/**
 * Scaffold
 *
 * @var mixed
 */
	public $scaffold;

/**
 *
 * @param type $empresaId
 */
	public function alumnosPorFoco($empresaId) {
		debug($this->Empresa->alumnosFoco($empresaId));
		$this->autoRender = false;
	}

}

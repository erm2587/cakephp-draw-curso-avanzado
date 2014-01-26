<?php
App::uses('AppController', 'Controller');
/**
 * Focos Controller
 *
 * @property Foco $Foco
 * @property PaginatorComponent $Paginator
 */
class FocosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Foco->recursive = 0;
		$this->set('focos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Foco->exists($id)) {
			throw new NotFoundException(__('Invalid foco'));
		}
		$options = array('conditions' => array('Foco.' . $this->Foco->primaryKey => $id));
		$this->set('foco', $this->Foco->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Foco->create();
			if ($this->Foco->save($this->request->data)) {
				$this->Session->setFlash(__('The foco has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The foco could not be saved. Please, try again.'));
			}
		}
		$alumnos = $this->Foco->Alumno->find('list');
		$ofertas = $this->Foco->Ofertum->find('list');
		$this->set(compact('alumnos', 'ofertas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Foco->exists($id)) {
			throw new NotFoundException(__('Invalid foco'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Foco->save($this->request->data)) {
				$this->Session->setFlash(__('The foco has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The foco could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Foco.' . $this->Foco->primaryKey => $id));
			$this->request->data = $this->Foco->find('first', $options);
		}
		$alumnos = $this->Foco->Alumno->find('list');
		$ofertas = $this->Foco->Ofertum->find('list');
		$this->set(compact('alumnos', 'ofertas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Foco->id = $id;
		if (!$this->Foco->exists()) {
			throw new NotFoundException(__('Invalid foco'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Foco->delete()) {
			$this->Session->setFlash(__('The foco has been deleted.'));
		} else {
			$this->Session->setFlash(__('The foco could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}

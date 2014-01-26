<?php
App::uses('AppController', 'Controller');
/**
 * Ofertas Controller
 *
 * @property Oferta $Oferta
 * @property PaginatorComponent $Paginator
 */
class OfertasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * Main app home page
*/
	public function home() {
		//nada de momento aquí
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Oferta->recursive = 0;
		$this->set('ofertas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Oferta->exists($id)) {
			throw new NotFoundException(__('Invalid oferta'));
		}
		$options = array('conditions' => array('Oferta.' . $this->Oferta->primaryKey => $id));
		$this->set('oferta', $this->Oferta->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Oferta->create();
			if ($this->Oferta->save($this->request->data)) {
				$this->Session->setFlash(__('The oferta has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The oferta could not be saved. Please, try again.'));
			}
		}
		$empresas = $this->Oferta->Empresa->find('list');
		$focos = $this->Oferta->Foco->find('list');
		$this->set(compact('empresas', 'focos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Oferta->exists($id)) {
			throw new NotFoundException(__('Invalid oferta'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Oferta->save($this->request->data)) {
				$this->Session->setFlash(__('The oferta has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The oferta could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Oferta.' . $this->Oferta->primaryKey => $id));
			$this->request->data = $this->Oferta->find('first', $options);
		}
		$empresas = $this->Oferta->Empresa->find('list');
		$focos = $this->Oferta->Foco->find('list');
		$this->set(compact('empresas', 'focos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Oferta->id = $id;
		if (!$this->Oferta->exists()) {
			throw new NotFoundException(__('Invalid oferta'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Oferta->delete()) {
			$this->Session->setFlash(__('The oferta has been deleted.'));
		} else {
			$this->Session->setFlash(__('The oferta could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}

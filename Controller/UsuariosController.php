<?php
App::uses('AppController', 'Controller');
/**
 * Usuarios Controller
 *
 * @property Usuario $Usuario
 * @property PaginatorComponent $Paginator
 */
class UsuariosController extends AppController {

/**
 *
 * @var array
 */
	public $uses = array(
		'Usuario',
		'Oferta'
	);

/**
 * Callback
 */
	public function beforeFilter() {
		parent::beforeFilter();
		// permitir acciones sin login
		$this->Auth->allow('registro', 'login');

		$this->Paginator->settings = array(
			'Oferta' => array(
				'findType' => 'interesantes',
				//'paramType' => 'querystring',
				'order' => array('titulo' => 'asc'),
				'limit' => 1,
			)
		);
	}

/**
 * Registro de un nuevo usuario
 * @return type
 */
	public function registro() {
		if ($this->request->is('post')) {
			$this->Usuario->create();
			if ($this->Usuario->registro($this->request->data)) {
				$this->Session->setFlash(__('The usuario has been saved.'));
				return $this->redirect(array('action' => 'panel'));
			} else {
				$this->Session->setFlash(__('The usuario could not be saved. Please, try again.'));
			}
		}
		//@todo: hack para evitar teclear datos del usuario cada vez
		if (Configure::read('debug') > 0) {
			if (empty($this->request->data)) {
				$this->request->data = array(
					'Usuario' => array(
						'email' => 'me@g.com',
						'password' => 'password',
						'password_again' => 'password'
					),
					'Alumno' => array(
						'nombre' => 'alu',
						'primer_apellido' => 'ape1',
						'segundo_apellido' => 'ape2',
						'telefono' => '555444',
					),
				);
			}
		}
	}

/**
 * Panel de control, home tras el registro o login
 */
	public function panel() {
		$this->layout = 'front';
		$ofertas = $this->Paginator->paginate('Oferta');
		$this->set(compact('ofertas'));
	}

/**
 * Ajax para paginacion de ofertas interesantes
 */
	public function paginador() {
		$ofertas = $this->Paginator->paginate('Oferta');
		$this->set(compact('ofertas'));
		$this->render('/Elements/Ofertas/paginador', 'ajax');
	}

/**
 * Login
 * @return type
 */
	public function login() {
		if ($this->request->is('post')) {
			debug($this->request->data);
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirect());
			}
			$this->Session->setFlash(__('Usuario o contraseña incorrectos'));
			return $this->redirect($this->Auth->settings['loginAction']);
		}
	}

/**
 * Logout action
 * @return type
 */
	public function logout() {
		$this->Session->destroy();
		return $this->redirect($this->Auth->logout());
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Usuario->recursive = 0;
		$this->set('usuarios', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Usuario->exists($id)) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		$options = array('conditions' => array('Usuario.' . $this->Usuario->primaryKey => $id));
		$this->set('usuario', $this->Usuario->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Usuario->create();
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash(__('The usuario has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usuario could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Usuario->exists($id)) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash(__('The usuario has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usuario could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Usuario.' . $this->Usuario->primaryKey => $id));
			$this->request->data = $this->Usuario->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Usuario->id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Usuario->delete()) {
			$this->Session->setFlash(__('The usuario has been deleted.'));
		} else {
			$this->Session->setFlash(__('The usuario could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}

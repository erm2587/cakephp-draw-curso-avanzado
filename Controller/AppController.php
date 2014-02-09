<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 */
class AppController extends Controller {

/**
 *
 * @var array
 */
	public $components = array(
		'Session',
		'Paginator',
		'DebugKit.Toolbar',
		'Auth' => array(
			'loginAction' => array(
				'controller' => 'ofertas',
				'action' => 'home',
			),
			'loginRedirect' => array(
				'controller' => 'usuarios',
				'action' => 'panel',
			),
			'logoutRedirect' => array(
				'controller' => 'ofertas',
				'action' => 'home',
			),
			'authenticate' => array(
				'Form' => array(
					'userModel' => 'Usuario',
					'fields' => array('username' => 'email'),
					'passwordHasher' => array('className' => 'Blowfish'),
					//por si acaso no está definido en app model
					'recursive' => -1,
					//traer también datos del alumno
					'contain' => array('Alumno'),
					//filtrar query con estas condiciones
					'scope' => array(
						'Usuario.activo' => true,
					),
				)
			),
		)
	);

/**
 *
 * @var array
 */
	public $helpers = array(
		'Session',
		'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
		'Form' => array('className' => 'BoostCake.BoostCakeForm'),
		'Paginator' => array('className' => 'BoostCake.BoostCakePaginator'),
	);
}

<?php
App::uses('FocosOferta', 'Model');

/**
 * FocosOferta Test Case
 *
 */
class FocosOfertaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.focos_oferta',
		'app.foco',
		'app.alumno',
		'app.usuario',
		'app.alumnos_foco',
		'app.oferta',
		'app.empresa'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FocosOferta = ClassRegistry::init('FocosOferta');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FocosOferta);

		parent::tearDown();
	}

}

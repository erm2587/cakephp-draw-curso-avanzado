<?php
/**
 * OfertaFixture
 *
 */
class OfertaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'key' => 'primary', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'titulo' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'activa' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'vacantes' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3),
		'fecha_limite' => array('type' => 'date', 'null' => false, 'default' => null),
		'empresa_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '52e55cb8-0090-4224-9790-1b11088342a1',
			'titulo' => 'Lorem ipsum dolor sit amet',
			'activa' => 1,
			'created' => '2014-01-26 20:06:32',
			'modified' => '2014-01-26 20:06:32',
			'vacantes' => 1,
			'fecha_limite' => '2014-01-26',
			'empresa_id' => 'Lorem ipsum dolor sit amet'
		),
	);

}

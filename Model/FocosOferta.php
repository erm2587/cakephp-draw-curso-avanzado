<?php
App::uses('AppModel', 'Model');
/**
 * FocosOferta Model
 *
 * @property Foco $Foco
 * @property Oferta $Oferta
 */
class FocosOferta extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Foco' => array(
			'className' => 'Foco',
			'foreignKey' => 'foco_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Oferta' => array(
			'className' => 'Oferta',
			'foreignKey' => 'oferta_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

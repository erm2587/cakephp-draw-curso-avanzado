<?php
App::uses('AppModel', 'Model');
/**
 * Empresa Model
 *
 * @property Oferta $Oferta
 */
class Empresa extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'nombre_social' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cif' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Oferta' => array(
			'className' => 'Oferta',
			'foreignKey' => 'empresa_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

/**
 * Recupera todos los alumnos relacionados por foco con cada uno de los focos de las ofertas de una empresa dada
 * @param type $empresaId
 */
	public function alumnosFoco($empresaId) {
		return $this->find('all', array(
				'conditions' => array(
					"{$this->alias}.{$this->primaryKey}" => $empresaId,
				),
				'contain' => array(
					'Oferta' => array(
						'fields' => array('id', 'titulo'),
						'order' => array('titulo' => 'ASC'),
						'Foco' => array(
							'fields' => array('id', 'nombre'),
							'Alumno' => array(
								'fields' => array('email'),
								'order' => array('email' => 'ASC'),
							)
						),
					)
				),

			)
		);
	}
}

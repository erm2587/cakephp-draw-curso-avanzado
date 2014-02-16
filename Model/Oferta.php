<?php
App::uses('AppModel', 'Model');
/**
 * Oferta Model
 *
 * @property Empresa $Empresa
 * @property Foco $Foco
 */
class Oferta extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'titulo' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'activa' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'vacantes' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'fecha_limite' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'empresa_id' => array(
			'uuid' => array(
				'rule' => array('uuid'),
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
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Empresa' => array(
			'className' => 'Empresa',
			'foreignKey' => 'empresa_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Foco' => array(
			'className' => 'Foco',
			'joinTable' => 'focos_ofertas',
			'foreignKey' => 'oferta_id',
			'associationForeignKey' => 'foco_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

/**
 * Custom Finders
 * @var array
 */
	public $findMethods = array('interesantes' => true);

/**
 * Últimas 5 ofertas, mejor convertir esto en un custom finder más adelante
 * @return type
 */
	public function ultimas() {
		return $this->find('all', array(
			'limit' => 5,
			'order' => array("{$this->alias}.created" => 'desc'),
		));
	}

/**
 * Obtiene ofertas interesantes para el usuario actual
 * @param type $state
 * @param type $query
 * @param type $results
 * @return type
 */
	protected function _findInteresantes($state, $query, $results = array()) {
		if ($state === 'before') {
			//@todo esto lo vamos a mover al modelo, que es donde debe estar...
			$focos = ClassRegistry::init('Alumno')->find('first', array(
				'conditions' => array('Alumno.id' => AuthComponent::user('Alumno.id')),
				'contain' => array('Foco'),
			));
			$focoIds = Hash::extract($focos, 'Foco.{n}.id');
			$this->bindModel(
				array('hasOne' => array(
						'FocosOferta' => array(
							'type' => 'inner',
							'conditions' => array(
								'FocosOferta.foco_id' => $focoIds,
							)
						)
					),
				),
				// esto es importante ya que el paginate hace 2 finds
				false
			);

			return $query;
		}
		return $results;
	}

}

<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
/**
 * Usuario Model
 *
 */
class Usuario extends AppModel {

	const ROL_ALUMNO = 'alumno';
	const ROL_ADMIN = 'admin';
	const ROL_EMPRESA = 'empresa';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
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
		'password' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password_again' => array(
			'equal' => array(
				'rule' => array('confirmPassword'),
				'message' => 'La contraseña debe coincidir',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'rol' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'activo' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

/**
 * Enlace con Alumno
 * @var array
 */
	public $hasOne = array(
		'Alumno',
	);

/**
 * beforeSave callback
 * @param type $options
 * @return boolean
 */
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash(
					$this->data[$this->alias]['password']
			);
		}
		return true;
	}
/**
 * Registro de alumnos
 * @param array $data
 * @return type
 */
	public function registro($data) {
		$data['Usuario']['rol'] = self::ROL_ALUMNO;
		$data['Usuario']['activo'] = true;
		return $this->saveAssociated($data);
	}

/**
 * Custom validation password confirm
 * @param type $check
 * @return boolean
 */
	public function confirmPassword($check = null) {
		if (!empty($check['password_again']) && !empty($this->data[$this->alias]['password'])) {
			return $this->data[$this->alias]['password'] === $check['password_again'];
		}
		return false;
	}

}

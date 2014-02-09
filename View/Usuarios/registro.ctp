<?php
$this->layout = 'front';
echo $this->Form->create('Usuario', array(
	'action' => 'registro',
	'inputDefaults' => array(
		'div' => 'form-group',
		'wrapInput' => false,
		'class' => 'form-control'
	),
	'class' => 'well'
));
echo $this->Html->tag('h2', __('Registro de Alumnos'));
echo $this->Form->input('Usuario.email', array('label' => __('email'), 'div' => 'form-group'));
echo $this->Form->input('Usuario.password', array('label' => __('contraseña'), 'div' => 'form-group'));
echo $this->Form->input('Usuario.password_again', array(
	'type' => 'password',
	'label' => __('repite la contraseña'),
	'div' => 'form-group'
));
echo $this->Html->tag('hr');
echo $this->Form->input('Alumno.nombre', array('label' => __('nombre'), 'div' => 'form-group'));
echo $this->Form->input('Alumno.primer_apellido', array('label' => __('primer apellido'), 'div' => 'form-group'));
echo $this->Form->input('Alumno.segundo_apellido', array('label' => __('segundo apellido'), 'div' => 'form-group'));
echo $this->Form->input('Alumno.telefono', array('label' => __('teléfono'), 'div' => 'form-group'));
echo $this->Html->tag('hr');
echo $this->Form->button(__('Registrar nuevo alumno'), array('class' => 'btn btn-primary btn-block',
	'div' => 'form-group'));
echo $this->Form->end();

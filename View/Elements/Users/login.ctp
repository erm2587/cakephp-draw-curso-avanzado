<?php
echo $this->Form->create('Usuario', array(
	'inputDefaults' => array(
		'div' => 'form-group',
		'wrapInput' => false,
		'class' => 'form-control'
	),
	'class' => 'well',
	'url' => array(
		'controller' => 'usuarios',
		'action' => 'login',
	)
));
echo $this->Html->tag('h2', __('Acceso'));
echo $this->Form->input('email', array('label' => __('email'), 'div' => 'form-group'));
echo $this->Form->input('password', array('label' => __('contraseña'), 'div' => 'form-group'));
echo $this->Form->button(__('Submit'), array('class' => 'btn btn-primary btn-block',
	'div' => 'form-group'));
echo $this->Form->end();

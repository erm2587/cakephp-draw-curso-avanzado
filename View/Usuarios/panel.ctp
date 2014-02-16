<?php if (!$this->request->is('ajax')) : ?>
<h1>Bienvenido!</h1>
<div class="row">
	<div class="col-md-6">
<?php endif; ?>
		<?php echo $this->element('Ofertas/paginador'); ?>
<?php if (!$this->request->is('ajax')) : ?>
	</div>
	<div id="jstest">click here</div>

	<?php
	// enviando variables a JS
	$testMessage = __('Don Pepito');
	$this->Js->set('testMessage', $testMessage);

	// configurando eventos
	$this->Js->get('#jstest')->event('click', 'alert("hola " + window.app.testMessage);');
	$this->Js->get('#jstest')->event('click', $this->Js->effect('fadeOut'));
	?>
</div>
<?php endif; ?>

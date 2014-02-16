<?php
$this->Paginator->options(array(
	'update' => '#paginador',
	'evalScripts' => true,
));
?>
<div id="paginador" class="ofertas paginador">
	<h2><?php echo __('Ofertas'); ?></h2>
	<table class='table table-stripped'>
	<tr>
			<th><?php echo $this->Paginator->sort('titulo'); ?></th>
			<th><?php echo $this->Paginator->sort('vacantes'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha_limite'); ?></th>
	</tr>
	<?php foreach ($ofertas as $oferta): ?>
	<tr>
		<td><?php echo h($oferta['Oferta']['titulo']); ?>&nbsp;</td>
		<td><?php echo h($oferta['Oferta']['vacantes']); ?>&nbsp;</td>
		<td><?php echo h($oferta['Oferta']['fecha_limite']); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</table>
	<?php
	echo $this->Paginator->pagination(array(
		'ul' => 'pagination'
	));

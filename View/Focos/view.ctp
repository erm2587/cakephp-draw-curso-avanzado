<div class="focos view">
<h2><?php echo __('Foco'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($foco['Foco']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($foco['Foco']['nombre']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Foco'), array('action' => 'edit', $foco['Foco']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Foco'), array('action' => 'delete', $foco['Foco']['id']), null, __('Are you sure you want to delete # %s?', $foco['Foco']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Focos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Foco'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Alumnos'), array('controller' => 'alumnos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alumno'), array('controller' => 'alumnos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ofertas'), array('controller' => 'ofertas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Oferta'), array('controller' => 'ofertas', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Alumnos'); ?></h3>
	<?php if (!empty($foco['Alumno'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Primer Apellido'); ?></th>
		<th><?php echo __('Segundo Apellido'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Telefono'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($foco['Alumno'] as $alumno): ?>
		<tr>
			<td><?php echo $alumno['id']; ?></td>
			<td><?php echo $alumno['nombre']; ?></td>
			<td><?php echo $alumno['primer_apellido']; ?></td>
			<td><?php echo $alumno['segundo_apellido']; ?></td>
			<td><?php echo $alumno['email']; ?></td>
			<td><?php echo $alumno['telefono']; ?></td>
			<td><?php echo $alumno['created']; ?></td>
			<td><?php echo $alumno['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'alumnos', 'action' => 'view', $alumno['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'alumnos', 'action' => 'edit', $alumno['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'alumnos', 'action' => 'delete', $alumno['id']), null, __('Are you sure you want to delete # %s?', $alumno['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Alumno'), array('controller' => 'alumnos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Ofertas'); ?></h3>
	<?php if (!empty($foco['Oferta'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Titulo'); ?></th>
		<th><?php echo __('Activa'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Vacantes'); ?></th>
		<th><?php echo __('Fecha Limite'); ?></th>
		<th><?php echo __('Empresa Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($foco['Oferta'] as $oferta): ?>
		<tr>
			<td><?php echo $oferta['id']; ?></td>
			<td><?php echo $oferta['titulo']; ?></td>
			<td><?php echo $oferta['activa']; ?></td>
			<td><?php echo $oferta['created']; ?></td>
			<td><?php echo $oferta['modified']; ?></td>
			<td><?php echo $oferta['vacantes']; ?></td>
			<td><?php echo $oferta['fecha_limite']; ?></td>
			<td><?php echo $oferta['empresa_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'ofertas', 'action' => 'view', $oferta['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'ofertas', 'action' => 'edit', $oferta['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'ofertas', 'action' => 'delete', $oferta['id']), null, __('Are you sure you want to delete # %s?', $oferta['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Oferta'), array('controller' => 'ofertas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

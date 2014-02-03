
<div class="well">
<?php
echo $this->Html->tag('h3', $oferta['Oferta']['titulo']);
echo $this->Html->tag('hr');
echo $this->Html->tag('p', __('Vacantes: %s', $oferta['Oferta']['vacantes']));
echo $this->Html->tag('p', __('Empresa: %s', $oferta['Empresa']['nombre_social']));
?>
</div>
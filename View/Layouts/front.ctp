<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $this->fetch('title'); ?></title>
		<!-- Obtain Bootstrap style sheet from CDN (online service) so it doesn't have to be on my machine -->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" media="screen">   	<link href="//netdna.bootstrapcdn.com/bootswatch/3.0.3/united/bootstrap.min.css" rel="stylesheet" media="screen">
	</head>
	<body>
		<header role="banner" class="navbar navbar-static-top bs-docs-nav">
			<div class="container">
				<div class="navbar-header">
					<button data-target=".bs-navbar-collapse" data-toggle="collapse" type="button" class="navbar-toggle">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<?php
					if (AuthComponent::user()) {
						echo $this->Html->link(__('Mi Inicio'), array(
							'controller' => 'usuarios',
							'action' => 'panel',
						), array(
							'class' => 'navbar-brand'
						));
					} else {
						echo $this->Html->link(__('Inicio'), '/', array(
							'class' => 'navbar-brand',
						));
					}
					?>
				</div>
				<nav role="navigation" class="collapse navbar-collapse bs-navbar-collapse">
					<ul class="nav navbar-nav">
						<li>
							<a href="#">Contacto</a>
						</li>
						<?php
						if (AuthComponent::user()) {
							echo $this->Html->tag('li', $this->Html->link(__('Cerrar sesión de %s', AuthComponent::user('Alumno.nombre')), array(
								'controller' => 'usuarios',
								'action' => 'logout',
							)));
						}
						?>
					</ul>
				</nav>
			</div>
		</header>
		<div class="container">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->Session->flash('auth'); ?>
			<?php echo $this->fetch('content'); ?>
		</div> <!-- /container -->
		<!-- Obtain latest version of jquery automatically -->
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<!-- Obtain Bootstrap javascript from CDN (online service) so it doesn't have to be on my machine -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
		<?php echo $this->Js->writeBuffer(); // Write cached scripts ?>
		<?php echo $this->fetch('script'); ?>
	</body>
</html>

<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $this->fetch('title'); ?></title>
    <!-- Obtain Bootstrap style sheet from CDN (online service) so it doesn't have to be on my machine -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" media="screen">   	<link href="//netdna.bootstrapcdn.com/bootswatch/3.0.3/united/bootstrap.min.css" rel="stylesheet" media="screen">

   <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>


  </head>
  <body>
    <!-- Obtain latest version of jquery automatically -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <!-- Obtain Bootstrap javascript from CDN (online service) so it doesn't have to be on my machine -->
     <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Project name</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
	<?php echo $this->fetch('content'); ?>
    </div> <!-- /container -->



  </body>
</html>

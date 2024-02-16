<!doctype html>
<html>
<head>
	  <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	  <!--Import Google Icon Font-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" >
    <!-- Підключення bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!--Let browser know website is optimized for mobile-->
	  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>PHP</title>
    <link rel="stylesheet" href="/css/site.css"/>
</head>

<body>
<nav>
    <div class="nav-wrapper orange darken-4">
    <h1 class="left hide-on-med-and-down mt-2" style="margin-left: 10px;">PHP</h1>
    <a href="/" class="brand-logo center"><img src="/img/php.png"/></a>
     
    <ul id="nav-mobile" class="right hide-on-med-and-down">
      <?php foreach( [
			'basics' => 'Основи',
			'layout' => 'Шаблонізація',
      'api' => 'API', 
      'registration_form' => 'Реєстрація',
		    ] as $href => $name ) : ?>                  
			<li <?= $uri==$href ? 'class="active"' : '' ?> ><a href="/<?= $href ?>"><?= $name ?></a></li>
		<?php endforeach ?>
    <a class="btn btn-outline-primary" href="registration_form">Sign up</a> 
    <a class="btn btn-outline-primary" href="modal_form">Log in</a>    
      </ul>
    </div>
  </nav>

<div class="container">
  <?php include $page_body ; ?>
</div>



   <!-- Compiled and minified JavaScript -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="/js/site.js"></script>
  </body>
</html>   

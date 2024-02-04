<!doctype html>
<html>
<head>
	<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<!--Import Google Icon Font-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" >
    <!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>PHP SPD-111</title>
</head>
<body>
<nav>
    <div class="nav-wrapper orange">
      <a href="#" class="brand-logo">PHP</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="sass.html">Sass</a></li>
        <li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">JavaScript</a></li>
      </ul>
    </div>
  </nav>

  <div class="container">  
<pre>
PHP
Hypertext Preprocessor
Мова програмування яка частіше за все використовується для задач бекенду

за аналогією з JS, PHP має подвійне розуміння
-частина (модуль) веб-сервера, яка продовжує оброблення запитів
-самостйний продукт для виконання програм

Для встановлення краще використовувати збірку (налаштовані між собою веб-сервер, PHP, 
СУБД та інше). Такими є XAMPP, OpenServer, Danver, ...
                                     сайт 1 (index.php)
веб-запит --> [Apache(веб-сервер)] < .... >
                                     сайт N (index.php)

веб-сервер приймає запит, розбирає його та запускає PHP 
файл у запитаному сайті   Те що виводить PHP, передається сервером як
відповідь на запит. 
Виведення PHP (як модуля) потрапляє не на екран,а в тіло HTML

- Тип мови - інтерпретатор (REPL)
- покоління 4GL
- парадигма - процедурна (з підтримкою ООП)

===========================================================\
для зручності роботи з кількома проєктами (сайтами) бажано налаштувати
локальний (віртуальний) хостінг
- папка з конфігурацією Apache (conf/extra/httpd-vhosts.conf)
- відкриваємо у редакторі httpd-vhosts.conf
</pre>
</div>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
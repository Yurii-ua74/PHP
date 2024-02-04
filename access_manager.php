<?php

// echo '<pre>' ;
// print_r($_SERVER) ;
// echo $_SERVER ['REQUEST_URI'] ;
$uri = $_SERVER['REQUEST_URI'] ;
// якщо у запиті є "?" то відрізаємо після нього
$pos = strpos( $uri, '?' ) ;
if( $pos > 0 ) {
	$uri = substr( $uri, 0, $pos ) ;
}
// створюємо маршрутизацію
$routes = [
	'/'       => 'index.php',
	'/basics' => 'basics.php',
	'/layout' => 'layout.php',
] ;

if( isset($routes[$uri])) {  // у маршрутах є запис
    $page_body = $routes[$uri];
    include '_layout.php' ;
}
else {
    echo "$uri not found";
}

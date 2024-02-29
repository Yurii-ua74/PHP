<?php

// echo '<pre>' ;
// print_r($_SERVER) ;
// echo $_SERVER ['REQUEST_URI'] ;
$uri = $_SERVER['REQUEST_URI'] ;
// якщо у запиті є "?" то відрізаємо після нього
$pos = strpos( $uri, '?' ) ;
if( $pos > 0 ) {
	$uri = substr( $uri, 1, $pos-1 ) ;
}
else {
	$uri = substr( $uri, 1 ) ;
}
if( $uri != "" ) {
	$filename = "./wwwroot/{$uri}" ;
	// без зазначення типу контенту файли можуть бути ігноровані
	// а також з метою обмеження прямого доступу до деяких файлів
	// аналізуємо розширення файлу
	if( is_readable( $filename ) ) {   // запит URI - існуючий файл
		$ext = pathinfo( $filename, PATHINFO_EXTENSION ) ;
	// echo $ext ; exit ;
		unset( $content_type ) ;
		switch( $ext ) {
			case 'png': 
			case 'bmp':
			case 'gif': 
				$content_type = "image/{$ext}" ; break ;
			case 'jpg':
			case 'jpeg':
				$content_type = "image/jpeg" ; break ;
			case 'js':
				$content_type = "text/javascript" ; break ;
			case 'css':
			case 'html':
				$content_type = "text/{$ext}" ; break ;
		}
		if( isset( $content_type ) ) {
			header( "Content-Type: {$content_type}" ) ;			
			readfile( $filename ) ;   // передає тіло файлу до НТТР-відповіді
		}
		else {
			http_response_code( 404 ) ;
			echo "Not found" ;
		}
		exit ;   // кінець роботи РНР скрипта (повний вихід)
	}
}

// створюємо маршрутизацію
$routes = [
	''         => 'index.php',
	'basics'   => 'basics.php',
	'layout'   => 'layout.php',
	'api'      => 'api.php',
	'registration_form' => 'registration_form.php',
	'modal_form' => 'modal_form.php',
	'register' => 'register.php',
	'log_book' => 'log_book.php',
	'studio' => 'studio.php',
	'log_out' => 'log_out.php'
] ;
if( isset( $routes[ $uri ] ) ) {   // у маршрутах є відповідний запис
	$page_body = $routes[ $uri ] ;
	include '_layout.php' ;
}
else {	
	// перевіряємо, чи є такий контролер - [Uri]Controller
	$uri_name = ucfirst($uri) ;   // перша літера переводиться у UpperCase: test -> Test
	$controller_name = "{$uri_name}Controller" ;  // TestController
	$controller_path = "./controllers/{$controller_name}.php" ;  // ./controllers/TestController.php
	if( is_readable( $controller_path ) ) {   // є контролер
		include $controller_path ;   // означення класу контролера
		$controller_object = new $controller_name() ;  // new TestController()
		$controller_object->serve() ;
	}
	else {
		echo "$uri not found" ;
	}
}

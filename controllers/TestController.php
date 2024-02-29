<?php

include_once "ApiController.php";

class TestController extends ApiController {
	// do_get() метод:
	// Викликає connect_db_or_exit() для отримання об'єкта PDO та встановлення 
	// з'єднання з базою даних
	// Виконує SQL-запит для створення таблиці Users у випадку, якщо вона ще не існує.
	protected function do_get() {   
		$db = $this->connect_db_or_exit() ;
		// виконання запитів
		$sql = "CREATE TABLE  IF NOT EXISTS  Users (
			`id`        CHAR(36)      PRIMARY KEY  DEFAULT ( UUID() ),
			`email`     VARCHAR(128)  NOT NULL,
			`name`      VARCHAR(64)   NOT NULL,
			`password`  CHAR(100)      NOT NULL     COMMENT 'Hash of password',
			`avatar`    VARCHAR(128)  NULL
		) ENGINE = INNODB, DEFAULT CHARSET = utf8mb4";
		try {
			$db->query( $sql ) ;
		}
		catch( PDOException $ex ) {
			http_response_code( 500 ) ;
			echo "query error: " . $ex->getMessage() ;
			exit ;
		}
		echo "Hello from do_get - Query OK" ;
	}
	
	// do_post() метод:
    // Просто виводить повідомлення "Hello from do_post".
	protected function do_post() {
		
    exit();		
	}

}
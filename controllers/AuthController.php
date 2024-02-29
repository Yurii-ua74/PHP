<?php

include_once("ApiController.php");

class AuthController extends ApiController {
    // Автентифікація користувача.
    protected function do_patch() {
        $result = [  // REST - як шаблон однаковості API
            'status' => 0,
            'meta' => [
                'api' => 'auth',
                'service' => 'authentication',
                'time' => time()
            ],
            'data' => [
                'message' => $_GET // параметр що приходить
            ],
        ];
if( empty($_GET["email"])) {
	$result['data']['message'] = "Missing requared parameter: 'email'";
	$this->end_with($result);
}
// перенос даних в локальні змінні
$email = trim($_GET["email"]);

if( empty($_GET["password"])) {
	$result['data']['message'] = "Missing requared parameter: 'password'";
	$this->end_with($result);
}
$password = $_GET["password"];              
// $password = password_hash($_GET['password'], PASSWORD_DEFAULT) ;

$db = $this->connect_db_or_exit() ;
// $sql = "SELECT * FROM Users u WHERE u.email = ? AND u.password = ?" ;
$sql = "SELECT * FROM Users u WHERE u.email = ?" ;

try {
	$prep = $db->prepare( $sql ) ; 
	// $prep->execute( [ $email, $password ] );
	$prep->execute( [ $email ] );
	$res = $prep->fetch() ;
	if($res)
	{
		session_start();
	if(($email === $res['email']) && (password_verify($password, $res['password'])))
	{
		
		// Update the modal content upon successful authentication
		$_SESSION['user'] = $res;
		$_SESSION['auth_success'] = true;
		$_SESSION[ 'auth-moment' ] = time();
        
		$result[ 'status' ] = 1 ;
        $result['data']['message'] = var_export($res, true);
		
		// робота з сесiями
		// session_start();
		// $_SESSION[ 'user' ] = $res;
		// $_SESSION[ 'auth-moment' ] = time();
		// $result[ 'status' ] = 1 ;
		// $result[ 'data' ][ 'message' ] = "Signup OK" ;
		$this->end_with( $result ) ;
        exit();
	}
	else {
		header('Location: /basics');
        $result['data']['message'] = json_encode(['error' => 'User not found']);
		// header("Location: basics.php");
        exit();
	}
    }
   }                         
   catch( PDOException $ex ) {
		http_response_code( 500 ) ;
		 echo "query error: " . $ex->getMessage() ;
		 exit ;
   }
		
		 $result[ 'status' ] = 1 ;
		 //$result[ 'data' ][ 'message' ] = "Signup OK" ;

		///////
		///////////////////////////////////////////////////////
		///////
		// if ($res) {
        //     // Користувач із вказаною електронною адресою існує в базі даних
        //     $emailFromDatabase = $res['email'];
        //     $passwordFromDatabase = $res['password'];

        //     // Порівняння email та password із запиту з тими що є в БД 
        //     $emailMatch = ($emailFromRequest === $emailFromDatabase);
        //     $passwordMatch = password_verify($passwordFromRequest, $passwordFromDatabase);

            // вставка повідомлення в поля результату
        //     $result['data']['message'] = json_encode(['email_match' => $emailMatch, 'password_match' => $passwordMatch]);
        //     } else {
        //     // Користувач із вказаною електронною адресою не існує в базі даних
        //     $result['data']['message'] = json_encode(['error' => 'User not found']);
        //     }
        ///////
		///////////////////////////////////////////////////////
		///////

		$this->end_with( $result ) ;

	}
}
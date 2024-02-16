<h1>REGISTER</h1>
<!-- прогресс бар -->
<div class="center-block">
<div class="preloader-wrapper big active">
      <div class="spinner-layer spinner-blue">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper center">
          <div class="circle"></div>
        </div>
      </div>

      <div class="preloader-wrapper big active">
      <div class="spinner-layer spinner-blue">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>

      <div class="spinner-layer spinner-red">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>

      <div class="spinner-layer spinner-yellow">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>

      <div class="spinner-layer spinner-green">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>
    </div>
    </div>
    
    <style>
        h1 {
            text-align: center;
        }
        .center-block {
              display: flex;
              justify-content: center;
              align-items: center;
              height: 80vh;
            }
    </style>

<?php

// Підключення файлу TestController.php
include 'controllers/TestController.php';

// Створення об'єкта класу TestController
$testController = new TestController();

// Виклик методу підключення до БД
$db = $testController->connect_db_or_exit();

// Отримання даних із $_POST
// print_r($_POST);
// $name = $_POST['user_name']; var_dump($name);
///////////////////////////////////////////////////
$email    = $_POST['email'];
$name     = $_POST['name'];
//$password = $_POST['password'];
// хешування пароля за допомогою password_hash()
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$rep_pass = $_POST['repeat_password'];
$avatar   = $_POST['avatar'];
///////////////////////////////////////////////////
if(empty($email) || empty($name) || 
   empty($password) || empty($rep_pass) || empty($avatar))
   {
    //header("Location: registration_form");
    exit();
   }
else{
    
    //$name = $_POST['name']; var_dump($name);
    //$email = $_POST['email']; var_dump($email);

    //створення запиту до БД
    $sql = "INSERT INTO users (email, name, password, avatar) VALUES (:email, :name, :password, :avatar)";
    $params = [
        'email'    => $email,
        'name'     => $name,
        'password' => $password,
        'avatar'   => $avatar
    ];
    // Встановлення режиму обробки помилок для PDO
    //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$db->query($sql)

    // Такий підхід гарантує, що дані будуть коректно екрановані, а SQL-ін'єкції будуть уникнуті.
    $stmt = $db->prepare($sql);
    $stmt->execute($params);
    
    // перехід на іншу сторінку із виконанням затримки 
    echo '<script>asyncDelay(2000, function() { window.location.href = "api"; });</script>';
    $db = null;
    //header("Location: api");
}
?>
<script>
    // асинхронна затримка щоб побачити прогрес бар
    // Функція для асинхронної затримки
    function asyncDelay(ms, callback) {
        setTimeout(callback, ms);
    }

    // Виклик асинхронної затримки перед перенаправленням
    asyncDelay(2000, function() {
        window.location.href = 'api';
    });
</script>
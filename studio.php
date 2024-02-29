<?php
  // вилучаємо дані з сесії
//   session_start();
  //if(isset($_SESSION[ 'user' ])) {
   // $user = $_SESSION['user'];
    // $interval = time() - $_SESSION['auth-moment'];
    // if($interval > 30000) {
    //   unset($_SESSION['user']);
    //   unset($_SESSION['auth-moment']);
    //   $user = null;
    // }
    // else {
    //   $user = $_SESSION['user'];
    //   $_SESSION['auth-moment'] = time();
    // }
 // }
 // else{
 //   $user = null;
  //}
    $userName = $_GET['name'];
    $userAvatar = $_GET['avatar'];
?>

<?= var_export($user, true) ?> 

<!DOCTYPE html>
<html lang="ru" data-theme="light">

<head>
    <meta charset="UTF-8">
    <title>AreaWeb - авторизация и регистрация</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css"> -->
    
    <style>
        html[data-theme="light"] .card {
    background: #fff;
}

/* body {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    height: 100vh;
} */

.card {
    box-shadow: 0.0145rem 0.029rem 0.174rem rgba(0, 0, 0, 0.01698),
    0.0335rem 0.067rem 0.402rem rgba(0, 0, 0, 0.024),
    0.0625rem 0.125rem 0.75rem rgba(0, 0, 0, 0.03),
    0.1125rem 0.225rem 1.35rem rgba(0, 0, 0, 0.036),
    0.2085rem 0.417rem 2.502rem rgba(0, 0, 0, 0.04302),
    0.5rem 1rem 6rem rgba(0, 0, 0, 0.06),
    0 0 0 0.0625rem rgba(0, 0, 0, 0.015);
    background: #141e26;
    border-radius: 0.25rem;
    padding: 40px;
}

form {
    min-width: 100px;
    max-width: 200px;
}

.avatar {
    width: 300px;
    height: 300px;
    display: block;
    object-fit: cover;
    border-radius: 50%;
   
}

 .home {
    display: flex;
    flex-direction: column;
    align-items: center;
    row-gap: 20px;
    padding: 100px;
}
</style>

</head>
<body>

<div class="card home">    
<img class="avatar" src="/wwwroot/img/<?php echo $userAvatar; ?>" alt="Avatar"/>    
    <h1>Привет, <?php echo $userName; ?>!</h1>
    <form action="log_out" method="post"> 
        <button type="submit" name="logout" class="btn-flat orange darken-2">Вийти із аккаунта</button>
    </form> 
</div>

</body>
</html>
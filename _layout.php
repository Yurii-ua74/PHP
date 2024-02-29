<?php
  // вилучаємо дані з сесії
  session_start();
  if(isset($_SESSION[ 'user' ])) {
    $user = $_SESSION['user'];
    $interval = time() - $_SESSION['auth-moment'];
    // if($interval > 30) {
    //   unset($_SESSION['user']);
    //   unset($_SESSION['auth-moment']);
    //   $user = null;
    // }
    // else {
    //   $user = $_SESSION['user'];
    //   $_SESSION['auth-moment'] = time();
    // }
  }
  else{
    $user = null;
  }
?>

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
     
    <ul id="nav-mobile" class="right">
      <?php foreach( [
			'basics' => 'Основи',
			'layout' => 'Шаблонізація',
      'api' => 'API', 
      'registration_form' => 'Реєстрація',
		    ] as $href => $name ) : ?>                  
			<li <?= $uri==$href ? 'class="active"' : '' ?> ><a href="/<?= $href ?>"><?= $name ?></a></li>
		<?php endforeach ?>
    <!-- Modal Trigger -->
      <li><a class="modal-trigger" href="#auth-modal"><i class="material-icons">key</i></a></li>  
      <li><a class="btn btn-outline-primary" href="registration_form">Sign up</a></li> 
      <li><a class="btn btn-outline-primary" href="modal_form">Log in</a></li>    
      <li><a href="/signup"><i class="material-icons">person_add</i></a></li>
    </ul>
    </div>
  </nav>

<!-- вставляємо дані з сесії -->
<?= var_export($user, true) ?> 
Auth in <?= $interval ?> sec

<div class="container">
  <?php include $page_body ; ?>
</div>

<footer class="page-footer orange darken-4">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2024 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
          </div>
  </footer>

<!-- Modal Structure -->
<div id="auth-modal" class="modal">
  <div class="col s12">
    <div class="modal-content">
      <h4>Введіть e-mail та пароль для входу</h4>
      <div class="input-field col s6">
          <i class="material-icons prefix">email</i>
          <input id="user-input-email" type="text" class="validate" name="auth-email">
          <label for="user-input-email">Email</label>
      </div>
      <div class="input-field col s6">
          <i class="material-icons prefix">lock</i>
          <input id="user-input-password" type="password" class="validate" name="auth-password">
          <label for="user-input-password">Password</label>
      </div>
      <!-- Display user avatar -->
      <div id="user-avatar-container" <?php echo isset($user) ? 'style="display:block;"' : 'style="display:none;"'; ?>>
        <img id="user-avatar" src="<?php echo isset($user) ? 'img/' . $user['avatar'] : ''; ?>" alt="User Avatar">
      </div>
    </div>
      <!-- futer -->
    <div class="modal-footer">
      <button class="modal-close btn-flat grey" onclick="closeModal();">Закрити</a>
      <button class="btn-flat orange darken-4" style="margin-left:15px" id="auth-button">Вхід</button> 
    </div>
  </div>
</div>

   <!-- Compiled and minified JavaScript -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="/js/site.js"></script>
   
   <script>
    function closeModal() {
      window.location.href = "/";
    }

  // Функція, яка викликається при натисканні на кнопку "Вхід"
  function redirectToStudioPage() {
    // Закриття поточного модального вікна
    closeModal();
    // Тут ви можна додати код для відкриття нового модального вікна, якщо потрібно
    // Отримання ім'я та аватара з сесії
    var userName = "<?php echo $user['name']; ?>";
    var userAvatar = "<?php echo $user['avatar']; ?>";
    // Перенаправлення на сторінку studio.php
    // window.location.href = 'studio';
    // Перенаправлення на сторінку studio.php з передачею параметрів у URL
    window.location.href = 'studio?name=' + encodeURIComponent(userName) + '&avatar=' + encodeURIComponent(userAvatar);

  }

  // Функція для закриття модального вікна
  function closeModal() {
    var instance = M.Modal.getInstance(document.getElementById('auth-modal'));
    instance.close();
  }

  // Додавання обробників подій для кнопок
  document.getElementById('auth-button').addEventListener('click', function() {
    // Виклик функції при натисканні на кнопку "Вхід"
    redirectToStudioPage();
  });

    </script>
  </body>
</html>   

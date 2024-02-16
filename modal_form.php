
<!-- Modal Trigger -->
<div class="centered-button">
   <a class="waves-effect waves-light btn modal-trigger bc"  href="#modal1">Підтвердіть перхід до АВТЕНТИФІКАЦІЇ</a>
</div>
<!-- <button class="btn modal-trigger" data-target="modal1">Modal</button> -->

<div id="resultMessage"></div>

<!-- Modal Structure -->
<div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h2>АВТЕНТИФІКАЦІЯ</h2>
      <div class="container mt-5">
   
    <form action="register" method="post" enctype="multipart/form-data" required>       
        <input type="email" name="email" placeholder="Введіть E-mail" class="form-control" required><br>        
        <input type="password" name="password" placeholder="Введіть password" class="form-control" 
     minlength="4" maxlength="8" pattern="^[a-zA-Z0-9]{4,8}$" required><br>
        <input type="password" name="repeat_password" placeholder="Повторіть password" class="form-control" required><br>        
        <button type="button" name="send" class="btn waves-effect waves-light btn-success modal-close mt-3" onclick="checkUser()">
            Відправити<i class="material-icons right">send</i>    
        </button>
    </form>
</div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Відмінити</a>
    </div>
  </div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, {
        opacity: 0.1,
        inDuration: 500,     // час відкриття вікна
        outDuration: 900,    // час закриття
        startingTop: '50%',  // куди скривається
        endingTop: '15%'     // де відображається        
    });
  });

  function checkUser() {
        // Отримати дані з форми
        var email = document.getElementsByName('email')[0].value;
        var password = document.getElementsByName('password')[0].value;

        // Викликати серверний скрипт для перевірки користувача
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'checkUser.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Вивести повідомлення про наявність чи відсутність користувача
                document.getElementById('resultMessage').innerHTML = xhr.responseText;
            }
        };
        // xhr.send('email=' + email + '&password=' + password);
    }
</script>

<style>
  .centered-button {
    text-align: center;
    margin-top: 20px;
    color: green;
  }
  
  .bc {
    background-color: white;
  }

  h2 {
      text-align: center;
  }       
</style>
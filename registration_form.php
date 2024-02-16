<h1 style="text-align: center;">Форма реєстрації користувача</h1>

<div class="container mt-5">
    <h3>Введіть дані</h3>
    <form action="register" method="post" enctype="multipart/form-data" required>       
        <input type="email" name="email" placeholder="Введіть E-mail" class="form-control" required><br>
        <input type="text" name="name" placeholder="Введіть login" class="form-control"><br>
        <input type="password" name="password" placeholder="Введіть password" class="form-control" 
     minlength="4" maxlength="8" pattern="^[a-zA-Z0-9]{4,8}$" required><br>
        <input type="password" name="repeat_password" placeholder="Повторіть password" class="form-control" required><br>
        <select class="form-select" name="avatar">
             <option selected>Виберіть avatar</option>
             <option value="a1.jpg">avatar1</option>
             <option value="a2.jpg">avatar2</option>
             <option value="a3.jpg">avatar3</option>
             <option value="a4.jpg">avatar4</option>
             <option value="a5.png">avatar5</option>
             <option value="a6.png">avatar6</option>
        </select>
        <button type="submit" name="send" class="btn waves-effect waves-light btn-success mt-3">
            Відправити<i class="material-icons right">send</i>    
        </button>
    </form>
</div>


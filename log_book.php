<?php
// Підключення файлу TestController.php
include 'controllers/TestController.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LOG BOOK</title>
</head>
<body>
<h1>LOG BOOK</h1>
<h2>Журнал реєстрації</h2>
<table class="striped highlight responsive-table">
        <thead>
          <tr>
              <th>ID</th>
              <th>Date_Time</th>
              <th>E-mail</th>
              <th>Login</th>
              <th>Hesh_Password</th>
              <th>Avatar</th>
          </tr>
        </thead>

        <tbody>
          <?php
          // Створення об'єкта класу TestController
          $testController = new TestController();
          // Виклик методу підключення до БД 
          $db = $testController->connect_db_or_exit();
          // запит
          $sql = "SELECT * FROM  Users";
          $result = $db->query($sql);
          // Отримання всіх рядків даних з результату запиту
          $dataRows = $result->fetchAll(PDO::FETCH_ASSOC);
          
          // вивід даних
          foreach ($dataRows as $row) {          
          echo"<tr>
            <td>".$row["id"]."</td>
            <td>".date("Y-m-d H:i:s")."</td>
            <td>".$row["email"]."</td>
            <td>".$row["name"]."</td>
            <td>".$row["password"]."</td>                   
            <td><img src='wwwroot/img/".$row["avatar"]."' alt='Avatar'></td>
          </tr>";          
          }
          ?>
        </tbody>
</table>
</body>
</html>

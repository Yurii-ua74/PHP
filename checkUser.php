<?php

// Підключення файлу TestController.php
include 'controllers/TestController.php';


// Створення об'єкта класу TestController
$testController = new TestController();
// Виклик методу підключення до БД 
$db = $testController->connect_db_or_exit();

// Отримати дані з POST-запиту
$email = $_POST['email'];
$password = $_POST['password'];

// Захист від SQL-ін'єкцій - використання підготовлених заявок
$sql = "SELECT * FROM users WHERE email = :email AND password = :password";
// $result = $db->query($sql);
$stmt = $db->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
$stmt->execute();
// Отримання всіх рядків даних з результату запиту
$dataRows = $stmt->fetchAll(PDO::FETCH_ASSOC);

// $conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка наявності користувача в базі за введеними даними
if (count($dataRows) > 0) {
    echo "Користувач існує в базі даних.";
} else {
    echo "Користувача не знайдено.";
}


?>
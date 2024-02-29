<?php
// session_start();

if (isset($_POST['logout'])) {
    // Очистка сесії
    session_unset();
    session_destroy();

    // Перенаправлення на стартову сторінку
    header("Location: /");
    exit();
}
?>
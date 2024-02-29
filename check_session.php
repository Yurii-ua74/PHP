<?php
// Запускаємо сесію
session_start();

// Якщо є дані користувача в сесії, повертаємо JSON з інформацією
if (!empty($_SESSION['user'])) {
    echo json_encode(['user' => true]);
} else {
    echo json_encode(['user' => false]);
}

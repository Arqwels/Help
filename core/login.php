<?php
session_start();
require_once 'connect.php';

$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];

$error_fields = [];

if ($login === '') {
  $error_fields[] = 'login';
}

if ($email === '') {
  $error_fields[] = 'email';
}

if ($password === '') {
  $error_fields[] = 'password';
}

if (!empty($error_fields)) {
  $response = [
    "status" => false,
    "type" => 1,
    "message" => "Проверьте правильность полей",
    "fields" => $error_fields
  ];

  echo json_encode($response);
  die();
}

// Проверка на администратора
if ($login === 'help' && $password === 'helpme') {
  $_SESSION['admin'] = [
    "id" => 0,
    "name" => 'Администратор',
    "login" => 'help',
    "phone" => '',
    "email" => 'admin@example.com',
    "department" => 'Администрация'
  ];

  $response = [
    "status" => true,
    "type" => 99,
    "message" => "Вы вошли как администратор"
  ];

  echo json_encode($response);
  die();
}

// Шифрование пароля
$password = md5($password);

$sql = "SELECT * FROM `users` WHERE `login` = '$login' AND `email` = '$email' AND `password` = '$password'";
$check_user = mysqli_query($conn, $sql);

if (mysqli_num_rows($check_user) > 0) {
  $user = mysqli_fetch_assoc($check_user);

  $_SESSION['user'] = [
    "id" => $user['id'],
    "name" => $user['full_name'],
    "login" => $user['login'],
    "phone" => $user['phone'],
    "email" => $user['email'],
    "department" => $user['department']
  ];

  $response = [
    "status" => true
  ];

  echo json_encode($response);
} else {
  $response = [
    "status" => false,
    "message" => "Данные не верные"
  ];

  echo json_encode($response);
}
?>
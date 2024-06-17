<?php
session_start();
require_once 'connect.php';

$login = $_POST['login'];
$password = $_POST['password'];
$fullName = $_POST['fullName'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$department = $_POST['department'];

$check_login = mysqli_query($conn, "SELECT * FROM `users` WHERE `login` = '$login'");
if (mysqli_num_rows($check_login) > 0) {
  $response = [
    "status" => false,
    "type" => 1,
    "message" => "Такой логин уже существует",
    "fields" => ['login']
  ];

  echo json_encode($response);

  die();
}

$error_fields = [];

if ($login === '') {
  $error_fields[] = 'login';
}

if ($password === '' || strlen($password) < 6) {
  $error_fields[] = 'password';
}

if ($fullName === '' || !preg_match("/^[а-яА-ЯёЁ\s]+$/u", $fullName)) {
  $error_fields[] = 'fullName';
}

if ($phone === '' || !preg_match("/^\+7\d{10}$/", $phone)) {
  $error_fields[] = 'phone';
}

if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $error_fields[] = 'email';
}

if ($department === '') {
  $error_fields[] = 'department';
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

$password = md5($password);

$sql = "INSERT INTO `users` (`id`, `login`, `password`, `full_name`, `phone`, `email`, `department`) VALUES (NULL, '$login', '$password', '$fullName', '$phone', '$email', '$department')";
mysqli_query($conn, $sql);

$response = [
  "status" => true,
  "message" => "Регистрация успешна"
];

echo json_encode($response);
?>
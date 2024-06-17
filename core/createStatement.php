<?php
session_start();
require_once 'connect.php';

$category = $_POST['category'];
$description = $_POST['description'];

$error_fields = [];

if ($category === '') {
  $error_fields[] = 'category';
}

if ($description === '') {
  $error_fields[] = 'description';
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

// Получаем данные пользователя из сессии
$user = $_SESSION['user'];
$full_name = $user['name'];
$department = $user['department'];

// Вставляем данные в базу данных
$sql = "INSERT INTO `statement` (`id`, `full_name`, `department`, `category`, `description`, `status`) 
        VALUES (NULL, '$full_name', '$department', '$category', '$description', 'Новое')";
$result = mysqli_query($conn, $sql);

if ($result) {
  $response = [
    "status" => true,
    "message" => "Заявление успешно создано"
  ];

  echo json_encode($response);
} else {
  $response = [
    "status" => false,
    "message" => "Ошибка при создании заявления"
  ];

  echo json_encode($response);
}
?>
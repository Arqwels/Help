<?php
require_once 'connect.php';

if (isset($_POST['id']) && isset($_POST['status'])) {
  $id = intval($_POST['id']);
  $status = mysqli_real_escape_string($conn, $_POST['status']);

  // Обновляем статус только если текущий статус "Новое"
  $sql = "UPDATE `statement` SET `status` = '$status' WHERE `id` = $id AND `status` = 'Новое'";
  if (mysqli_query($conn, $sql)) {
    echo json_encode(['success' => true]);
  } else {
    echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
  }
} else {
  echo json_encode(['success' => false, 'error' => 'Invalid parameters']);
}
?>
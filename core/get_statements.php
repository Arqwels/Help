<?php
session_start();

if (!isset($_SESSION['user'])) {
  header('Location: login_page.php');
  exit();
}

require 'connect.php';

$full_name = $_SESSION['user']['name'];

$sql = "SELECT id, category, description, status FROM statement WHERE full_name = ?";
$stmt = $conn->prepare($sql);
if ($stmt === false) {
  die('Error prepare statement: ' . $conn->error);
}
$stmt->bind_param("s", $full_name);
$stmt->execute();
$result = $stmt->get_result();

$statements = array();
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $statements[] = $row;
  }
}

$stmt->close();
$conn->close();

echo json_encode($statements);
?>
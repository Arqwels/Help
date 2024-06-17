<?php
require_once 'connect.php';

$sql = "SELECT id, full_name, department, category, description, status FROM `statement`";
$result = mysqli_query($conn, $sql);

$statements = [];

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $statements[] = $row;
  }
}

echo json_encode($statements);
?>
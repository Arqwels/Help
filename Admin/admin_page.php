<?php
session_start();

if (!isset($_SESSION['admin'])) {
  header('Location: ../index.php');
  exit();
}
if (isset($_SESSION['user'])) {
  header('Location: profile_page.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="RU">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/admin.css">
  <title>Админка</title>
</head>
<body>
<main class="wrapper">
  <div class="container">
    <header class="head">
      <h3>Техподдержка "Help!!!"</h3>

      <div class="head__info">
        <p>ПАНЕЛЬ АДМИНИСТРАТОРА</p>
        <p>Отдел - <?php echo $_SESSION['admin']['department']; ?></p>
      </div>
      
      <a href="./core/logout.php" class="logout">Выйти</a>
    </header>

    <div class="statement">
      <h3>Все заявления</h3>
      <table>
        <thead>
          <tr>
            <th>№</th>
            <th>ФИО</th>
            <th>Отдел</th>
            <th>Категория</th>
            <th>Описание проблемы</th>
            <th>Статус</th>
          </tr>
        </thead>
        <tbody>
          <!-- Данные будут динамически добавлены сюда -->
        </tbody>
      </table>
    </div>
  </div>
</main>

<script src="./js/jquery-3.7.1.min.js"></script>
<script src="./js/main.js"></script>
</body>
</html>
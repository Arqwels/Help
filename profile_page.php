<?php
session_start();

if (!isset($_SESSION['user']) || isset($_SESSION['admin'])) {
  header('Location: index.php');
  exit();
}
?>

?>

<!DOCTYPE html>
<html lang="RU">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/profile.css">
  <title>Профиль</title>
</head>
<body>
<main class="wrapper">
  <div class="container">
    <header class="head">
      <h3>Техподдержка "Help!!!"</h3>

      <div class="head__info">
        <p>Заказы пользователя - <?php echo $_SESSION['user']['name']; ?></p>
        <p>Отдел - <?php echo $_SESSION['user']['department']; ?></p>
      </div>
      
      <a href="./core/logout.php" class="logout">Выйти</a>
    </header>

    <div class="statement">
      <h3>Ваши заявления</h3>
      <table>
        <thead>
          <tr>
            <th>№</th>
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

    <a href="./newStatement_page.php" class="newStatement">Новое заявление</a>
  </div>
</main>

<script src="./js/jquery-3.7.1.min.js"></script>
<script src="./js/getStatements.js"></script>
</body>
</html>
<?php
session_start();

if (!isset($_SESSION['user']) || isset($_SESSION['admin'])) {
  header('Location: index.php');
  exit();
}

?>

<!DOCTYPE html>
<html lang="RU">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/newStatement.css">
  <title>Новое заявление</title>
</head>
<body>
  <main class="wrapper">
    <div class="container">
      <button class="button" id="backButton">Назад</button>

      <form class="form">
        <label class="form__label" for="category">Список категории:</label>
        <select class="form__input" id="category">
          <option value="printer">Принтер</option>
          <option value="computer">Компьютер</option>
          <option value="laptop">Ноутбук</option>
          <option value="software">ПО</option>
          <option value="network">Сеть</option>
          <option value="other">Другое</option>
        </select>

        <label class="form__label" for="description">Описание</label>
        <textarea class="form__textarea" id="description"></textarea>

        <button type="submit" class="btn__createNewStatement">Отправить</button>
      </form>
    </div>
  </main>

  <script src="./js/jquery-3.7.1.min.js"></script>
  <script src="./js/main.js"></script>
  <script>
    document.getElementById('backButton').addEventListener('click', function() {
      window.history.back();
    });
  </script>
</body>
</html>
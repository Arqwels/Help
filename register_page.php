<?php
session_start();

if (isset($_SESSION['user']) || isset($_SESSION['admin'])) {
  header('Location: index.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="RU">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/register.css">
  <title>Регистрация</title>
</head>
<body>

  <main class="wrapper">

    <div class="container">
      <h1>Регистрация</h1>
      <form class="register">

        <label for="login">Логин</label>
        <input type="text" id="login" name="login" placeholder="Введите свой логин" required>

        <label for="password">Пароль</label>
        <input type="password" id="password" name="password" placeholder="Введите свой пароль" required>

        <label for="fullName">ФИО</label>
        <input type="text" id="fullName" name="fullName" placeholder="Введите своё ФИО" required>

        <label for="phone">Телефон</label>
        <input type="tel" id="phone" name="phone" placeholder="Введите свой телефон +7" required>

        <label for="email">Электронная почта</label>
        <input type="email" id="email" name="email" placeholder="Введите свою почту" required>

        <label for="department">Выбор отдела</label>
        <select id="department" name="department" required>
          <option value="" disabled selected>Выберите отдел</option>
          <option value="Отдел кадров">Отдел кадров</option>
          <option value="Бухгалтерия">Бухгалтерия</option>
          <option value="IT отдел">IT отдел</option>
          <option value="Отдел продаж">Отдел продаж</option>
        </select>

        <p class="error__form none"></p>

        <button type="submit" class="register__btn">Зарегистрироваться</button>
      </form>

      <p class="login">Уже зарегистрирован? <a href="index.php">Авторизируйся!</a></p>
    </div>

  </main>
  
  <script src="./js/jquery-3.7.1.min.js"></script>
  <script src="./js/main.js"></script>
</body>
</html>
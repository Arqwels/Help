<?php
session_start();

if (isset($_SESSION['user'])) {
  header('Location: profile_page.php');
  exit();
} else if (isset($_SESSION['admin'])) {
  header('Location: ./Admin/admin_page.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="RU">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/login.css">
  <title>Авторизация</title>
</head>
<body>

  <main class="wrapper">

    <div class="container">
      <h1>Авторизация</h1>
      <form class="login">

        <label for="login">Логин</label>
        <input type="text" id="login" placeholder="Введите свой логин" required>

        <label for="email">Электронная почта</label>
        <input type="email" id="email" placeholder="Введите свою почту" required>

        <label for="password">Пароль</label>
        <input type="password" id="password" placeholder="Введите свой пароль" required>

        <p class="error__form none"></p>

        <button type="submit" class="login__btn">Авторизироваться</button>
      </form>

      <p class="register">Ещё не зарегистрирован? <a href="register_page.php">Зарегистрироваться!</a></p>
    </div>

  </main>
  
  <script src="./js/jquery-3.7.1.min.js"></script>
  <script src="./js/main.js"></script>
</body>
</html>
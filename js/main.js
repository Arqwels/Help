// Авторизация

$('.login__btn').click(function (event) {
  event.preventDefault();

  $('input').removeClass('error__field');

  let login = $('#login').val(),
      email = $('#email').val(),
      password = $('#password').val();

  $.ajax({
    url: './core/login.php',
    type: 'POST',
    dataType: 'json',
    data: {
      login: login,
      email: email,
      password: password
    },
    success (data) {
      if (data.status) {
        if (data.type === 99) {
          
          document.location.href = './Admin/admin_page.php';
          console.log(123123123);
          return;
        }
        document.location.href = './profile_page.php';
      } else {

        if (data.type === 1) {
          data.fields.forEach((field) => {
            $(`#${field}`).addClass('error__field');
          })
        }

        $('.error__form').removeClass('none').text(data.message);
      }
    }
  })
});



// Регистрация

$('.register__btn').click(function (event) {
  event.preventDefault();

  $('input, select').removeClass('error__field');

  let login = $('#login').val(),
      password = $('#password').val(),
      fullName = $('#fullName').val(),
      phone = $('#phone').val(),
      email = $('#email').val(),
      department = $('#department').val();

  $.ajax({
    url: './core/register.php',
    type: 'POST',
    dataType: 'json',
    data: {
      login: login,
      password: password,
      fullName: fullName,
      phone: phone,
      email: email,
      department: department
    },
    success (data) {
      if (data.status) {
        document.location.href = './login_page.php';
      } else {
        if (data.type === 1) {
          data.fields.forEach((field) => {
            $(`#${field}`).addClass('error__field');
          })
        }
        $('.error__form').removeClass('none').text(data.message);
      }
    }
  })
});

// Создание новой заявки
$('.btn__createNewStatement').click(function (event) {
  event.preventDefault();

  // Собираем данные из формы
  const category = $('#category').val();
  const description = $('#description').val();

  // Проверяем, что поля не пустые
  if (category === '' || description === '') {
    alert('Пожалуйста, заполните все поля.');
    return;
  }

  // Отправляем данные на сервер
  $.ajax({
    url: './core/createStatement.php',
    type: 'POST',
    dataType: 'json',
    data: {
      category: category,
      description: description
    },
    success: function (response) {
      if (response.status) {
        alert('Заявление успешно создано!');
        window.location.href = './login_page.php'; // Перенаправляем на страницу со списком заявлений
      } else {
        alert(response.message);
      }
    },
    error: function () {
      alert('Произошла ошибка при создании заявления.');
    }
  });
});
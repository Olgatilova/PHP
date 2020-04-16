<?
  $title = "Регистрация";
  $style = "";
  require_once('site_components/header.php'); //присоединение файла header.php со стандартными настройками
?>
    <div class="conteiner-fluid">
      <div class="row justify-content-center mt-5"><!--создаем контейнер по центру на 8 колов-->
        <div class="col-8">
          <h1 class="text-center">Регистрация</h1>
          <form action="reg_obr.php" method="POST"> <!-- метод  сохранения данных method="GET"(видно все в адресной строке) и method="POST" скрытие данных? , создаем новый файл "reg_obr.php"-->
            <div class="input-group mb-3"> <!-- берем с бустрапа компаненты, группы ввода-->
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="Введите Login" aria-label="Имя пользователя" aria-describedby="basic-addon1" name= "login">
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-unlock" aria-hidden="true"></i></span> <!-- вместо собаки вставляем иконки <i class="fa fa-unlock" aria-hidden="true"></i>с сайта https://fontawesome.ru/-->
              </div>
              <input type="password" class="form-control" placeholder="Введите пароль" aria-label="Имя пользователя" aria-describedby="basic-addon1" name= "pass">
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-unlock" aria-hidden="true"></i></span>
              </div>
              <input type="password" class="form-control" placeholder="Повторите пароль" aria-label="Имя пользователя" aria-describedby="basic-addon1" name= "passrepeat"> <!-- добавляем во все инпуты name= " ", для отличия перед записью в базу данных <form action="#">-->
            </div>
            <h2 class= "text-center">Личная информация</h2>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-info" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="Имя" aria-label="Имя пользователя" aria-describedby="basic-addon1"name= "name">
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-info" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="Фамилия" aria-label="Имя пользователя" aria-describedby="basic-addon1"name= "lastname">
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-info" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="Отчество" aria-label="Имя пользователя" aria-describedby="basic-addon1" name= "patronymic">
            </div>
            <h6 class= "text">Дата рождения</h2>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
              </div>

              <input type="date" class="form-control" placeholder="дата рождения" aria-label="Имя пользователя" aria-describedby="basic-addon1" name= "birthdate">
            </div>
            <p class= "d-none text-danger error-message my-1 p-0"></p> <!--сообщение об ошибке в регистрации-->
            <input type= "submit" class="btn btn-primary btn-block mt-5" value= "Зарегистрироваться"> <!--кнопка-->
          </form>
        </div>
      </div>
    </div>
  <script>
    let form = document.querySelector('form[action="reg_obr.php"]');
    form.onsubmit = (e) => {
      e.preventDefault(); //прерываем событие
      //console.log("Пытаемся отправить форму");
      let formData = new FormData(form); //формируем данные для отправки
      //console.log(formData.get("patronymic") );
      
      fetch('reg_obr.php', {  // отправка на сервер
        method: 'POST',
        body: formData,
      })
        .then(response => response.text()) //then - затем, ответ сервера, ответ-текст
        .then(result => { //console.log(result)}); не все поля заполнены
          if (result == "ok") {
            alert("Пользователь успешно зарегистрирован")// если все ок, 
            window.location.href = "auth.php"; //то перебрасывает в личный кабинет
          } else {  // иначе 
            //console.log(result);
            showErrorMessage(result);
          }
        });
    }
    function showErrorMessage(message) {
      let messageParagraph = form.querySelector('.error-message');// найти элемент
      //console.log( [messageParagraph, message] );
      messageParagraph.classList.remove("d-none");//показать скрытый элемент
      messageParagraph.innerHTML = message; //вывести сообщение
    }
  </script>
<?
  require_once('site_components/footer.php'); //присоединение файла footer.phpсо стандартными настройками
?>  
  

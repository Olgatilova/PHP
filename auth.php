<?
  $title = "Войти";
  $style = "";
  require_once('site_components/header.php'); //присоединение файла header.php со стандартными настройками
?>  
    <div class="conteiner-fluid">
      <div class="row justify-content-center mt-5"><!--создаем контейнер по центру на 8 колов-->
        <div class="col-6">
          <h1 class="text-center">Войти</h1>
          <form action="auth_obr.php" method="POST"> <!-- метод  сохранения данных method="GET"(видно все в адресной строке) и method="POST" скрытие данных? , создаем новый файл "reg_obr.php"-->
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
            <p class= "d-none text-danger error-message my-1 p-0"></p> <!--сообщение об ошибке в авторизации-->
            <input type= "submit" class="btn btn-primary btn-block mt-2" value= "Войти"> <!--кнопка-->
          </form>
        </div>
      </div>
    </div> 
<script>

  let form = document.querySelector('form[action="auth_obr.php"]');//при авторизации не перебоасывает на другую страницу
  form.onsubmit = (e) => {  //e-event отлавливаем событие
    e.preventDefault(); // обрубаем переход на другую страницу
    //console.log(e.target); //e.target -элемент на котором произведено событие(цель события)
    let formData = new FormData(form);
   // console.log([formData.get('login'), formData.get('pass')]);// отправка данных логин и пароль в файл auth_obr.php
    fetch('auth_obr.php', {  // отправка на сервер
      method: 'POST',
      body: formData,
    })
      .then(response => response.text())//then - затем, ответ сервера, ответ-текст
      .then(result => {
      if (result == "ok") { // если все ок, 
        window.location.href = "lk.php"; //то перебрасывает в личный кабинет
      } else {  // иначе 
        showErrorMessage(result);
      }
    });
  }
  function showErrorMessage(message) {
    let messageParagraph = form.querySelector('.error-message');// найти элемент
    //console.log( [messageParagraph, message] );
    messageParagraph.classList.remove("d-none");//показать элемент
    messageParagraph.innerHTML = message; //вывести сообщение
  }
  
</script>
<?
  require_once('site_components/footer.php'); //присоединение файла footer.phpсо стандартными настройками
?>  
   

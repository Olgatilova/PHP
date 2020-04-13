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
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
              </div>
              <input type="date" class="form-control" placeholder="дата рождения" aria-label="Имя пользователя" aria-describedby="basic-addon1" name= "birthdate">
            </div>
            <input type= "submit" class="btn btn-primary btn-block mt-2" value= "Зарегистрироваться"> <!--кнопка-->
          </form>
        </div>
      </div>
    </div>  
<?
  require_once('site_components/footer.php'); //присоединение файла footer.phpсо стандартными настройками
?>  
  

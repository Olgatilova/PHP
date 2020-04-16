<?php
  require_once("../site_components/header.php"); //подвязываем 
?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-8">
      <h1 class="text-ctnter">Узнать ИНН</h1>
      <form action="inn_obr.php" method="POST">
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
          <input type="text" class="form-control" placeholder="Имя" aria-label="Имя пользователя" aria-describedby="basic-addon1"name= "name">
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="fa fa-info" aria-hidden="true"></i></span>
          </div>
          <input type="text" class="form-control" placeholder="Отчество" aria-label="Имя пользователя" aria-describedby="basic-addon1" name= "patronymic">
        </div>
          <h6 class= "text">Номер паспорта</h2>
          <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="fa fa-info" aria-hidden="true"></i></span>
          </div>
          <input type="text" class="form-control" placeholder="Номер паспорта" aria-label="Имя пользователя" aria-describedby="basic-addon1"name= "docno">
          </div>

          <h6 class= "text">Дата рождения</h2>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
            </div>
  
            <input type="date" class="form-control" placeholder="дата рождения" aria-label="Имя пользователя" aria-describedby="basic-addon1" name= "birthdate">
          </div>
          <p class= "d-none text-danger error-message my-1 p-0"></p> <!--сообщение об ошибке в регистрации-->
          <input type= "submit" class="btn btn-dark btn-block mt-5" value= "Узнать ИНН"> <!--кнопка-->

      </form>
    </div>
  </div>
</div>

<?php
  require_once("../site_components/footer.php");

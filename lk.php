<?php
  session_start();
  if(!$_SESSION['id']) {  //если пользователь не вошет, то направляй на авторизацию
    
    header('Location: auth.php'); //не пускает в личный кабинет, пока не авторизовались
  }
  //include() / include_once();
  //require() / require_once();
  $title = "Личный кабинет"; /*переменная для header.php*/
  $style = ' 
   tr {
     font-size: 22px;
   }
   table {
     width: 100%;
     margin-top: 50px;
   }
   .fa-pencil, fa-check, fa-times { 
     cursor: pointer; 
   }
   ';/*переменная для header.php*/
   
   
  require_once('site_components/header.php'); //присоединение файла header.php со стандартными настройками
  
  
?>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-6">
              <h1 class="text-cеnter mt-5">Личный кабинет</h1>
              <h4>Здравствуйте, <span><?php echo $_SESSION['name'] ?></span></h4>
                <br>
                <br>
                <table style="width: 100%">
                  <tr>
                    <td>Логин:</td>
                    <td class= "data" data="login"><?php echo $_SESSION['login'];?></td>
                    <td>
                      <span class="edit">
                        <i class="fa fa-pencil" aria-hidden="true"></i><!-- иконка изменения личных данных с сайта https://fontawesome.ru/icon/-->
                      </span>  
                      <span class="startedit d-none"> <!--d-none спрятать крестик и галку-->
                        <i class="fa fa-check" aria-hidden="true"></i> <!-- иконка галка-->
                        <i class="fa fa-times" aria-hidden="true"></i> <!-- иконка крест с сайта https://fontawesome.ru/icon/-->
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <td>Фамилия:</td>
                    <td><?php echo $_SESSION['lastname'];?></td>
                  </tr>
                  <tr>
                    <td>Имя:</td>
                    <td><?php echo $_SESSION['name'];?></td>
                  </tr>
                  <tr>
                    <td>Очество:</td>
                    <td><?php echo $_SESSION['patronymic'];?></td>
                  </tr>
                  <tr>
                    <td>Дата рождения:</td>
                    <td><?= $_SESSION['birthdate'];?></td> <!--всемто echo  допустимо ставить (=) -->
                  </tr>
                </table>
        </div>
      </div>
    </div>
    <script>
      let pens = document.querySelectorAll('.fa-pencil'); /* нашли все элементы класса*/
      for (let i = 0; i <pens.length; i++) { /* перебираем элементы*/
        pens[i].onclick = startEdit; /* вешаем онклик*/
      }
      function startEdit() {
        let buttonsTd = this.parentElement.parentElement;
        let dataTd = buttonsTd.previousElementSibling;
        
        let editSpan = buttonsTd.querySelector('.edit');
        let startEditSpan = buttonsTd.querySelector('.startedit'); /*обращаемся к элементу*/
        
        startEditSpan.classList.remove('d-none'); /* удаляем d-none с галки и креста*/
        editSpan.classList.add('d-none'); /* убирает значек ручки*/
        let okBtn = buttonsTd.querySelector('.fa-check');
        let denyBtn = buttonsTd.querySelector('.fa-times');
        
        denyBtn.onclick = () => {
          startEditSpan.classList.add('d-none'); /* при нажатии на крест появляется ручка */
          editSpan.classList.remove('d-none');
        }
      }
    </script>
<? require_once('site_components/footer.php'); //присоединение файла footer.php со стандартными настройками
?>





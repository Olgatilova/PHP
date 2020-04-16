<?php
session_start(); // сессия открыта
require_once("db.php"); // подключение к БД
//exit(var_dump($_POST));

if (!isset($_POST)) {
  exit('Неверный запрос');
}
$id = $_SESSION['id']; // подключение к id
$response = ""; // тело ответа
foreach($_POST as $name=>$value) { //для каждого элемента в массиве
  $value = htmlspecialchars(trim($value));// чтобы не смогли отправить скрипты или пробелы
  if($name == 'login' or $name == 'password' or $name == 'id') {
    exit("Нельзя менять логин и пароль!"); // не возможность на бекэнде пользователю менять логин, id и пароль
  }
  
  $result = $mysqli->query("UPDATE `users` SET `$name`= '$value' WHERE `id` = '$id'");
  if ($result) {
   $response = "Данные обновлены";
   $_SESSION[$name] = $value; // изменение в личном кабинете
  } else {
    $response = "Не удалось обнавить данные";
  }
}
exit($response);



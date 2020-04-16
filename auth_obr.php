<?php
session_start();// для сохранения результатов входа на сайт логин/пароль для всех страниц сайта
header('Content-type: text/html; charset=utf-8');
require_once("db.php"); // подключение к БД


$login = htmlspecialchars(trim($_POST["login"]));
$pass = htmlspecialchars(trim($_POST["pass"]));

if (empty($login) or empty($pass)) {
  exit("Не все поля заполнены!");
}

 $result = $mysqli->query("SELECT * FROM `users` WHERE `login`='$login'"
 )->fetch_assoc();// Возвращает ряд результата запроса в качестве ассоциативного массива, проверка на совподение логина и пароля с БД
 
if(!isset($result) or !password_verify($pass,  $result['password'])) {
  exit("Неверный логин или пароль"); //проверка на совподение логина и пароля с БД и раскодированием
}

$_SESSION['id'] = $result['id']; // для сохранения результатов входа на сайт логин/пароль для всех страниц сайта
$_SESSION['login'] = $result['login'];
$_SESSION['name'] = $result['name'];
$_SESSION['lastname'] = $result['lastname'];
$_SESSION['patronymic'] = $result['patronymic'];
$_SESSION['birthdate'] = $result['birthdate'];


//header("Location: lk.php"); //- если на страницу auth_obr.php ничего не выводилось

//exit("<script>window.location.href='lk.php'</script>"); //- если на странице auth_obr.php есть код
exit("ok"); //- если на странице auth_obr.php есть код





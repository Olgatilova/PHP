<?php
require_once("db.php"); // подключение к БД
/*$_GET
*/
header('Content-type: text/html; charset=utf-8');

$login = trim($_POST["login"]); 
$pass = trim($_POST["pass"]);
$passrepeat = trim($_POST["passrepeat"]);
$name = trim($_POST["name"]);
$lastname = trim($_POST["lastname"]);
$patronymic = trim($_POST["patronymic"]);
$birthdate = trim($_POST["birthdate"]);

$login = htmlspecialchars($login); // для защиты от атак с вводом скрипта/кода в поля
$pass = htmlspecialchars($pass); // для защиты от атак
$passrepeat = htmlspecialchars($passrepeat); // для защиты от атак
$name = htmlspecialchars($name); // для защиты от атак
$lastname = htmlspecialchars($lastname); // для защиты от атак
$patronymic = htmlspecialchars($patronymic); // для защиты от атак
$birthdate = htmlspecialchars($birthdate); // для защиты от атак

if (empty($login) or empty($pass)  or empty($passrepeat) or empty($name) or empty($lastname) or empty($patronymic) or empty($birthdate)) {
  exit("Не все поля заполнены!"); //для невозможности отправки пустых полей
}

 if (!preg_match("/^([a-zA-Z0-9])+([-_\.@])*/",$login) // проверка на недопустимые
    or !preg_match("/^([a-zA-Z0-9-_.])+$/",$pass)) {
  
  exit("Недопустимые символы в логине или пароле");
}

if ((mb_strlen($login) < 3 or mb_strlen($login) > 32) // длинна логина
 or (mb_strlen($pass) < 3 or mb_strlen($pass) > 16)  // длинна пароля
 ){
 exit("Слишком длинные или слишком короткие логин/пароль");
}


if ($pass != $passrepeat) {  //проверка пароля на совпадение
  exit("Пароли не совпадают!");
}
 //3rKgVqo*
$pass = password_hash($pass, PASSWORD_BCRYPT);

 //-----подключение к базе данных require_once("db.php"); // подключение к БД------------------

$result = $mysqli->query("SELECT * FROM `users` WHERE `login`='$login'");// из бегета ,SQL, копируем сюда
//exit(var_dump($result->fetch_assoc())); //для сравнения совпадений
$result = $result->fetch_assoc();// Возвращает ряд результата запроса в качестве ассоциативного массива
if (isset($result)) { //isset - установле но ли
 exit("Такой пользователь уже зарегистрирован!"); // проверка на повтор логина
}

$result = $mysqli->query("INSERT INTO `users`(`login`, `password`, `name`, `lastname`, `patronymic`, `birthdate`) VALUES ('$login', '$pass', '$name', '$lastname', '$patronymic', '$birthdate')"); // из бегета ,SQL, insert копируем сюда, удаляем все []скобки

if(!$result) {
 exit("Не удалось добавить пользователя");
}
  exit("ok");
 
/*exit("$login | $pass | $passrepeat | $name | $lastname | $patronymic | $birthdate <br>");//exit как реторн, после него код дальше не работает*/








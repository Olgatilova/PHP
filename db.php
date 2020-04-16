<?php
$dbhost = "localhost";  // присоединяем сайт к базе данных бегета
$dbuser = "olgatilova_auth";
$dbpass = "3rKgVqo*"; // пароль из бд бегета
$dbname = "olgatilova_auth";
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
$mysqli->set_charset("utf-8"); //метод обьекта

if ($mysqli->connect_error) { // если не удается подключиться к базе данных
 die("Не удалось подключиться к БД" .$mysqli->connect_error);
}

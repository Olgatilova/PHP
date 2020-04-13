<?php session_start() ?> <!--для определения зашел пользователь или нет-->

<!doctype html> <!--копируем файл auth и убираем лишнее. все после <body> до скриптов <!-- Optional JavaScript -->
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title><?= $title ?></title> <!--назначаем переменную, для любых файлов этого ?= тоже самое что и echo сайта-->
    <style><?= $style ?></style> <!--тоже-->
  </head>
  <body> <!--начало всех файлов(тоже из бустрапа вырезаем из файлов, при необходимости и вставляем сюда-->
  
    <!--добавляем навигационную панель из бустрапа-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Домой <span class="sr-only">(current)</span></a> <!--"href=../index.php" переход на страницу-->
          </li>
        </ul>
        <?php if ($_SESSION['id']): ?> <!--если есть id (тоесть пользователь уже вошел на сайт) тогда отображается кнопка выйти-->
          <a href="exit.php" class="btn btn-success my-2 my-sm-0">Выйти</a>
        <?php else: ?> <!--иначе отображаются две другие кнопки-->
          <a href="auth.php" class="btn btn-success mr-2 my-2 my-sm-0">Войти</a>
          <a href="reg.php" class="btn btn-success my-2 my-sm-0">Регистрация</a>
         <?php endif; ?>
      </div>
    </nav>
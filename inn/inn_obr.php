<?php
header('Content-type: text/html; charset=utf-8');

$fam = htmlspecialchars(trim($_POST["lastname"]));
$nam = htmlspecialchars(trim($_POST["name"]));
$otch = htmlspecialchars(trim($_POST["patronymic"]));
$docno = htmlspecialchars(trim($_POST["docno"]));
$bdate = htmlspecialchars(trim($_POST["birthdate"]));

if (empty($fam) or empty($nam) or empty($otch) or empty($docno) or empty($bdate)) {
  exit("Не все поля заполнены");
}


$docno = str_replace([" ", "-"], "", $docno); // убираем пробелы и тире из номера паспорта

if (mb_strlen($docno) != 10) { //проверка на длинну номера
  exit("Некорректный номер паспорта");
}

$docno = mb_substr($docno,0,2)." ".mb_substr($docno,2,2)." ".mb_substr($docno,4); //разделяем ПН на 2 символа начиная с 0, далее со второго символа два, и с 4 символа до конца
$bdate = explode("-", $bdate); // разделяем дату по -
$bdate = array_reverse($bdate); // разворот дата/месяц/год
$bdate = join(".", $bdate); //

if (mb_strlen($bdate) != 10) { 
  exit("Некорректная дата рождения");
}

$data = "c=innMy&captcha=&captchaToken=&fam=$fam&nam=$nam&otch=$otch&bdate=$bdate&bplace=&doctype=21&docno=$docno&docdt="; //копируем с сайта

$result = getCurl("https://service.nalog.ru/inn-proc.do", $data); // сайт копируем 

//exit(var_dump($result));
//exit($result['inn']);
if ($result["code"] == 1) {
  exit($result['inn']);
} else {
  exit(var_dump($result));
}

function getCurl($url, $data) { //для отправки запроса на сервер необходимо curl иницианализация
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);// на какой url идет запрос
  curl_setopt($curl, CURLOPT_POST, true);// Указываем что отправляем методом POST
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data);//тело запроса POST
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);//переводит ответ из текста в массив
/*  curl_setopt($curl, CURLOPT_PROXYTYPE, CURLPROXY_HTTPS);  //вводим прокси
  curl_setopt($curl, CURLOPT_PROXY, "5.2.72.101:3128");  //вводим прокси и код через :
*/  
  $result = curl_exec($curl); // выполняем запрос curl
  curl_close($curl); //закрываем сессию curl
  $result = json_decode($result, true); //переводим/json_decode ответ в асоциативный массив /есть  json_encode - это наоборот
  return $result;
}

/*exit("$fam | $nam | $otch | $docno | $bdate");*/



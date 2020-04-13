<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
?>
<meta charset="UTF-8">
<h1>Мой первый сайт на PHP</h1>
<div style="border: 2px solid black;"> <!--php можно в нутри дива-->

  <?php  //код PHP можно не закрывать
    $name = "Вася";
    echo "<b>Привет ".$name." !</b>"; //жирный текст,вставка с точкой и в ковычках
    echo "<br>"; //переход на другую строку
    echo "<b>Привет $name!</b>"; 
    echo "<br>";
    echo '<b>Привет "$name!</b>'; //в одинарных ковычках не видно переменных
    

  ?>
</div>
<div style="border: 2px solid black; margin-top: 10px" >
  <?php  
    $banans = 5;
    $apples = 10;
    $fruitsTotal = $banans + $apples;//+ - / * ** %
    echo "$name сьел $fruitsTotal фруктов";
    echo "<br>";
    define("PI", 3.14);
    $radius = 10;
    $square = PI * ($radius **2);
    echo $square;
    echo "<br>";
    
    $stringNamber = "500";
    $number = (integer)$stringNamber; //перевод строчной переменной в численное значение
    echo $number + $number;
    echo "<br>";
    
    $number = 3.49;
    echo ceil($number)."<br>"; //округление в верх
    echo round($number)."<br>"; //округление по математической
    echo floor($number)."<br>"; //округление вниз
    echo "<br>";
    echo rand(10, 100)."<br>"; //вывод целого числа между 10 и 100(включидельно 10 и 100)
    $string = "Привет, ";
    $string .= "Вася!"; //обьедивение в строке .= 
    echo $string."<br>";
    
    
    
  ?>
</div>
<div style="border: 2px solid black; margin-top: 10px">
  <?php
    $a = 5;
    if ($a == 7) {
      echo "Равно";
    }else {
      echo "Не равно";
    }  
    echo "<br>";
    
    
    $a = 15;
    if (($a > 0 AND $a <= 10) OR $a == 15) { // и или
      echo "Равно";
    }else {
      echo "Не равно";
    }  
    echo "<br>";
    
    $food = "apple";
/*    if ($food == "apple") {
      echo $food." - фрукт";
    } elseif ($food == "cucumber") {
      echo $food."- овощ";
    } else {
      echo $food."- не сьедобно";
    }
*/    
    switch ($food) {
      case "apple";
      case "peach";
      case "orange";
        echo $food."- фрукт";
        break;
      case "cucumber";
      case "tomato";
      case "carrot";
        echo $food."- овощ";
        break;
      default:
        echo $food."- не сьедобен";
    }

  ?>
</div>
<h2>Циклы</h2>

<div style="border: 2px solid black; margin-top: 10px"> 
 <?php
   for ($i = 0; $i <= 10; $i++) {
     echo $i." | ";
   }
       echo "<br>";
  $count = 0;
   while ($count < 5) { //пока
     echo "<p>Счетчик: $count</p>";
     $count++;
   }
   echo "<br>";
   do { //делай
     echo "<p><b>Do Счетчик: $count</b></p>";
   } while ($count > 10);
   
   //-----------------массив---------------------------
   $cars = ["Лексус", "Ламборджини","БМВ","Феррари","Лада седан (баклажан)"];
   
   for ($i = 0; $i < count($cars); $i++) { //count -посчитать, перебрать длинну массива
     echo $cars[$i].", ";
   }
   echo "<br>";
   
   foreach ($cars as $car) { // тоже самое через foreach
   echo $car.", ";
   }
   echo "<br>";
   for ($i = 0; $i < count($cars) - 1; $i++) { //count -посчитать, перебрать длинну массива
     echo $cars[count($cars) - 1]; // в массиве счет идет с 0, поэтому -1 берет весь массив
   }
   echo "<br>";
   
   $family = array( // только в обычных скобках!
     "Папа" => "Вася", //ключь - папа, имя- значение
     "Мама" => "Света",
     "Сын" => "Дима",
     "Дочь" => "Варвара",
     "Кошка" => "Рыся",
     "Попугай" => "Понч",
   );
     echo var_dump($family); //array проверили через echo var_dump, только для проверки!
    echo "<br>";
    
    
    echo "<table border='1'>";
    echo "<tr><th>Ключ</th><th>Значение</th></tr>";
    foreach($family as $key=>$name) {
      echo "<tr><td>$key</td><td>$name</td></tr>";
    }
    echo "</table>";   //получили таблицу из ключей и их значений  

 ?>

</div>
<div style="display: flex; justify-content: center; border: 3px solid black; margin: 35px 0; padding: 15px"> <!--// свойства и значения отделяются :-->
  <table border="1">
  <!--  <tr>-->
<!--      <th>12</th>
      <th>12</th>
    </tr>
    <tr>
      <td>51</td>
      <td>51</td>  
    </tr>
-->  
    <?php
    
      for ($i = 1; $i < 10; $i++) { //таблица умножения
        echo "<tr>";
        for ($j = 1; $j < 10; $j++) {
          $multiply = $i*$j;
          echo "<td>$j * $i = $multiply</td>";
        }
        echo "</tr>";
      }
    ?>
  </table>
  
</div>
<div style="display: flex; justify-content: center; border: 3px solid black; margin: 35px 0; padding: 15px">
  <?php
  
    $vasyapetrov = array("name" => "Вася", "lastname" => "Петров");
    function getUserName($user = array("name" => "Иван", "lastname" => "Иванов")) { //$user это пораметр  заглушка иван иванов, при отсутствии переменной выводит заглушку
      return $user["name"];
    }
    echo getUserName();
    echo "<br>";
    
/*    $text = "sometext";
    function showText() { //для обращения к переменной, обьявленной вне функции используется слово global
      global $text;
      echo $text;
    }
    showText();*/
    
    echo "<br>";
    
     $text = "sometext";
      function showText() { //для обращения к переменной, обьявленной вне функции используется слово global
        global $text;
        $text .= " anothertext";// текст + этот текст
      }
      showText();
      echo $text;
      echo "<br>";
      
      function func() {
        static $count = 0; //static- вызывает функцию только 1 раз
        $count++;
        echo $count.'<br>';
        if($count < 10) {
          func();
        }
      }
       func();
       
  ?>
</div>
<h2>Работа со строками PHP</h2>
<div>
  <?php
    $string = "съешь еще этих мягких французских булок";
    echo strlen($string)."<br>"; //strlen- возвращает длинну строк(русские бук счит за 2 символа)
    
    $string = "съешь еще этих мягких французских булок";
    echo mb_strlen($string)."<br>"; //mb_strlen- возвращает длинну строк по количеству символов
    
    $striposString = mb_stripos($string, "еще"); //stripos-ищет кол-во символов до еще
    echo ($striposString)."<br>";
    echo mb_stripos($string, "еще")."<br>";
    
    $stristrString = mb_stristr($string, "мягких");
    echo $stristrString."<br>"; //stristr-ищет и выводит все после, включая мягких
    
    echo mb_substr($string, 6, 8)."<br>"; //mb_substr- убирает все после символа (числом до )
    echo mb_substr($string, -5, 3)."<br>"; // убирает все после символа с конца -бул (числом до )
    echo mb_substr($string, 6, -5)."<br>"; // еще этих мягких французских
    echo mb_substr($string, -17, -5)."<br>"; // французских
    
    $string2 = "hello my name is kermit the frog";
    echo ucfirst($string2)."<br>"; // ucfirst-первая заглавная
    echo ucwords($string2)."<br>"; // ucwords- все первые заглавные в каждом слове
    echo strtoupper($string2)."<br>"; //strtoupper-  все заглавные 
    
    $username = "      VasyaPetrov   "; //trim-убирает лишние пробелы справа, слева
    echo "/".$username."/<br>";
    $username = trim($username);
    echo "/".$username."/<br>";
    
    $mass = explode(" ",$string); // explode-разделение строки по пробелу на массив 
    /*echo var_dump($mass)."<br>";*/
    echo implode(", ",$mass); // implode -перевод массива в строку
    


  ?>
</div>
<h2>Работа с массивом</h2>
<div>
  <?php
   $cars = ["Лексус", "Ламборджини","БМВ","Феррари","Лада седан (баклажан)"];
   array_push($cars, "Запорожец", "Пежо"); //добавляет элемент в конец массива
     $cars[] = "Копейка";
   echo var_dump($cars)."<br>";
   
   $lastCar = array_pop($cars); //убирает элемент из конца массива
   echo var_dump($cars)."<br>";
   echo $firstCar."<br>";
   
   $lastCar = array_shift($cars); //убирает элемент в начале массива
   echo var_dump($cars)."<br>";
   echo $lastCar."<br>";
   
   $lastCar = array_unshift($cars, "Тайота"); //добавить элемент в начале массива
   echo var_dump($cars)."<br>";

   ?>
</div>
<div>
 <?php
 
   $cmsList = ["Wordpress", "Joomla", "1C-Bitrix", "Moodle", "OpenCart"]; //Content manegment system
   $sliceList = array_slice($cmsList, 2, 2); // array_slice - выбор из массива (создание нового массива)со второго элемента , два элемента
   echo var_dump($sliceList)."<br>";
     
    $family = array( // только в обычных скобках!
     "Папа" => "Вася", //ключь - папа, имя- значение
     "Мама" => "Света",
     "Сын" => "Дима",
     "Дочь" => "Варвара",
     "Кошка" => "Рыся",
     "Попугай" => "Понч",
   );
   $sliceList2 = array_slice($family, 2, 2, true);// true- сохраняет ключ, сын Дима, дочь Варавра
    echo var_dump($sliceList2)."<br>";
    echo "<br>";
    
    $cmsList = ["Wordpress", "Joomla", "1C-Bitrix", "Moodle", "OpenCart"]; 
    $deletedCms = array_splice($cmsList, 2, 2, ["Drupal", "ModX"]);// array_splice  -убирает "Moodle" вставляя на ее место "Drupal", "ModX"
    echo var_dump($cmsList)."<br>";
    echo var_dump($deletedCms)."<br>";
     
 
    $cmsList = ["Wordpress", "Joomla", "1C-Bitrix", "Moodle", "OpenCart"]; 
    $reverseCmsList = array_reverse($cmsList);// array_reverse - риверс, в обратную сторону
    echo var_dump($reverseCmsList);
    
    
    $cmsList = ["Wordpress", "Joomla", "1C-Bitrix", "Moodle", "OpenCart"]; 
    sort($cmsList); // сортировка по цифрам потом буквам
    echo var_dump($cmsList)."<br>";

    $cars = ["Лексус", "Ламборджини","БМВ","Феррари","Лада седан (баклажан)"];
    sort($cars);
    echo var_dump($cars)."<br>"; //сортировка по русс алфавиту
    
    $hasLada = in_array('Лада седан (баклажан)', $cars);// in_array -находится ли элемент в массиве true /false
    echo var_dump($hasLada)."<br>"; 
    
    

  ?>  
</div>
<hr>


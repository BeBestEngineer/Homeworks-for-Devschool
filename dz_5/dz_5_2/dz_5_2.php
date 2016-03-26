<?php
header('Content-type: text/html; charset=utf-8');   
error_reporting(E_ERROR|E_WARNING|E_PARSE|E_NOTICE|E_ALL);
    ini_set('display_errors', 1);

header('Content-type: text/html; charset=utf-8');
$news='Четыре новосибирские компании вошли в сотню лучших работодателей
Выставка университетов США: открой новые горизонты
Оценку «неудовлетворительно» по качеству получает каждая 5-я квартира в новостройке
Студент-изобретатель раскрыл запутанное преступление
Хоккей: «Сибирь» выстояла против «Ак Барса» в пятом матче плей-офф
Здоровое питание: вегетарианская кулинария
День святого Патрика: угощения, пивной теннис и уличные гуляния с огнем
«Красный факел» пустит публику на ночные экскурсии за кулисы и по закоулкам столетнего здания
Звезды телешоу «Голос» Наргиз Закирова и Гела Гуралиа споют в «Маяковском»';
$news = explode("\n", $news);

# Точка входа
if ( isset( $_POST['id'] ) ) {
    Check_id ( $news );    
} else {
    header("HTTP/1.0 404 Not Found");
    include_once "404.html";    
}

# Функция проверки значения параметра id:
function Check_id ( $n ) {
if ( $_POST['id'] >= 0 && $_POST['id'] <= ( count( $n ) - 1 ) && !preg_match('@[ \D ]@u', $_POST['id']) && $_POST['id'] !=='' ) {
    Specific_news ( $n, $_POST['id'] );
} else {
    All_news ( $n );
  }
}

# Функция вывода всего списка новостей:
function All_news ( $n ) {
    echo '<h4>Список новостей (для выбора новости введите в текстовое поле цифру от 0 до 8:</h4>';
        foreach ( $n as $key => $value ) {
            echo ''.$key.'. '.$value.'';
            echo '<br>';
    }
}

# Функция вывода конкретной новости:
function Specific_news ( $n, $pid ) {
    echo ''.$pid.'. ';
    echo $n [ (int)$pid ];
    echo '<br>';
    echo '<br>';
    echo ' &nbsp  &nbsp <i>Для вывода списка новостей введите параметр \'all\' в текстовое поле.</i>';
}
?>

<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8">
  <title>Новости Города</title>
 </head>
 <body>

 <form action="dz_5_2.php", method ="POST">
  <p><b>Текстовое поле</b></p>
  <p>
  <input type="text" name="id" value="">
  </p>
  <p><input type="submit"></p>
 </form>

 </body>
</html>
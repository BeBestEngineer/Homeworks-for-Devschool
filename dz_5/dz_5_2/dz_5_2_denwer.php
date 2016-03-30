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

array_unshift( $news, "apple" );
unset( $news[ 0 ] );

# Точка входа
if ( isset( $_POST['id'] ) ) {
    $safe_id = (int) $_POST['id'];
        Check_id ( $news, $safe_id );    
} elseif ( !isset( $_POST['all'] ) ) {
    header("HTTP/1.0 404 Not Found");
    include_once "404.html";    
}

if ( isset( $_POST['all'] ) ) {    
    All_news ( $news );
}

# Функция проверки значения переменной safe_id:
function Check_id ( $n, $si ) {
if ( $si >= 1 && $si <= ( count( $n ) - 1 ) ) {
    Specific_news ( $n, $si );
} else {
    All_news ( $n );
  }
}

# Функция вывода всего списка новостей:
function All_news ( $news ) {
    echo '<h4>Список новостей (для выбора новости введите в адресную строку параметр id = 1...9):</h4>';
        foreach ( $news as $key => $value ) {
            echo ''.$key.'. '.$value.'';
            echo '<br>';
    }
}

# Функция вывода конкретной новости:
function Specific_news ( $n2, $si2 ) {
    echo ''.$si2.'. ';
    echo $n2 [ $si2 ];
    echo '<br>';
    echo '<br>';
    echo ' &nbsp  &nbsp <i>Для вывода списка новостей введите параметр \'all\' в адресную строку.</i>';
}
?>

<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8">
  <title>Новости Города</title>
 </head>
 <body>

 <form action="dz_5_2_denwer.php", method ="POST">
  <p><b>Текстовое поле</b></p>
  <p>
  <input type="text" name="id" value="">
  </p>
  <p><input type="submit"></p>
 </form>

 </body>
</html>
<?php
   error_reporting(E_ERROR|E_WARNING|E_PARSE|E_NOTICE);
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

function All_news ( $p) {
    static $n = -1;
    echo '<br>';
    $n = $n + 1;
    echo ''.$n.'. '.$p.'';
}

if (count($_POST) == 0 || strlen($_POST['id']) == 0) {
    echo '<i>Введите знак \'#\' чтобы просмотреть список новостей</i>';
} elseif ($_POST['id'] == '#') {
    echo 'Список новостей (для выбора новости введите в <strong>текстовое поле</strong> цифру от 0 до 8 чтобы просмотреть новость)';
    echo '<hr>';
    array_map('All_news', $news);
} elseif (preg_match('@[0-8]@u', $_POST['id']) && strlen($_POST['id']) <= 1) {
    echo $news [$_POST['id']];
     echo '<br>';
      echo '<i>Чтобы венрнуться к списку новостей введите в <strong>текстовое поле</strong> знак \'#\'</i>';
} else {
    echo '<h1>Ошибка 404</h1>';
    header('HTTP/1.0 404 NOT FOUND');
}
?>

<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8">
  <title>Новости Города</title>
 </head>
 <body>

 <form action="index.php", method ="POST">
  <p><b>Текстовое поле</b></p>
  <p>
  <input type="text" name="id" value="">
  </p>
  <p><input type="submit"></p>
 </form>

 </body>
</html>
    

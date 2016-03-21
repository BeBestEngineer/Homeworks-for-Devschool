<?php
   error_reporting(E_ERROR|E_WARNING|E_PARSE|E_NOTICE);
    ini_set('display_errors', 1);

#Задание 1    
$name='Alexander';
$age=28;
echo 'Меня зовут '.$name.'.<br/>';
echo 'Мне '.$age.' лет.';
unset($name, $age);

#Задание 2
define ('My_City', '<h2>Омск 2016</h2>');
if (defined('My_City')) {
    echo '<br/>';
    echo My_City;
}
define ('My_City', 'Москва 2016');

#Задание 3
$book['title']='JavaScript.Библия пользователя';   
$book['autor1']='Дэнни Гудман';
$book['autor2']='Майкл Моррисон';
$book['pages']='1175';
echo '<br/>';
echo 'Недавно я прочитал книгу "'.$book['title'].'", написанную авторами: '
        . ''.$book['autor1'].'ом и '.$book['autor2'].'ом, я осилил все'
        . ' '.$book['pages'].' страниц, мне она очень понравилась.';

#Задание 4
$book1 = array (
    'title' => 'Вермуты и другие аперитивы',
    'autor' => 'Джаред Браун',
    'pages' => '264',
);
$book2 = array (
    'title' => 'Промышленная гидропоника',
    'autor' => 'док. Максвелл Бентли',
    'pages' => '819',
);
$books = array( $book1, $book2);
$page_amount = $book1['pages'] + $book2['pages'];
echo '<br/>';
echo '<br/>';
echo 'Недавно я прочитал книги "'.$book1['title'].'" и "'.$book2['title'].'", написанные авторами: '
        . ''.$book1['autor'].'ом и '.$book2['autor'].', я осилил в сумме '.$page_amount.' страницы, не ожидал от себя подобного.';
?>
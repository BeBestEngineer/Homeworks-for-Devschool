<?php
   error_reporting(E_ERROR|E_WARNING|E_PARSE|E_NOTICE);
    ini_set('display_errors', 1);

#������� 1    
$name='Alexander';
$age=28;
echo '���� ����� '.$name.'.<br/>';
echo '��� '.$age.' ���.';
unset($name, $age);

#������� 2
define ('My_City', '<h2>���� 2016</h2>');
if (defined('My_City')) {
    echo '<br/>';
    echo My_City;
}
define ('My_City', '������ 2016');

#������� 3
$book['title']='JavaScript.������ ������������';   
$book['autor1']='����� ������';
$book['autor2']='����� ��������';
$book['pages']='1175';
echo '<br/>';
echo '������� � �������� ����� "'.$book['title'].'", ���������� ��������: '
        . ''.$book['autor1'].'�� � '.$book['autor2'].'��, � ������ ���'
        . ' '.$book['pages'].' �������, ��� ��� ����� �����������.';

#������� 4
$book1 = array (
    'title' => '������� � ������ ���������',
    'autor' => '������ �����',
    'pages' => '264',
);
$book2 = array (
    'title' => '������������ �����������',
    'autor' => '���. �������� ������',
    'pages' => '819',
);
$books = array( $book1, $book2);
$page_amount = $book1['pages'] + $book2['pages'];
echo '<br/>';
echo '<br/>';
echo '������� � �������� ����� "'.$book1['title'].'" � "'.$book2['title'].'", ���������� ��������: '
        . ''.$book1['autor'].'�� � '.$book2['autor'].', � ������ � ����� '.$page_amount.' ��������, �� ������ �� ���� ���������.';
?>
// Задание 1
var name = 'Aleksandr', age = 28;
document.write( 'My name is ' + name + '<br>' );
document.write( 'I am ' + age + ' years old' + '<br>' );

delete name;
delete age;
//var age = NULL;
//var age = '';
//document.write( name );
//document.write( age + '<br>' );


// Задание 2
var MY_CITY = 'Omsk';

    if ( MY_CITY !== undefined ) {
        document.write( 'My city is a ' + MY_CITY + '<br>' );
    } else {
        document.write( 'Constant is not defined ' + '<br>' );
    }

var MY_CITY = 'Moscow';
document.write( 'My city is a ' + MY_CITY + '<br>' );


// Задание 3
var book = new Array();
    book[ 'title' ]  = 'JavaScript.Библия пользователя';
    book[ 'author' ] = 'Дэнни Гудман';
    book[ 'pages' ]  = '1175';
     
document.write( '<br>' + 'Недавно я прочитал книгу \"' + book[ 'title' ] + '\" написанную автором - ' + book[ 'author' ] + '; я осилил все ' +book[ 'pages' ] + ' страниц, мне она очень понравилась' + '<br>' );


// Задание 4
var book_1 = new Array();
    book_1.title  = 'Вермуты и другие аперитивы';
    book_1[ 'author' ] = 'Джаред Браун';
    book_1.pages  = 264;
    
var book_2 = { 'title':'Промышленная гидропоника', 'author':'док. Максвелл Бентли', 'pages':819 };

var books = [ book_1, book_2 ];
//console.log( books );
var sum_pages = books[0]['pages'] + books[1]['pages'];

document.write( '<br>' +  'Недавно я прочитал книги \"' + books[0]['title'] + '\" и \"' + books[1]['title'] + '\", написанные соответственно авторами: ' + books[0]['author'] + ' и ' + books[1]['author'] + ', я осилил в сумме ' + sum_pages + ' страниц, не ожидал от себя подобного!' );
//console.log( books[0]['title'] );
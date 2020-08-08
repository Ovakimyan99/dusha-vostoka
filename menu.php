<?php
//если заполнены все поля формы, тогда готовим письмо и отрпвляем
if ( !empty($_POST) && trim($_POST['name']) != "" && trim($_POST['email']) != "" && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && trim($_POST['message']) != "") {
    
    // формируем тему письма
    $message = "Вам пришло новое сообщение с сайта: <br>\n" .
                "<strong>Имя отправителя: </strong>" . strip_tags($_POST['name']) . "<br>\n" .
                "<strong>Email отправителя: </strong>". strip_tags($_POST['email']) . "<br>\n" .
                "<strong>Сообщение: </strong>". strip_tags($_POST['message']);

                //формируем тему письма
    $subject = "=?ut-8?B?".base64_encode("Сообщение с сайта")."?=";

    //от кого письмо
    $email_from = "info@rightblog.ru";
    $name_from = "Личный сайт портфолио";

    //формируем заголовки
    $headers = "MIME-Version 1.0" . PHP_EOL . 
               "Content-Type: text/html; charset=utf-8" . PHP_EOL .
               "From :" . "=?ut-8?B?".base64_encode($name_from)."?=" .
               "<" . $email_from . ">" . PHP_EOL . "Reply-To:" . $email_from . PHP_EOL;

    //отправка письма
    $sentResult = mail ( 'tigr.kman@gmail.com', $subject , $message, $headers); 

    if ( $sentResult ){
       header('location: thak.html');
    } else{
        $failure = "<div class=\"error\">Письмо не было отправлено. Повторите отаврку еще раз.</div>";
    }

    //перенаправляем на спасмбо
    header('location: thak.html');
}

//проверка переменной на ее наличие и на заполненность
function checkValue($item, $message) {
    if (isset($item) && trim($item) == ''){
        echo '<div class="error">' . $message . '</div>';
    }
}

//распечатка заполенных полей и формы, если произошел вывод ошибки.
function printPostValue($item){
    if ( isset($item) && strlen(trim($item)) > 2) {
        echo $item;
    }
}
//провекра эмейла на налисие заполненность и корректность.
    function checkEmail($email){
        if (isset($email) && trim($email) == ''){
            echo '<div class="error">Email не может быть пустым. Введите email.</div>';
        } else if ( isset($email) && !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
            echo '<div class="error">Введите корректный адрес email.</div>';
        }
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Меню</title>

    <link rel="icon" href="./img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./css/header-menu.css">
    <link rel="stylesheet" href="./css/menu.css">
    <link rel="stylesheet" href="./libs/owlCarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="./libs/owlCarousel/owl.theme.default.min.css">
</head>
<body>
    
    <header class="header">

        <div class="header-left">
            
            <ul class="header-links">
               <li><a href="./index.php">Главная</a></li>
               <li>Меню</li>
               <li><a href="#">О кафе</a></li>
               <li><a href="#">Фотогалерея</a></li>
               <li><a href="#">Отзывы</a></li>
               <li><a href="#">Контакты</a></li>
               <li><a href="#">Доставка</a></li>
            </ul>

        </div>

        <div class="header-right">
            <span><a href="tel:+79264995900">+7 (926) 499-59-00</a></span>
            <span><a href="tel:+79855166994">+7 (985) 516-69-94</a></span>
            <span>м. Коньково, ул. Профсоюзная, д. 128, кор. 1</span>
        </div>

        <div class="header-burger">
            <span class="header-burger__global header-burger__top"></span>
            <span class="header-burger__global header-burger__middle"></span>
            <span class="header-burger__global header-burger__bottom"></span>
        </div>

        <div id="mobile-nav" class="mobile-nav">

            <ul class="mobile-nav__list">

                <li class="mobile-nav__item">
                    <a href="#" class="mobile-nav__link">Главная</a>
                </li>
                
                <li class="mobile-nav__item">
                    <a href="#" class="mobile-nav__link">О кафе</a>
                </li>
                
                <li class="mobile-nav__item">
                    <a href="#" class="mobile-nav__link">Фотогалерея</a>
                </li>
                
                <li class="mobile-nav__item">
                    <a href="#" class="mobile-nav__link">Отзывы</a>
                </li>
                
                <li class="mobile-nav__item">
                    <a href="#" class="mobile-nav__link">Контакты</a>
                </li>
                
                <li class="mobile-nav__item">
                    <a href="#" class="mobile-nav__link">Доставка</a>
                </li>

            </ul>

        </div>
    </header>

    <div class="menu">

        <div class="content-index">  
            <div class="menu__first-screen">
                
                <div class="heading">
                    <h2 class="heading-title wow animate__animated animate__bounceInDown">Отзывы</h2>
                </div>

                <div class="heading-text">
                    <p>«Душа Востока» — это восточное богатое застолье, такое, каким оно и должно быть, в центре столицы.
                        Переступив порог нашего кафе, Вы сразу же попадаете под волшебное влияние чарующего аромата пряностей и экзотического вкуса восточной кухни, сладкий аромат кальяна, бизнес-ланчи, уютный интерьер и восточные сладости унесут Вас в настоящий мир Востока!
                        Меню нашего ресторана богато разнообразием восточных блюд: вкуснейшие самса и кутабы, сочные манты, «Душа Востока» - ароматный лагман, фирменный плов, ароматный шашлык и другие аппетитные блюда.
                    </p>
                </div>

            </div>
        </div>


        <!-- слайдер -->

        <div class="menu__slider">

            <div class="menu__slider--wrapper owl-carousel owl-theme">

                <div class="menu__item">

                    <img data-src="./img/menu-price/page-1.jpg" alt="меню 1" title="меню 1" class="menu__item--dishes owl-lazy">

                    <div class="menu-wrapper">  

                        <!-- блок с тенью -->
                        <div class="menu-wrapper--shadow" data-open="menu">
                            <div class="menu__item--subblock-arrow-up" data-open="menu"></div>
                        </div>

                        <!-- по картинкам: page-1 -->
                        <div class="menu__item--subblock">
                            
                            <div class="menu-hat">

                                кафе
                                <span>Душа Востока</span>
                                <img data-src="./img/menu/close-img.png" data-open="closeImg" alt="" title="" class="menu__close-img owl-lazy">

                            </div>

                                <div class="menu__with-dishes-wrapper">

                                    <div class="menu__block-with-dishes">

                                        <h3>Горячие закуски</h3>
                                        
                                        <ul class="menu__list">

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">САМСА ОСОБАЯ</span>
                                                <span class="menu__list--item-price">180р</span>
                                                <span class="menu__list--item-gram">150г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">САМСА С БАРАНИНОЙ</span>
                                                <span class="menu__list--item-price">180р</span>
                                                <span class="menu__list--item-gram">150г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ЖУЛЬЕН С ГРИБАМИ</span>
                                                <span class="menu__list--item-price">200р</span>
                                                <span class="menu__list--item-gram">160г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ШАУРМА ПО - АРАБСКИ</span>
                                                <span class="menu__list--item-price">250р</span>
                                                <span class="menu__list--item-gram">250г</span>
                                            </li>

                                            <li class="menu__list--item">
                                            <span class="menu__list--item-word">КУТАБ С СЫРОМ</span>
                                                <span class="menu__list--item-price">70р</span>
                                                <span class="menu__list--item-gram">180г</span>
                                            </li>

                                            <li class="menu__list--item">
                                            <span class="menu__list--item-word">СЫРНЫЕ ШАРИКИ</span>
                                                <span class="menu__list--item-price">240р</span>
                                                <span class="menu__list--item-gram">200г</span>
                                            </li>

                                            <li class="menu__list--item">
                                            <span class="menu__list--item-word">КУТАБЫ С ЗЕЛЕНЬЮ</span>
                                                <span class="menu__list--item-price">70р</span>
                                                <span class="menu__list--item-gram">180г</span>
                                            </li>

                                            <li class="menu__list--item">
                                            <span class="menu__list--item-word">ПИВНАЯ ТАРЕЛКА</span>
                                                <span class="menu__list--item-price">340р</span>
                                                <span class="menu__list--item-gram">400г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ГРЕНКИ С ЧЕСНОКОМ</span>
                                                <span class="menu__list--item-price">150р</span>
                                                <span class="menu__list--item-gram">150г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ПИВНАЯ ЗАКУСКА</span>
                                                <span class="menu__list--item-price">300р</span>
                                                <span class="menu__list--item-gram">250г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ЧЕБУРЕК С СЫРОМ</span>
                                                <span class="menu__list--item-price">70р</span>
                                                <span class="menu__list--item-gram">150г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ЧЕБУРЕК С МЯСОМ</span>
                                                <span class="menu__list--item-price">70р</span>
                                                <span class="menu__list--item-gram">150г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">КРЫЛЬЯ КУРИНЫЕ</span>
                                                <span class="menu__list--item-price">220р</span>
                                                <span class="menu__list--item-gram">170г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">КРЕВЕТКИ ТИГРОВЫЕ</span>
                                                <span class="menu__list--item-price">260р</span>
                                                <span class="menu__list--item-gram">120г</span>
                                            </li>

                                        </ul>

                                    </div>

                                    <div class="menu__block-with-dishes">

                                        <h3>Первые блюда</h3>
                                        
                                        <ul class="menu__list">

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ШУРПА С БАРАНИНОЙ</span>
                                                <span class="menu__list--item-price">180р</span>
                                                <span class="menu__list--item-gram">150г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">БОРЩ МОСКОВСКИЙ</span>
                                                <span class="menu__list--item-price">180р</span>
                                                <span class="menu__list--item-gram">150г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ЛАГМАН</span>
                                                <span class="menu__list--item-price">200р</span>
                                                <span class="menu__list--item-gram">160г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">СУП-ЛАПША КУРИНАЯ</span>
                                                <span class="menu__list--item-price">250р</span>
                                                <span class="menu__list--item-gram">250г</span>
                                            </li>

                                            <li class="menu__list--item">
                                            <span class="menu__list--item-word">ПИТИ</span>
                                                <span class="menu__list--item-price">70р</span>
                                                <span class="menu__list--item-gram">180г</span>
                                            </li>

                                            <li class="menu__list--item">
                                            <span class="menu__list--item-word">УХА ПО - БРАКОНЬЕРСКИ</span>
                                                <span class="menu__list--item-price">240р</span>
                                                <span class="menu__list--item-gram">200г</span>
                                            </li>

                                            <li class="menu__list--item">
                                            <span class="menu__list--item-word">КАПУЧИНО С БЕЛЫМИ ГРИБАМИ</span>
                                                <span class="menu__list--item-price">70р</span>
                                                <span class="menu__list--item-gram">180г</span>
                                            </li>

                                            <li class="menu__list--item">
                                            <span class="menu__list--item-word">ХАРЧО</span>
                                                <span class="menu__list--item-price">340р</span>
                                                <span class="menu__list--item-gram">400г</span>
                                            </li>

                                        </ul>
                                        
                                    </div>

                                    <div class="menu__block-with-dishes">

                                        <h3>Вторые горячие блюда</h3>
                                        
                                        <ul class="menu__list">

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ПЛОВ</span>
                                                <span class="menu__list--item-price">2200р</span>
                                                <span class="menu__list--item-gram">3000г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">МАНТЫ</span>
                                                <span class="menu__list--item-price">230р</span>
                                                <span class="menu__list--item-gram">250г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ДОЛМА</span>
                                                <span class="menu__list--item-price">250р</span>
                                                <span class="menu__list--item-gram">250г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ЛАГМАН УЙГУРИСКИЙ "ДУША ВОСТОКА"</span>
                                                <span class="menu__list--item-price">250р</span>
                                                <span class="menu__list--item-gram">250г</span>
                                            </li>

                                            <li class="menu__list--item">
                                            <span class="menu__list--item-word">КАЗАН - КЕБАБ</span>
                                                <span class="menu__list--item-price">300р</span>
                                                <span class="menu__list--item-gram">250г</span>
                                            </li>

                                            <li class="menu__list--item">
                                            <span class="menu__list--item-word">ЦЫПЛЕНОК ТАБАКА</span>
                                                <span class="menu__list--item-price">400р</span>
                                                <span class="menu__list--item-gram">320г</span>
                                            </li>

                                            <li class="menu__list--item">
                                            <span class="menu__list--item-word">ДОРАДО С ОВОЩАМИ</span>
                                                <span class="menu__list--item-price">400р</span>
                                                <span class="menu__list--item-gram">350г</span>
                                            </li>

                                            <li class="menu__list--item">
                                            <span class="menu__list--item-word">ЛОСОСЬ</span>
                                                <span class="menu__list--item-price">450р</span>
                                                <span class="menu__list--item-gram">300г</span>
                                            </li>
                                            
                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ЛАПША СОБА</span>
                                                <span class="menu__list--item-price">280р</span>
                                                <span class="menu__list--item-gram">250г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">МЕДАЛЬОНЫ С ГРИБАМИ</span>
                                                <span class="menu__list--item-price">350р</span>
                                                <span class="menu__list--item-gram">250г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">БУРГЕР НЕРО</span>
                                                <span class="menu__list--item-price">300р</span>
                                                <span class="menu__list--item-gram">300г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">КУРИНОЕ ФИЛЕ ПО - ТАЙСКИ</span>
                                                <span class="menu__list--item-price">320р</span>
                                                <span class="menu__list--item-gram">250г</span>
                                            </li>

                                            <li class="menu__list--item">
                                            <span class="menu__list--item-word">ТЕЛЯТИНА ТЕРИЯКИ</span>
                                                <span class="menu__list--item-price">350р</span>
                                                <span class="menu__list--item-gram">250г</span>
                                            </li>

                                            <li class="menu__list--item">
                                            <span class="menu__list--item-word">ФИЛЕ МИНЬОН</span>
                                                <span class="menu__list--item-price">500р</span>
                                                <span class="menu__list--item-gram">280г</span>
                                            </li>

                                            <li class="menu__list--item">
                                            <span class="menu__list--item-word">ПЕЛЬМАНИ ЖАРЕНЫЕ</span>
                                                <span class="menu__list--item-price">250р</span>
                                                <span class="menu__list--item-gram">200г</span>
                                            </li>

                                            <li class="menu__list--item">
                                            <span class="menu__list--item-word">ПЕЛЬМЕНИ ВАРЕНЫЕ</span>
                                                <span class="menu__list--item-price">230р</span>
                                                <span class="menu__list--item-gram">250г</span>
                                            </li>

                                            <li class="menu__list--item">
                                            <span class="menu__list--item-word">ПЛОВ ПРАЗДНИЧНЫЙ</span>
                                                <span class="menu__list--item-price">250р</span>
                                                <span class="menu__list--item-gram">250г</span>
                                            </li>

                                        </ul>
                                        
                                    </div>

                                </div>

                        </div>

                    </div>

                </div>

                <div class="menu__item">

                    <img data-src="./img/menu-price/page-2.jpg" alt="меню 2" title="меню 2" class="menu__item--dishes owl-lazy">

                    <div class="menu-wrapper">  

                        <!-- блок с тенью -->
                        <div class="menu-wrapper--shadow" data-open="menu">
                            <div class="menu__item--subblock-arrow-up" data-open="menu"></div>
                        </div>

                        <!-- по картинкам: page-2 -->
                        <div class="menu__item--subblock">
                            
                            <div class="menu-hat">

                                кафе
                                <span>Душа Востока</span>
                                <img data-src="./img/menu/close-img.png" data-open="closeImg" alt="" title="" class="menu__close-img owl-lazy">

                            </div>

                                <div class="menu__with-dishes-wrapper"> 

                                    <div class="menu__block-with-dishes">

                                        <h3>ЗАВТРАКИ</h3>
                                        
                                        <ul class="menu__list">

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">БЛИНЧИКИ С МЯСОМ</span>
                                                <span class="menu__list--item-price">170р</span>
                                                <span class="menu__list--item-gram">200г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">БЛИНЧИКИ С ТВОРОГОМ</span>
                                                <span class="menu__list--item-price">170р</span>
                                                <span class="menu__list--item-gram">200г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ЯИЧНИЦА "ГЛАЗУНЬЯ"</span>
                                                <span class="menu__list--item-price">170р</span>
                                                <span class="menu__list--item-gram">120г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">КАША ОВСЯНАЯ</span>
                                                <span class="menu__list--item-price">120р</span>
                                                <span class="menu__list--item-gram">200г</span>
                                            </li>

                                        </ul>

                                    </div>

                                    <div class="menu__block-with-dishes">

                                        <h3>САЛАТЫ</h3>
                                        
                                        <ul class="menu__list">

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ОЛИВЬЕ С КУРИЦЕЙ</span>
                                                <span class="menu__list--item-price">260р</span>
                                                <span class="menu__list--item-gram">250г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ГРЕЧЕСКИЙ</span>
                                                <span class="menu__list--item-price">300р</span>
                                                <span class="menu__list--item-gram">250г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ЦЕЗАРЬ С КУРИЦЕЙ</span>
                                                <span class="menu__list--item-price">280р</span>
                                                <span class="menu__list--item-gram">250г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ЦЕЗАРЬ С КРИВЕТКАМИ</span>
                                                <span class="menu__list--item-price">300р</span>
                                                <span class="menu__list--item-gram">250г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">РУККОЛА С КРЕВЕТКАМИ</span>
                                                <span class="menu__list--item-price">300р</span>
                                                <span class="menu__list--item-gram">230г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">МЯСНОЙ</span>
                                                <span class="menu__list--item-price">320р</span>
                                                <span class="menu__list--item-gram">250г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ТАР - ТАР ИЗ ГОВЯДИНЫ</span>
                                                <span class="menu__list--item-price">300р</span>
                                                <span class="menu__list--item-gram">200г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">КАЛЬМАРОВЫЙ</span>
                                                <span class="menu__list--item-price">340р</span>
                                                <span class="menu__list--item-gram">250г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">САЛАТ "ДУША ВОСТОКА"</span>
                                                <span class="menu__list--item-price">350р</span>
                                                <span class="menu__list--item-gram">250г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ПОМИДОРЫ С КРАСНЫМ ЛУКОМ И АВОКАДО</span>
                                                <span class="menu__list--item-price">340р</span>
                                                <span class="menu__list--item-gram">220г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">МАНГАЛ САЛАТ</span>
                                                <span class="menu__list--item-price">200р</span>
                                                <span class="menu__list--item-gram">250г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ОВОЩНОЙ БУКЕТ</span>
                                                <span class="menu__list--item-price">250р</span>
                                                <span class="menu__list--item-gram">450г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ТЕПЛЫЙ ФЛАМБЕ</span>
                                                <span class="menu__list--item-price">320р</span>
                                                <span class="menu__list--item-gram">250г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">САЛАТ ВОСТОЧНЫЙ</span>
                                                <span class="menu__list--item-price">320р</span>
                                                <span class="menu__list--item-gram">250г</span>
                                            </li>

                                        </ul>

                                    </div>

                                    <div class="menu__block-with-dishes">

                                        <h3>ХОЛОДНЫЕ ЗАКУСКИ</h3>
                                        
                                        <ul class="menu__list">

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">МЯСНАЯ ТАРЕЛКА</span>
                                                <span class="menu__list--item-price">700р</span>
                                                <span class="menu__list--item-gram">450г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">АССОРТИ БРУСЕТТА</span>
                                                <span class="menu__list--item-price">250р</span>
                                                <span class="menu__list--item-gram">250г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">РЫБНОЕ АССОРТИ</span>
                                                <span class="menu__list--item-price">750р</span>
                                                <span class="menu__list--item-gram">450г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">СЫРНАЯ ТАРЕЛКА</span>
                                                <span class="menu__list--item-price">350р</span>
                                                <span class="menu__list--item-gram">250г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">РУЛЕТИКИ ИЗ БАКЛАЖАНОВ</span>
                                                <span class="menu__list--item-price">270р</span>
                                                <span class="menu__list--item-gram">250г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ГРИБНОЕ АССОРТИ</span>
                                                <span class="menu__list--item-price">280р</span>
                                                <span class="menu__list--item-gram">160г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">АССОРТИ СОЛЕНИЙ</span>
                                                <span class="menu__list--item-price">350р</span>
                                                <span class="menu__list--item-gram">500г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ВОСТОЧНАЯ ТАРЕЛКА</span>
                                                <span class="menu__list--item-price">400р</span>
                                                <span class="menu__list--item-gram">260г</span>
                                            </li>

                                        </ul>

                                    </div>

                                </div>

                        </div>

                    </div>

                </div>

                <div class="menu__item">

                    <img data-src="./img/menu-price/page-3.jpg" alt="меню 2" title="меню 2" class="menu__item--dishes owl-lazy">

                    <div class="menu-wrapper">  

                        <!-- блок с тенью -->
                        <div class="menu-wrapper--shadow" data-open="menu">
                            <div class="menu__item--subblock-arrow-up" data-open="menu"></div>
                        </div>

                        <!-- по картинкам: page-3 -->
                        <div class="menu__item--subblock">
                            
                            <div class="menu-hat">

                                кафе
                                <span>Душа Востока</span>
                                <img data-src="./img/menu/close-img.png" data-open="closeImg" alt="" title="" class="menu__close-img owl-lazy">

                            </div>

                                <div class="menu__with-dishes-wrapper">

                                    <div class="menu__block-with-dishes">

                                        <h3>ГАРНИРЫ</h3>
                                        
                                        <ul class="menu__list">

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">КАРТОФЕЛЬ МОЛОДОЙ С РОЗМАРИНОМ И ЧЕСНОКОМ</span>
                                                <span class="menu__list--item-price">200р</span>
                                                <span class="menu__list--item-gram">150г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">КАРТОФЕЛЬ ПО - ДЕРЕВЕНСКИ</span>
                                                <span class="menu__list--item-price">160р</span>
                                                <span class="menu__list--item-gram">150г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">КАРТОФЕЛЬ ФРИ</span>
                                                <span class="menu__list--item-price">150р</span>
                                                <span class="menu__list--item-gram">150г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">КАРТОФЕЛЬ ЖАРЕНЫЙ С ГРИБАМИ</span>
                                                <span class="menu__list--item-price">210р</span>
                                                <span class="menu__list--item-gram">220г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ОВОЩИ ГРИЛЬ</span>
                                                <span class="menu__list--item-price">180р</span>
                                                <span class="menu__list--item-gram">250г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">РИС МИКС</span>
                                                <span class="menu__list--item-price">150р</span>
                                                <span class="menu__list--item-gram">150г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">КАРТОФЕЛЬНОЕ ПЮРЕ</span>
                                                <span class="menu__list--item-price">100р</span>
                                                <span class="menu__list--item-gram">150г</span>
                                            </li>

                                        </ul>

                                    </div>

                                    <div class="menu__block-with-dishes">

                                        <h3>СОУСЫ</h3>
                                        
                                        <ul class="menu__list">

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ТАР - ТАР</span>
                                                <span class="menu__list--item-price">70р</span>
                                                <span class="menu__list--item-gram">50г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">REDHOT</span>
                                                <span class="menu__list--item-price">70р</span>
                                                <span class="menu__list--item-gram">50г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ЧЕСНОЧНЫЙ</span>
                                                <span class="menu__list--item-price">60р</span>
                                                <span class="menu__list--item-gram">50г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">КЕТЧУП ХАЙНЦ</span>
                                                <span class="menu__list--item-price">60р</span>
                                                <span class="menu__list--item-gram">50г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">НАРШАРАБ</span>
                                                <span class="menu__list--item-price">70р</span>
                                                <span class="menu__list--item-gram">50г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ГОРЧИЦА ДИЖОНСКАЯ</span>
                                                <span class="menu__list--item-price">70р</span>
                                                <span class="menu__list--item-gram">50г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">АДЖИКА</span>
                                                <span class="menu__list--item-price">60р</span>
                                                <span class="menu__list--item-gram">50г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">BBQ СОУС</span>
                                                <span class="menu__list--item-price">60р</span>
                                                <span class="menu__list--item-gram">50г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">КОКТЕЙЛЬ</span>
                                                <span class="menu__list--item-price">60р</span>
                                                <span class="menu__list--item-gram">50г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ТКЕМАЛИ</span>
                                                <span class="menu__list--item-price">70р</span>
                                                <span class="menu__list--item-gram">50г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ХРЕН СЛИВОЧНЫЙ</span>
                                                <span class="menu__list--item-price">70р</span>
                                                <span class="menu__list--item-gram">50г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">СМЕТАНА</span>
                                                <span class="menu__list--item-price">60р</span>
                                                <span class="menu__list--item-gram">50г</span>
                                            </li>

                                        </ul>

                                    </div>

                                    <div class="menu__block-with-dishes">

                                        <h3>ХЛЕБ</h3>
                                        
                                        <ul class="menu__list">

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ЛЕПЁШКА</span>
                                                <span class="menu__list--item-price">50р</span>
                                                <span class="menu__list--item-gram">300г</span>
                                            </li>

                                        </ul>

                                    </div>

                                    <div class="menu__block-with-dishes">

                                        <h3>ЧАЙНАЯ КАРТА</h3>

                                        <h4>НАСТОЯЩИЙ ЛИСТОВОЙ ЧАЙ</h4>
                                        <ul class="menu__list">

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">АНГЛИЙСКИЙ КЛАССИЧЕСКИЙ</span>
                                                <span class="menu__list--item-price">170 / 220 р</span>
                                                <span class="menu__list--item-gram">500 / 800 мл.</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">АССАМ №17</span>
                                                <span class="menu__list--item-price">170 / 220 р</span>
                                                <span class="menu__list--item-gram">500 / 800 мл</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ЛАПСАНГ СУШОНГ</span>
                                                <span class="menu__list--item-price">170 / 220 р</span>
                                                <span class="menu__list--item-gram">500 / 800 мл</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ЧАЙ С ЧАБРЕЦОМ</span>
                                                <span class="menu__list--item-price">170 / 220 р</span>
                                                <span class="menu__list--item-gram">500 / 800 мл</span>
                                            </li>

                                        </ul>

                                        <h4>АРОМАТИЗИРОВАННЫЙ ЧАЙ</h4>
                                        <ul class="menu__list">

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ЭРА ГРЕЙ</span>
                                                <span class="menu__list--item-price">170 / 220 р</span>
                                                <span class="menu__list--item-gram">500 / 800 мл.</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ЧАЙ С ШИПОВНИКОМ</span>
                                                <span class="menu__list--item-price">170 / 220 р</span>
                                                <span class="menu__list--item-gram">500 / 800 мл</span>
                                            </li>
                                            
                                        </ul>

                                        <h4>ТРАВЯНЫЕ СМЕСИ</h4>
                                        <ul class="menu__list">

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">КОРОЛЕВСКИЙ ГИБИСКУС</span>
                                                <span class="menu__list--item-price">170 / 220 р</span>
                                                <span class="menu__list--item-gram">500 / 800 мл.</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ЗАРЯД БОДРОСТИ</span>
                                                <span class="menu__list--item-price">170 / 220 р</span>
                                                <span class="menu__list--item-gram">500 / 800 мл</span>
                                            </li>
                                            
                                        </ul>

                                    </div>

                                </div>

                        </div>

                    </div>

                </div>

                <div class="menu__item">

                    <img data-src="./img/menu-price/page-4.jpg" alt="меню 2" title="меню 2" class="menu__item--dishes owl-lazy">

                    <div class="menu-wrapper">  

                        <!-- блок с тенью -->
                        <div class="menu-wrapper--shadow" data-open="menu">
                            <div class="menu__item--subblock-arrow-up" data-open="menu"></div>
                        </div>

                        <!-- по картинкам: page-4 -->
                        <div class="menu__item--subblock">
                            
                            <div class="menu-hat">

                                кафе
                                <span>Душа Востока</span>
                                <img data-src="./img/menu/close-img.png" data-open="closeImg" alt="" title="" class="menu__close-img owl-lazy">

                            </div>

                                <div class="menu__with-dishes-wrapper">

                                    <div class="menu__block-with-dishes">

                                        <h4>ЗЕЛЕНЫЙ ЧАЙ</h4>

                                        <ul class="menu__list">

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ЗЕЛЕНЫЙ ЖЕМЧУГ</span>
                                                <span class="menu__list--item-price">170 / 220р</span>
                                                <span class="menu__list--item-gram">500 / 800 мл</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ЗЕЛЕНЫЙ ПОРОХ СЕН - ЧА</span>
                                                <span class="menu__list--item-price">170 / 220р</span>
                                                <span class="menu__list--item-gram">500 / 800 мл</span>
                                            </li>

                                        </ul>

                                        <h4>АРОМАТИЗИРОВАННЫЙ ЗЕЛЕНЫЙ ЧАЙ (ЧАЙНИК)</h4>

                                        <ul class="menu__list">

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ЗЕЛЕНЫЙ ГРАФ ГРЕЙ</span>
                                                <span class="menu__list--item-price">170 / 220р</span>
                                                <span class="menu__list--item-gram">500 / 800 мл</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ЗЕЛЕНЫЙ ЗЕЛЕНЫЙ КЛУБНИЧНЫЙ</span>
                                                <span class="menu__list--item-price">170 / 220р</span>
                                                <span class="menu__list--item-gram">500 / 800 мл</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ЯПОНСКАЯ ЛИПА</span>
                                                <span class="menu__list--item-price">170 / 220р</span>
                                                <span class="menu__list--item-gram">500 / 800 мл</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ЯПОНСКАЯ САКУРА</span>
                                                <span class="menu__list--item-price">170 / 220р</span>
                                                <span class="menu__list--item-gram">500 / 800 мл</span>
                                            </li>

                                        </ul>

                                        <h4>ЧАЙ ПАРАГВАЙСКИ "МАТЕ"</h4>

                                        <ul class="menu__list">

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">МАТЭ ЛИМОННЫЙ</span>
                                                <span class="menu__list--item-price">170 / 220 р</span>
                                                <span class="menu__list--item-gram">500 / 800 мл</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">МАТЭ "СИЦИЛИАНО"</span>
                                                <span class="menu__list--item-price">170 / 220 р</span>
                                                <span class="menu__list--item-gram">500 / 800 мл</span>
                                            </li>

                                        </ul>

                                        <h4>ФРУКТОВАЯ СМЕСЬ</h4>

                                        <ul class="menu__list">

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ФРУКТОВЫЙ ЧАЙ</span>
                                                <span class="menu__list--item-price">170 / 220 р</span>
                                                <span class="menu__list--item-gram">500 / 800 мл</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ВАРЕНЬЕ В АССОРТИМЕНТЕ</span>
                                                <span class="menu__list--item-price">160р</span>
                                                <span class="menu__list--item-gram">100г</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">МЕД</span>
                                                <span class="menu__list--item-price">70р</span>
                                                <span class="menu__list--item-gram">100г</span>
                                            </li>

                                        </ul>

                                    </div>

                                    <div class="menu__block-with-dishes">

                                        <h3>КОФЕ</h3>
                                        
                                        <ul class="menu__list">

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ЭСПРЕССО</span>
                                                <span class="menu__list--item-price">110р</span>
                                                <span class="menu__list--item-gram">60 мл</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ЭСПРЕССО ДВОЙНОЙ</span>
                                                <span class="menu__list--item-price">110р</span>
                                                <span class="menu__list--item-gram">60 мл</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">АМЕРИКАНО</span>
                                                <span class="menu__list--item-price">110р</span>
                                                <span class="menu__list--item-gram">150 мл</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">КОФЕ СО СЛИВКАМИ</span>
                                                <span class="menu__list--item-price">110р</span>
                                                <span class="menu__list--item-gram">150 / 40 мл</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">КОФЕ ПО - ВЕНСКИ</span>
                                                <span class="menu__list--item-price">110р</span>
                                                <span class="menu__list--item-gram">150 / 35 мл</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">КОФЕ ГЛЯССЕ</span>
                                                <span class="menu__list--item-price">110р</span>
                                                <span class="menu__list--item-gram">150 / 50 мл</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">КАПУЧИНО</span>
                                                <span class="menu__list--item-price">110р</span>
                                                <span class="menu__list--item-gram">180 мл</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ИРЛАНДСКИЙ КОФЕ</span>
                                                <span class="menu__list--item-price">110р</span>
                                                <span class="menu__list--item-gram">180 мл</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ЛАТТЕ</span>
                                                <span class="menu__list--item-price">110р</span>
                                                <span class="menu__list--item-gram">200 мл</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">МОЛОКО</span>
                                                <span class="menu__list--item-price">110р</span>
                                                <span class="menu__list--item-gram">40 мл</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">СЛИВКИ</span>
                                                <span class="menu__list--item-price">110р</span>
                                                <span class="menu__list--item-gram">40 мл</span>
                                            </li>

                                        </ul>

                                    </div>

                                    <div class="menu__block-with-dishes">

                                        <h3>КОКТЕЙЛИ МОЛОЧНЫЕ</h3>
                                        
                                        <ul class="menu__list">

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">СЛИВОЧНЫЙ</span>
                                                <span class="menu__list--item-price">200р</span>
                                                <span class="menu__list--item-gram">190 мл</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ДЕСЕРТНЫЙ</span>
                                                <span class="menu__list--item-price">250р</span>
                                                <span class="menu__list--item-gram">190 мл</span>
                                            </li>

                                        </ul>

                                    </div>

                                    <div class="menu__block-with-dishes">

                                        <h3>ВОДА</h3>

                                        <ul class="menu__list">

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">GASTEINER</span>
                                                <span class="menu__list--item-price">160р</span>
                                                <span class="menu__list--item-gram">250 мл</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">БОН АКВА</span>
                                                <span class="menu__list--item-price">120р</span>
                                                <span class="menu__list--item-gram">250 мл</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">НОВОТЕРСКАЯ ЦЕЛЕБНАЯ</span>
                                                <span class="menu__list--item-price">130р</span>
                                                <span class="menu__list--item-gram">330 мл</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ЕССЕНТУКИ</span>
                                                <span class="menu__list--item-price">140р</span>
                                                <span class="menu__list--item-gram">500 мл</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">НАГУТСКАЯ 26</span>
                                                <span class="menu__list--item-price">130р</span>
                                                <span class="menu__list--item-gram">500 мл</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ПЕРЬЕ</span>
                                                <span class="menu__list--item-price">140р</span>
                                                <span class="menu__list--item-gram">330 мл</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">КОЛА - КОЛА</span>
                                                <span class="menu__list--item-price">120р</span>
                                                <span class="menu__list--item-gram">250 мл</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">СПРАЙТ</span>
                                                <span class="menu__list--item-price">120р</span>
                                                <span class="menu__list--item-gram">250 мл</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ФАНТА</span>
                                                <span class="menu__list--item-price">120р</span>
                                                <span class="menu__list--item-gram">250 мл</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">BURN</span>
                                                <span class="menu__list--item-price">150р</span>
                                                <span class="menu__list--item-gram">250 мл</span>
                                            </li>

                                        </ul>

                                    </div>

                                    <div class="menu__block-with-dishes">

                                        <h3>СОКИ</h3>
                                        
                                        <ul class="menu__list">

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">СОКИ "ДОБРЫЙ" В АССОРТИМЕНТЕ</span>
                                                <span class="menu__list--item-price">80р</span>
                                                <span class="menu__list--item-gram">200 мл</span>
                                            </li>

                                        </ul>

                                    </div>

                                    <div class="menu__block-with-dishes">

                                        <h3>СВЕЖЕВЫЖАТЫЕ СОКИ</h3>
                                        
                                        <ul class="menu__list">

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">АПЕЛЬСИНОВЫЙ</span>
                                                <span class="menu__list--item-price">200р</span>
                                                <span class="menu__list--item-gram">250 мл</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ГРЕЙПФРУТОВЫЙ</span>
                                                <span class="menu__list--item-price">200р</span>
                                                <span class="menu__list--item-gram">250 мл</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ЯБЛОЧНЫЙ</span>
                                                <span class="menu__list--item-price">200р</span>
                                                <span class="menu__list--item-gram">250 мл</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">МОРКОВНЫЙ</span>
                                                <span class="menu__list--item-price">200р</span>
                                                <span class="menu__list--item-gram">250 мл</span>
                                            </li>

                                        </ul>

                                    </div>

                                    <div class="menu__block-with-dishes">

                                        <h3>МОРС</h3>
                                        
                                        <ul class="menu__list">

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ИЗ ЧЕРНОЙ СМОРОДИНЫ</span>
                                                <span class="menu__list--item-price">80р</span>
                                                <span class="menu__list--item-gram">200 мл</span>
                                            </li>

                                        </ul>

                                    </div>

                                    <div class="menu__block-with-dishes">

                                        <h3>КОКТЕЙЛИ БЕЗАЛКОГОЛЬНЫЕ</h3>
                                        
                                        <ul class="menu__list">

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ДВОРЕЦ ШИРЛИ</span>
                                                <span class="menu__list--item-price">250р</span>
                                                <span class="menu__list--item-gram">300 мл</span>
                                            </li>
                                            
                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">КАБРИОЛЕТ</span>
                                                <span class="menu__list--item-price">200р</span>
                                                <span class="menu__list--item-gram">200 мл</span>
                                            </li>
                                            
                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">МЯТНЫЙ АНАНАСОВЫЙ</span>
                                                <span class="menu__list--item-price">180р</span>
                                                <span class="menu__list--item-gram">170 мл</span>
                                            </li>
                                            
                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">МОХИТО</span>
                                                <span class="menu__list--item-price">280р</span>
                                                <span class="menu__list--item-gram">200 мл</span>
                                            </li>
                                            
                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">РОЗОВАЯ ДЮНА</span>
                                                <span class="menu__list--item-price">180р</span>
                                                <span class="menu__list--item-gram">200 мл</span>
                                            </li>
                                            
                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">СЛАДКАЯ РАДУГА</span>
                                                <span class="menu__list--item-price">180р</span>
                                                <span class="menu__list--item-gram">180 мл</span>
                                            </li>
                                            
                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">МОТОР АВТОМОБИЛЯ</span>
                                                <span class="menu__list--item-price">250р</span>
                                                <span class="menu__list--item-gram">300 мл</span>
                                            </li>
                                            
                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">ЗВОН КОЛОКОЛА</span>
                                                <span class="menu__list--item-price">250р</span>
                                                <span class="menu__list--item-gram">400 мл</span>
                                            </li>

                                            <li class="menu__list--item">
                                                <span class="menu__list--item-word">КИСКИНЫ ЛАПКИ</span>
                                                <span class="menu__list--item-price">180р</span>
                                                <span class="menu__list--item-gram">230 мл</span>
                                            </li>

                                        </ul>

                                    </div>

                                </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="sliderWrapper__nav">
                <div class="customPrevBtn"><img src="./img/prescriptive-pictures/left-arrow.svg" alt="Влево" title="Нажмите, чтобы прокрутить слайдер влево"></div>
                <div class="customNextBtn"><img src="./img/prescriptive-pictures/next-arrow.svg" alt="Вправо" title="Нажмите, чтобы прокрутить слайдер вправо"></div>
            </div>

        </div>

        <!-- конец слайдера -->
    </div>

        <!-- форма обратной связи -->

    <div class="feedback-form screen" id='form-wrapper'>

        <div class="content-index">

            <div class="heading">
                <h2 class="heading-title wow animate__animated animate__bounceInDown">Заказать столик</h2>
            </div>

            <form method="POST" action="menu.php#form-wrapper" class="form-wrapper">

                <?php
                    if(isset($failure)) {
                        echo $failure;
                    }
                ?>

                <div class="form-group">
                    <label for="name" class="form-label">Ваше имя</label>
                        <?php checkValue($_POST['name'], 'Вы не ввели имя.'); ?>

                    <input 
                        name="name" 
                        id="name" 
                        type="text" 
                        placeholder="Введите имя" 
                        class="form-input"
                        value = "<?php printPostValue($_POST['name']); ?>"
                    >
                </div>   

                <div class="form-group">
                    <label  for="email" class="form-label">Ваше email</label>
                        <?php checkEmail($_POST['email']); ?>
                    <input 
                        name="email"
                        id="email" 
                        type="text" 
                        placeholder="Введите email" 
                        class="form-input"
                        value="<?php printPostValue($_POST['email']); ?>"
                    >
                </div>

                <div class="form-group">
                    <label for="message" class="form-label">Сообщение</label>
                        <?php checkValue($_POST['message'], 'Вы не ввели сообщение.'); ?>
                    <textarea 
                        name="message" 
                        placeholder="Напишите кол - во человек, дату посещения и номер телефона" 
                        class="form-message" 
                        name="" 
                        id="message" 
                        cols="30" 
                        rows="10"
                    ><?php printPostValue($_POST['message']); ?></textarea>
                </div>

                <input type="submit" value="Отправить сообщение" class="form-button wow animate__animated animate__bounceIn">
            
            </form>

        </div>

    </div>

    <script src="./libs/jquery-3.5.1.min.js"></script>
    <script src="./libs/owlCarousel/owl.carousel.min.js"></script>

    <script src="./js/header.js"></script>
    <!-- <script src="./js/menu.js"></script> -->

    <script>
        $(document).ready(function(){
            $('.owl-carousel').owlCarousel({
                items: 1,
                lazyLoad:true,
                margin:10,
                // autoplay:true,
                autoplayTimeout:6000,
                autoplayHoverPause:true,
                autoWidth:true,
                center: true,
                dots: false,
                loop: true,
                lazyLoadEager: 1,
                smartSpeed: 700,
                responsive : {
                        320:{
                            autoWidth:false
                        },
                        640:{
                            autoWidth:true
                        }
                    }
            })

            $('.customNextBtn').click(function() {
                $('.owl-carousel').trigger('next.owl.carousel');
            })
            // Go to the previous item
            $('.customPrevBtn').click(function() {
                $('.owl-carousel').trigger('prev.owl.carousel');
            })
            
        })
    </script>

    <script src="./js/header-button.js"></script>
    <script src="./js/menu-modal.js"></script>

</body>
</html>
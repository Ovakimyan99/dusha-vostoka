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
    <!-- <meta name=description content="Купить на заказ изделия из стекла и зеркал. Москва и Московская область. Работаем 2007 года. Оказываем полный спектр услуг. Замер. Доставка. Монтаж. Сроки от 5 дней. Гарантия качества. После гарантийное обслуживание. Большой выбор стекла и фурнитуры на любой вкус. Триплекс. Матирование. УФ печать."> -->
	<meta name=format-detection content="telephone=no"/>
	<!-- <meta name="keywords" content="ключевое слово 1, ключевое слово 2, ключевое слово 3"/> -->
    <title>Душа востока</title>

    <link rel="stylesheet" href="./css/index/o-style.css">
    <!-- шрифты Lobster+Two и Exo+2 -->
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@300;400&family=Lobster+Two:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./libs/owlCarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="./libs/owlCarousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="icon" href="./img/favicon.ico" type="image/x-icon">
    
</head>
<body>

    <header class="header">

        <div class="header-left">
            
            <ul class="header-links">
               <li>Главная</li>
               <li><a href="./menu.php">Меню</a></li>
               <li><a href="#">О кафе</a></li>
               <li><a href="./Photo-gallery.html">Фотогалерея</a></li>
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
                    <span class="mobile-nav__link">Главная</span>
                </li>
                
                <li class="mobile-nav__item">
                    <a href="./menu.php" class="mobile-nav__link">Меню</a>
                </li>

                <li class="mobile-nav__item">
                    <a href="#" class="mobile-nav__link">О кафе</a>
                </li>
                
                <li class="mobile-nav__item">
                    <a href="./Photo-gallery.html" class="mobile-nav__link">Фотогалерея</a>
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

    <!-- --- первый экран --- -->
    <div class="one-screen screen">
        <div class="content-index">     
            <div class="one-screen__img">
                <img src="./img/prescriptive-pictures/logo.svg" alt="" title="">
            </div>
            <div class="one-screen__wrapper-button-down">
                <span>Кафе «Душа востока»</span>
                <a href="#about-the-cafe" rel='m_PageScroll2id' class="one-screen__button-down"><img src="./img/home/down-arrow.png" alt="" title=""></a>
            </div>
        </div>
    </div>

    <!-- --- о кафе --- -->
    <div class="about-the-cafe screen" id="about-the-cafe">
        <div class="content-index">    
            <div class="heading">
                <h2 class="heading-title wow animate__animated animate__bounceInDown">О кафе</h2>
            </div>
            <div class="heading-text">
                <p>«Душа Востока» — это восточное богатое застолье, такое, каким оно и должно быть, в центре столицы.
                    Переступив порог нашего кафе, Вы сразу же попадаете под волшебное влияние чарующего аромата пряностей и экзотического вкуса восточной кухни, сладкий аромат кальяна, бизнес-ланчи, уютный интерьер и восточные сладости унесут Вас в настоящий мир Востока!
                    Меню нашего ресторана богато разнообразием восточных блюд: вкуснейшие самса и кутабы, сочные манты, «Душа Востока» - ароматный лагман, фирменный плов, ароматный шашлык и другие аппетитные блюда.
                </p>
            </div>

            <div class="image-description">
                
                <div class="image-description__block">

                    <div class="image-description__block-main">
                        <img src="./img/home/hall.jpg" alt="" title="" class="image-description__photo">
                        <span class="image-description__span wow animate__animated animate__fadeInDown">Зал</span>
                    </div>

                    <div class="image-description__block-hidden">
                        <img src="" alt="" title="" class="image-description__photo">
                        <p class="image-description__text">комфорт, музыка, вешалки, розетки, освежитель, лампы, подогреватели, интерьер, бесплатный вайфай, растительность</p>
                    </div>

                </div>

                <div class="image-description__block">

                    <div class="image-description__block-main">
                        <img src="./img/home/tarelka.jpg" alt="" title="" class="image-description__photo">
                        <span class="image-description__span wow animate__animated animate__fadeInDown">Сервировка</span>
                    </div>

                    <div class="image-description__block-hidden">
                        <img src="" alt="" title="" class="image-description__photo">
                        <p class="image-description__text">комфорт, музыка, вешалки, розетки, освежитель, лампы, подогреватели, интерьер, бесплатный вайфай, растительность</p>
                    </div>

                </div>

                <div class="image-description__block">

                    <div class="image-description__block-main">
                        <img src="./img/home/culture.jpg" alt="" title="" class="image-description__photo">
                        <span class="image-description__span wow animate__animated animate__fadeInDown">культура древнего востока</span>
                    </div>

                    <div class="image-description__block-hidden">
                        <img src="" alt="" title="" class="image-description__photo">
                        <p class="image-description__text">комфорт, музыка, вешалки, розетки, освежитель, лампы, подогреватели, интерьер, бесплатный вайфай, растительность</p>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <!-- --- меню --- -->

    <div class="menu screen">
        <div class="content-index menu-screen">

            <div class="heading">
                <h2 class="heading-title wow animate__animated animate__bounceInDown">Меню</h2>
            </div>

            <div class="heading-text">
                <p>Восточная кухня – это настоящее искусство!

                    Она многогранна и притягательна, но при этом не похожа ни на какие другие.
                    
                    Основными продуктами для блюд кухни Востока считаются: рис, баранина, различные овощи.
                    
                    А самые популярные блюда - плов, шурпа, лагман, люля-кебаб.
                    
                    В нашем меню мы постарались собрать самые вкусные блюда.
                    
                    Барная карта кафе «ДУША ВОСТОКА» позволит подобрать напиток по вкусу и настроению!
                </p>
            </div>

            <div class="menu-screen__row">

                <div class="menu-screen__subblock">
                    <span class="menu-screen__title">Горячее</span>
                    <div class="menu-screen__subblock-header">

                        <div class="menu-screen__subblock-elements">

                            <img  class="menu-screen__button-fon" src="" alt="">
                            <a class="menu-screen__button wow animate__animated animate__rubberBand" href="./menu.php">
                                <img class="menu-screen__icons" src="./img/home/soup.png" alt="" title="">
                                <span>ПЕРВОЕ</span>
                            </a>

                        </div>

                        <div class="menu-screen__subblock-elements">

                            <img  class="menu-screen__button-fon" src="" alt="">
                            <a class="menu-screen__button wow animate__animated animate__rubberBand" href="./menu.php">
                                <img class="menu-screen__icons" src="./img/home/rice.png" alt="" title="">
                                <span>ВТОРОЕ</span>
                            </a>
                        </div>

                    </div>

                </div>

                <div class="menu-screen__subblock">
                    <span class="menu-screen__title">На мангале</span>
                    <div class="menu-screen__subblock-header">

                        <div class="menu-screen__subblock-elements menu-screen__subblock-wide">

                            <img  class="menu-screen__button-fon" src="./img/home/on-coals.png" alt="">
                            <a class="menu-screen__button wow animate__animated animate__rubberBand" href="./menu.php">
                                <img class="menu-screen__icons" src="./img/home/cooker.png" alt="" title="">
                                <span>НА УГЛЯХ</span>
                            </a>

                        </div>

                    </div>
                </div>
            </div>

            <div class="menu-screen__row">

                <div class="menu-screen__subblock">
                    <span class="menu-screen__title">Cалаты</span>
                    <div class="menu-screen__subblock-header">

                        <div class="menu-screen__subblock-elements menu-screen__subblock-wide">

                            <img  class="menu-screen__button-fon" src="" alt="">
                            <a class="menu-screen__button wow animate__animated animate__rubberBand" href="./menu.php">
                                <img class="menu-screen__icons" src="./img/home/salad.png" alt="" title="">
                                <span>САЛАТЫ</span>
                            </a>

                        </div>

                    </div>
                </div>

                <div class="menu-screen__subblock">
                    <span class="menu-screen__title">Закуски</span>
                    <div class="menu-screen__subblock-header">

                        <div class="menu-screen__subblock-elements">

                            <img  class="menu-screen__button-fon" src="" alt="">
                            <a class="menu-screen__button wow animate__animated animate__rubberBand" href="./menu.php">
                                <img class="menu-screen__icons" src="./img/home/snack.png" alt="" title="">
                                <span>ХОЛОДНЫЕ</span>
                            </a>

                        </div>

                        <div class="menu-screen__subblock-elements">

                            <img  class="menu-screen__button-fon" src="" alt="">
                            <a class="menu-screen__button wow animate__animated animate__rubberBand" href="./menu.php">
                                <img class="menu-screen__icons" src="./img/home/appetizer.png" alt="" title="">
                                <span>ГОРЯЧИЕ</span>
                            </a>

                        </div>

                    </div>

                </div>

                <div class="second-page-button">
                    <a href="./menu.php">
                        <img src="./img/home/see-the-menu.png" alt="" title="">
                        <span>ПОСМОТРЕТЬ МЕНЮ</span>
                    </a>
                </div>

            </div>

        </div>
    </div>

    <!-- --- события --- -->

    <div class="events screen">
        <div class="content-index events-screen">

            <div class="heading">
                <h2 class="heading-title wow animate__animated animate__bounceInDown">События</h2>
            </div>

            <div class="events-wrapper" id="events-wrapper">
            </div>

        </div>
    </div>

    <!-- --- галерея --- -->

    <div class="gallerySlider">

        <div class="gallerySlider-wrapper owl-carousel owl-theme">

            <!-- //1 -->
            <div class="sliderWrapper">
                <img class="owl-lazy" data-src="./img/gallery/02.jpg" alt="">
            </div>

            <!-- //2 -->
            <div class="sliderWrapper">
                <img class="owl-lazy" data-src="./img/gallery/03.jpg" alt="">
            </div>

            <!-- //3 -->
            <div class="sliderWrapper">
                <img class="owl-lazy" data-src="./img/gallery/04.jpg" alt="">
            </div>

            <!-- //4 -->
            <div class="sliderWrapper">
                <img class="owl-lazy" data-src="./img/gallery/05.jpg" alt="">
            </div>
            
            <!-- //5 -->
            <div class="sliderWrapper">
                <img class="owl-lazy" data-src="./img/gallery/06.jpg" alt="">
            </div>

            <!-- //6 -->
            <div class="sliderWrapper">
                <img class="owl-lazy" data-src="./img/gallery/07.jpg" alt="">
            </div>
            
            <!-- //7 -->
            <div class="sliderWrapper">
                <img class="owl-lazy" data-src="./img/gallery/08.jpg" alt="">
            </div>

            <!-- //8 -->
            <div class="sliderWrapper">
                <img class="owl-lazy" data-src="./img/gallery/09.jpg" alt="">
            </div>

            <!-- //9 -->
            <div class="sliderWrapper">
                <img class="owl-lazy" data-src="./img/gallery/10.jpg" alt="">
            </div>

            <!-- //10 -->
            <div class="sliderWrapper">
                <img class="owl-lazy" data-src="./img/gallery/11.jpg" alt="">
            </div>
            
            <!-- //11 -->
            <div class="sliderWrapper">
                <img class="owl-lazy" data-src="./img/gallery/12.jpg" alt="">
            </div>
            
            <!-- //12 -->
            <div class="sliderWrapper">
                <img class="owl-lazy" data-src="./img/gallery/13.jpg" alt="">
            </div>
            
            <!-- //13 -->
            <div class="sliderWrapper">
                <img class="owl-lazy" data-src="./img/gallery/14.jpg" alt="">
            </div>
            
            <!-- //14 -->
            <div class="sliderWrapper">
                <img class="owl-lazy" data-src="./img/gallery/15.jpg" alt="">
            </div>
            
            <!-- //15 -->
            <div class="sliderWrapper">
                <img class="owl-lazy" data-src="./img/gallery/16.jpg" alt="">
            </div>
            
            <!-- //16 -->
            <div class="sliderWrapper">
                <img class="owl-lazy" data-src="./img/gallery/17.jpg" alt="">
            </div>
            
            <!-- //17 -->
            <div class="sliderWrapper">
                <img class="owl-lazy" data-src="./img/gallery/19.jpg" alt="">
            </div>
            
            <!-- //18 -->
            <div class="sliderWrapper">
                <img class="owl-lazy" data-src="./img/gallery/fruit-basket.jpg" alt="">
            </div>

        </div>

        <div class="sliderWrapper__nav">
            <div class="customPrevBtn"><img src="./img/prescriptive-pictures/left-arrow.svg" alt="Влево" title="Нажмите, чтобы прокрутить слайдер влево"></div>
            <div class="customNextBtn"><img src="./img/prescriptive-pictures/next-arrow.svg" alt="Вправо" title="Нажмите, чтобы прокрутить слайдер вправо"></div>
        </div>
    
    </div>

    <!-- --- отзывы --- -->
    <div class="reviews screen">

        <div class="heading">
            <h2 class="heading-title wow animate__animated animate__bounceInDown">Отзывы</h2>
        </div>

        <div class="content-index content-index-reviews">
            <div class="reviewsSlider owl-carousel owl-theme">

                    <div class="reviews-wrapper">

                        <div class="reviews-wrapper__header">
                            <span class="reviews-header__data">19.06.2020</span>
                            <span class="reviews-header__name">Гаджимурад Станбулович</span>
                        </div>

                        <div class="reviews-wrapper__body">
                            <div class="reviews-wrapper__img">
                                <img data-src="../img/reviews/reviews-1.jpg" alt="" title="" class="owl-lazy">
                                <img data-src="../img/reviews/Гена-отзыв.jpg" alt="" title="" class="owl-lazy reviews-wrapper__img-tel">
                            </div>
                            <p class="reviews-wrapper__text">e, natus dolores. Exercitationem praesentium dicta fuga explicabo aperiam velit eveniet et tenetur excepturi iste, quas consequatur saepe nihil esse corporis nobis laudantium natus. Voluptates eveniet ab est fuga nobis repellat saepe nemo veritatis dolorum laborum maxime molestiae recusandae, quos unde, doloremque consequatur reiciendis doloribus voluptate at commodi ea optio magni possimus neque. Earum eos nam ratione molestiae in porro ipsa vitae accusantium, et, quae totam possimus, laborum reiciendis voluptas minus exercitationem reprehenderit. Veniam laudantium impedit ipsam dolore eveniet magnam dolores expedita cum dolorum earum.</p>
                        </div>

                    </div>

                    <div class="reviews-wrapper">

                        <div class="reviews-wrapper__header">
                            <span class="reviews-header__data">19.06.2020</span>
                            <span class="reviews-header__name">Гаджимурад Станбулович</span>
                        </div>

                        <div class="reviews-wrapper__body">
                            <div class="reviews-wrapper__img">
                                <img data-src="../img/reviews/reviews-1.jpg" alt="" title="" class="owl-lazy">
                                <img data-src="../img/reviews/Гена-отзыв.jpg" alt="" title="" class="owl-lazy reviews-wrapper__img-tel">
                            </div>
                            <p class="reviews-wrapper__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime ipsa exercitationem sed distinctio vel assumenda saepe, natus dolores. Exercitationem praesentium dicta fuga explicabo aperiam velit eveniet et tenetur excepturi iste, quas consequatur saepe nihil esse corporis nobis laudantium natus. Voluptates eveniet ab est fuga nobis repellat saepe nemo veritatis dolorum laborum maxime molestiae recusandae, quos unde, doloremque consequatur reiciendis doloribus voluptate at commodi ea optio magni possimus neque. Earum eos nam ratione molestiae in porro ipsa vitae accusantium, et, quae totam possimus, laborum reiciendis voluptas minus exercitationem reprehenderit. Veniam laudantium impedit ipsam dolore eveniet magnam dolores expedita cum dolorum earum.</p>
                        </div>

                    </div>

                    <div class="reviews-wrapper">

                        <div class="reviews-wrapper__header">
                            <span class="reviews-header__data">19.06.2020</span>
                            <span class="reviews-header__name">Гаджимурад Станбулович</span>
                        </div>

                        <div class="reviews-wrapper__body">
                            <div class="reviews-wrapper__img">
                                <img data-src="../img/reviews/reviews-1.jpg" alt="" title="" class="owl-lazy">
                                <img data-src="../img/reviews/Гена-отзыв.jpg" alt="" title="" class="owl-lazy reviews-wrapper__img-tel">
                            </div>
                            <p class="reviews-wrapper__text">netur excepturi iste, quas consequatur saepe nihil esse corporis nobis laudantium natus. Voluptates eveniet ab est fuga nobis repellat saepe nemo veritatis dolorum laborum maxime molestiae recusandae, quos unde, doloremque consequatur reiciendis doloribus voluptate at commodi ea optio magni possimus neque. Earum eos nam ratione molestiae in porro ipsa vitae accusantium, et, quae totam possimus, laborum reiciendis voluptas minus exercitationem reprehenderit. Veniam laudantium impedit ipsam dolore eveniet magnam dolores expedita cum dolorum earum.</p>
                        </div>

                    </div>

                    <div class="reviews-wrapper">

                        <div class="reviews-wrapper__header">
                            <span class="reviews-header__data">19.06.2020</span>
                            <span class="reviews-header__name">Гаджимурад Станбулович</span>
                        </div>

                        <div class="reviews-wrapper__body">
                            <div class="reviews-wrapper__img">
                                <img data-src="../img/reviews/reviews-1.jpg" alt="" title="" class="owl-lazy">
                                <img data-src="../img/reviews/Гена-отзыв.jpg" alt="" title="" class="owl-lazy reviews-wrapper__img-tel">
                            </div>
                            <p class="reviews-wrapper__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime ipsa exercitationem sed distinctio vel assumenda saepe, natus dolores. Exercitationem praesentium dicta fuga explicabo aperiam velit eveniet et tenetur excepturi iste, quas consequatur saepe nihil esse corporis nobis laudantium natus. Voluptates eveniet ab est fuga nobis repellat saepe nemo veritatis dolorum laborum maxime molestiae recusandae, quos unde, doloremque consequatur reiciendis doloribus voluptate at commodi ea optio magni possimus neque. Earum eos nam ratione molestiae in porro ipsa vitae accusantium, et, quae totam possimus, laborum reiciendis voluptas minus exercitationem reprehenderit. Veniam laudantium impedit ipsam dolore eveniet magnam dolores expedita cum dolorum earum.</p>
                        </div>

                    </div>

                    <div class="reviews-wrapper">

                        <div class="reviews-wrapper__header">
                            <span class="reviews-header__data">19.06.2020</span>
                            <span class="reviews-header__name">Гаджимурад Станбулович</span>
                        </div>

                        <div class="reviews-wrapper__body">
                            <div class="reviews-wrapper__img">
                                <img data-src="../img/reviews/reviews-1.jpg" alt="" title="" class="owl-lazy">
                                <img data-src="../img/reviews/Гена-отзыв.jpg" alt="" title="" class="owl-lazy reviews-wrapper__img-tel">
                            </div>
                            <p class="reviews-wrapper__text">explicabo aperiam velit eveniet et tenetur excepturi iste, quas consequatur saepe nihil esse corporis nobis laudantium natus. Voluptates eveniet ab est fuga nobis repellat saepe nemo veritatis dolorum laborum maxime molestiae recusandae, quos unde, doloremque consequatur reiciendis doloribus voluptate at commodi ea optio magni possimus neque. Earum eos nam ratione molestiae in porro ipsa vitae accusantium, et, quae totam possimus, laborum reiciendis voluptas minus exercitationem reprehenderit. Veniam laudantium impedit ipsam dolore eveniet magnam dolores expedita cum dolorum earum.</p>
                        </div>

                    </div>

                    <div class="reviews-wrapper">

                        <div class="reviews-wrapper__header">
                            <span class="reviews-header__data">19.06.2020</span>
                            <span class="reviews-header__name">Гаджимурад Станбулович</span>
                        </div>

                        <div class="reviews-wrapper__body">
                            <div class="reviews-wrapper__img">
                                <img data-src="../img/reviews/reviews-1.jpg" alt="" title="" class="owl-lazy">
                                <img data-src="../img/reviews/Гена-отзыв.jpg" alt="" title="" class="owl-lazy reviews-wrapper__img-tel">
                            </div>
                            <p class="reviews-wrapper__text">possimus neque. Earum eos nam ratione molestiae in porro ipsa vitae accusantium, et, quae totam possimus, laborum reiciendis voluptas minus exercitationem reprehenderit. Veniam laudantium impedit ipsam dolore eveniet magnam dolores expedita cum dolorum earum.</p>
                        </div>

                    </div>

                    <div class="reviews-wrapper">

                        <div class="reviews-wrapper__header">
                            <span class="reviews-header__data">19.06.2020</span>
                            <span class="reviews-header__name">Гаджимурад Станбулович</span>
                        </div>

                        <div class="reviews-wrapper__body">
                            <div class="reviews-wrapper__img">
                                <img data-src="../img/reviews/reviews-1.jpg" alt="" title="" class="owl-lazy">
                                <img data-src="../img/reviews/Гена-отзыв.jpg" alt="" title="" class="owl-lazy reviews-wrapper__img-tel">
                            </div>
                            <p class="reviews-wrapper__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime ipsa exercitationem sed distinctio vel assumenda saepe, natus dolores. Exercitationem praesentium dicta fuga explicabo aperiam velit eveniet et tenetur excepturi iste, quas consequatur saepe nihil esse corporis nobis laudantium natus. Voluptates eveniet ab est fuga nobis repellat saepe nemo veritatis dolorum laborum maxime molestiae recusandae, quos unde, doloremque consequatur reiciendis doloribus voluptate at commodi ea optio magni possimus neque. Earum eos nam ratione molestiae in porro ipsa vitae accusantium, et, quae totam possimus, laborum reiciendis voluptas minus exercitationem reprehenderit. Veniam laudantium impedit ipsam dolore eveniet magnam dolores expedita cum dolorum earum.</p>
                        </div>

                    </div>

                    <div class="reviews-wrapper">

                        <div class="reviews-wrapper__header">
                            <span class="reviews-header__data">19.06.2020</span>
                            <span class="reviews-header__name">Гаджимурад Станбулович</span>
                        </div>

                        <div class="reviews-wrapper__body">
                            <div class="reviews-wrapper__img">
                                <img data-src="../img/reviews/reviews-1.jpg" alt="" title="" class="owl-lazy">
                                <img data-src="../img/reviews/Гена-отзыв.jpg" alt="" title="" class="owl-lazy reviews-wrapper__img-tel">
                            </div>
                            <p class="reviews-wrapper__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime ipsa exercitationem sed distinctio vel assumenda saepe, natus dolores. Exercitationem praesentium dicta fuga explicabo aperiam velit eveniet et tenetur excepturi iste, quas consequatur saepe nihil esse corporis nobis laudantium natus. Voluptates eveniet ab est fuga nobis repellat saepe nemo veritatis dolorum laborum maxime molestiae recusandae, quos unde, doloremque consequatur reiciendis doloribus voluptate at commodi ea optio magni possimus neque. Earum eos nam ratione molestiae in porro ipsa vitae accusantium, et, quae totam possimus, laborum reiciendis voluptas minus exercitationem reprehenderit. Veniam laudantium impedit ipsam dolore eveniet magnam dolores expedita cum dolorum earum.</p>
                        </div>

                    </div>

            </div>
        </div>
    </div>

    <!-- --- форма обратной связи --- -->

    <div class="feedback-form screen" id='feedback-form'>

        <div class="content-index">

            <div class="heading">
                <h2 class="heading-title wow animate__animated animate__bounceInDown">Заказать столик</h2>
            </div>

            <form method="POST" action="index.php#feedback-form" class="form-wrapper">

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

    <!-- --- контакты --- -->

    <div class="contacts screen">

        <div class="content-index">

            <div class="heading">
                <h2 class="heading-title wow animate__animated animate__bounceInDown">Контакты</h2>
            </div>

            <div class="contacts-wrapper">

                <div class="contacts-wrapper__map">
                    <div style="position:relative;overflow:hidden;" class="contacts-map"><a href="https://yandex.ru/maps/213/moscow/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Москва</a><a href="https://yandex.ru/maps/213/moscow/house/profsoyuznaya_ulitsa_128k1/Z04YcwZlT0YFQFtvfXpycXVrYQ==/?ll=37.515632%2C55.630985&sll=37.622504%2C55.753215&sspn=1.444702%2C0.466239&utm_medium=mapframe&utm_source=maps&z=16.56" style="color:#eee;font-size:12px;position:absolute;top:14px;">Профсоюзная улица, 128к1 — Яндекс.Карты</a><iframe src="https://yandex.ru/map-widget/v1/-/CCQpITDRDD" frameborder="1" allowfullscreen="true" width="100%" height="100%" style="position:relative;"></iframe></div>
                </div>

                <div class="contacts-wrapper__information">

                    <div class="contacts-wrapper__points">
                        <h3>Адрес:</h3>
                        <span>м. Коньково, ул. Профсоюзная, д. 128, кор. 1</span>
                    </div>

                    <div class="contacts-wrapper__points">
                        <h3>Телефон:</h3>
                        <span><a href="tel:+79264995900">+7 (926) 499-59-00</a></span>
                        <span><a href="tel:+79855166994">+7 (985) 516-69-94</a></span>
                    </div>

                    <div class="contacts-wrapper__points">
                        <h3>E-mail:</h3>
                        <span><a href="mailto:mahmud-0112@mail.ru">mahmud-0112@mail.ru</a></span>
                    </div>

                    <div class="contacts-wrapper__points">
                        <h3>Режим работы:</h3>
                        <span>с 11:00 до 01:00</span>
                    </div>

                    <div class="contacts-wrapper__points">
                        <h3>Мы в социальных сетях:</h3>

                        <div class="social">
                            <a href="#" class="social__item wow animate__animated animate__fadeInRight">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/dushavostoka.ru/?igshid=17qrp0udtjwtn" class="social__item wow animate__animated animate__fadeInRight">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="social__item wow animate__animated animate__fadeInRight">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="social__item wow animate__animated animate__fadeInRight">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- --- панорама --- -->

    <div>
        <div style="position:relative;overflow:hidden;"><a href="https://yandex.ru/maps/213/moscow/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Москва</a><a href="https://yandex.ru/maps/213/moscow/house/profsoyuznaya_ulitsa_128k1/Z04YcwZlT0YFQFtvfXpycXVrYQ==/?ll=37.515632%2C55.630985&panorama%5Bdirection%5D=309.139680%2C-7.211054&panorama%5Bfull%5D=true&panorama%5Bpoint%5D=37.516312%2C55.630668&panorama%5Bspan%5D=117.454518%2C56.950234&sll=37.622504%2C55.753215&sspn=1.444702%2C0.466239&utm_medium=mapframe&utm_source=maps&z=16.56" style="color:#eee;font-size:12px;position:absolute;top:14px;">Профсоюзная улица, 128к1 — Яндекс.Карты</a><iframe src="https://yandex.ru/map-widget/v1/-/CCQpIXANLD" width="100%" frameborder="1" allowfullscreen="true" style="position:relative;" class='panorama'></iframe></div>
    </div>

    
    <!-- <footer class="footer">

    </footer> -->
    <!-- <script src="./js/o-index.js"></script> -->

    <script src="./libs/jquery-3.5.1.min.js"></script>
    <script src="./libs/jquery.malihu.PageScroll2id.min.js"></script>
    <script src="./libs/jquery.vide.min.js"></script>
    <script src="./libs/wow/wow.min.jsA"></script>
    <script src="./libs/owlCarousel/owl.carousel.min.js"></script>

    <script src="./js/header.js"></script>
    <script src="./js/index/main.js"></script>
    <script>
        $(document).ready(function(){

            //первая карусель с галереей
            let owlGallery = $(".gallerySlider-wrapper");
            owlGallery.owlCarousel({
                items:1,
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
            });
            $('.customNextBtn').click(function() {
                owlGallery.trigger('next.owl.carousel');
            })
            // Go to the previous item
            $('.customPrevBtn').click(function() {
                owlGallery.trigger('prev.owl.carousel');
            })

            // вторая карусель с отзывами
            let owlReviews = $('.reviewsSlider');
            owlReviews.owlCarousel({
                items:3,
                lazyLoad:true,
                autoplay:true,
                autoplayTimeout:6000,
                autoplayHoverPause:true,
                lazyLoadEager: 1,
                smartSpeed: 700,
                autoHeight:true,
                dots: true,
                margin: 30,
                responsive : {
                    320:{
                        items:1
                    },
                    640:{
                        items:2
                    },
                    1200:{
                        items:3
                    }
                }
            });

        });
    </script>

    <script src="./js/index/general-modal.js"></script>
    <!-- <script src="./js/index/base.js"></script> -->
    <!-- <script src="./js/index/modal.js"></script> -->
    <!-- <script src="./js/index/index.js"></script> -->
    
    <script>new WOW().init();</script>
    <script src="./js/header-button.js"></script>

</body>
</html>
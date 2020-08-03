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

                <!-- <div class="menu__item">

                    <img data-src="./img/menu-price/page-1.jpg" alt="меню 1" title="меню 1" class="menu__item--dishes owl-lazy">

                    <div class="menu-wrapper">  

                        блок с тенью
                        <div class="menu-wrapper--shadow" data-open="menu">
                            <div class="menu__item--subblock-arrow-up" data-open="menu"></div>
                        </div>

                        по картинкам: page-1
                        <div class="menu__item--subblock">
                            
                            <div class="menu-hat">

                                кафе
                                <span>Душа Востока</span>
                                <img data-src="./img/menu/close-img.png" data-close="closeImg" alt="" title="" class="menu__close-img owl-lazy">

                            </div>

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

                        </div>

                    </div>

                </div> -->

            </div>

            <div class="sliderWrapper__nav">
                <div class="customPrevBtn"><img src="./img/prescriptive-pictures/left-arrow.svg" alt="Влево" title="Нажмите, чтобы прокрутить слайдер влево"></div>
                <div class="customNextBtn"><img src="./img/prescriptive-pictures/next-arrow.svg" alt="Вправо" title="Нажмите, чтобы прокрутить слайдер вправо"></div>
            </div>

        </div>

        <!-- конец слайдера -->
    </div>

        <!-- форма обратной связи -->

    <div class="feedback-form screen">

        <div class="content-index">

            <div class="heading">
                <h2 class="heading-title wow animate__animated animate__bounceInDown">Заказать столик</h2>
            </div>

            <form method="POST" action="menu.php" class="form-wrapper">

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
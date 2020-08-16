$(window).on("load",function(){
    //Page scroll to id
    $("a[rel='m_PageScroll2id']").mPageScroll2id();

    //video background vide.js
    $('.one-screen').vide('../video/home.mp4', {
        bgColor:'#000'
    });

    // windowT.bind('scroll', function(){

    //     let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
    //     if ( scrollTop > reviewsTop ) {
    //         document.scripts[6].remove();
    //         windowT.unbind('scroll');
    //     }

    // })


    // выведем карту только в тот момент, когда дойдем до блока ..
    // var variants = $('.view__more');
    // var variantsTop = variants.offset().top;
    // var windowT = $(window);


    // отложенная загрузка видео
    // var videoBlock = $('.videoY');
    // var videoTop = videoBlock.offset().top;
    // var windowV = $(window);

    // windowV.bind('scroll', function(){
    //     var windowTopV = $(this).scrollTop();
    //     if(windowTopV > videoTop) {
    //         $('.videoY').html('<iframe class="about__us--video" src="https://www.youtube.com/embed/cCvvQ-cQ6MQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen controls></iframe>')
    //         windowV.unbind('scroll');
    //         windowT.bind('scroll', function(too){
    //             var windowTop = $(this).scrollTop();
    //             if(windowTop > variantsTop) {
    //                 $('.map').html('<script charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A30bf8c91ef007eeaf756b2e01c963830de29086d4202e0d6ea6f63666b5ee483&amp;width=100%25&amp;height=340&amp;lang=ru_RU&amp;scroll=true"></script>')
    //                 windowT.unbind('scroll');
    //             }
    //     });
    //     }
    // });



});
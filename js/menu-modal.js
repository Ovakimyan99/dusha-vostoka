const openShadowMenu = document.querySelectorAll(["[data-open]"]);

openShadowMenu.forEach(function(items){

items.addEventListener('click', function(){
console.log(items);
    const menuSubblock = items.nextElementSibling;

    const eventSub = event.target.dataset.open;

    if ( eventSub == "menu" ) {
     
        this.classList.toggle('shadow-top');
        menuSubblock.classList.toggle('open-menu-subb');

    } else if ( eventSub == 'closeImg') {

        console.log('close block')
        document.querySelector('.menu__item--subblock.open-menu-subb').classList.toggle('open-menu-subb');
        document.querySelector('.menu-wrapper--shadow.shadow-top').classList.toggle('shadow-top');
    }

});

});
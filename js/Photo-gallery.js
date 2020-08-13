document.addEventListener('click', function(){
    const menuItemActive = event.target.dataset.open,
          menuItems = document.querySelectorAll('.gallery__header-item');
    const interior = document.querySelector('[data-interior]'),
          menu = document.querySelector('[data-menu]'),
          video = document.querySelector('[data-video]');
    const active = document.querySelector('.gallery__header-item');

    
    if ( menuItemActive == 'interior' ) {

        menuItems[0].classList.add('active');
        menuItems[1].classList.remove('active');
        menuItems[2].classList.remove('active');

        interior.style.display = "flex";
        menu.style.display = "none";
        video.style.display = "none";

    } else if ( menuItemActive == 'menu' ) {
        
        menuItems[0].classList.remove('active');
        menuItems[1].classList.add('active');
        menuItems[2].classList.remove('active');

        interior.style.display = "none";
        menu.style.display = "flex";
        video.style.display = "none";

    } else if( menuItemActive == 'video' ) {
        
        menuItems[2].classList.add('active');
        menuItems[1].classList.remove('active');
        menuItems[0].classList.remove('active');

        interior.style.display = "none";
        menu.style.display = "none";
        video.style.display = "flex";

    }
});
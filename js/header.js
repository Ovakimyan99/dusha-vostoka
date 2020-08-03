window.addEventListener('scroll', function() {
    let fon = document.querySelector('.header');
    let scrollTop = window.pageYOffset || fon.scrollTop;

    if (scrollTop > 0) {
        fon.style.background = '#361718';
    } else {
        fon.style.background = 'none';
    }
});
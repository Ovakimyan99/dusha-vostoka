const shadowSubblock = document.querySelectorAll('.menu-wrapper--shadow')
const menuSubblock   = document.querySelectorAll('.menu__item--subblock')
const menuWrapper    = document.querySelector('.menu-wrapper')
const menu__closeImg = document.querySelector('.menu__close-img')


const listener2 = event => {
  console.log(event.target)
  if ( event.target.dataset.close ) {
    menuSubblock.style.bottom = '-100%';
    shadowSubblock.style.bottom = '0';
  }
   else if ( event.target.dataset.menu ) {
    menuSubblock.style.bottom = '0';
    shadowSubblock.style.bottom = '100%';
  }
  // функция, в которой отслеживается клик по data-close, по нажатии которой модалка закрывается
}


shadowSubblock.addEventListener('onclick', listener2);



// document.querySelectorAll('.menu__item--subblock').addEventListener('click', listener);

// shadowSubblock.addEventListener('click', listener);

/* --------- // открытие и закрытие окна ------- */


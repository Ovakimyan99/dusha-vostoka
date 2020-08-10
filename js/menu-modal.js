const openShadowMenu = document.querySelectorAll(["[data-open]"]);

openShadowMenu.forEach(function(items){

items.addEventListener('click', function(){
    const menuSubblock = items.nextElementSibling;

    const eventSub = event.target.dataset.open;

    if ( eventSub == "menu" ) {
     
        this.classList.toggle('shadow-top');
        menuSubblock.classList.toggle('open-menu-subb');
        console.log(menuSubblock);

    } else if ( eventSub == 'closeImg') {
        console.log('close block')
        document.querySelector('.menu__item--subblock.open-menu-subb').classList.toggle('open-menu-subb');
        document.querySelector('.menu-wrapper--shadow.shadow-top').classList.toggle('shadow-top');
    }

});

});

/* ---- Начало модалок для подпунктов ---- */

// base.js

const ob = {};

//modal.js

Element.prototype.appendAfter = function(element) {
    element.parentNode.insertBefore(this, element.nextSibling);
};

function noop() {}

function _createModalFooter( buttons = [] ){
    if ( buttons.length === 0 ) {
        return document.createElement('div');
    }

    const wrap = document.createElement('div');
    wrap.classList.add('event-modal-footer');

    buttons.forEach( btn => {
        const $btn = document.createElement('button');
        $btn.textContent = btn.text;
        $btn.classList.add('btn'); //добавляем класс для кнопок
        $btn.classList.add(`btn-${btn.type || 'secondary'}`);
        $btn.onclick = btn.handler || noop;

        wrap.appendChild($btn);
    });

    return wrap;
}

function _createModal(options){
    const defaultWidth = '600px';
    const modal = document.createElement('div');
    modal.classList.add('event-modal');
    modal.insertAdjacentHTML('afterbegin', `
    <div class="event-modal-overlay" data-close="true">
        <div class="event-modal-window" style="width: ${options.width || defaultWidth}">
            <div class="event-modal-header">
                <h2 class="event-modal-title">${options.title || 'Окно'}</h2>
                ${options.closable ? `<span class="event-modal-close" data-close="true">&#9746;</span>` : ''}
            </div>

            <div class="event-modal-body" data-content>
                ${options.content || ''}
            </div>
        </div>
    </div>
    `);
    const footer = _createModalFooter(options.footerButtons);
    footer.appendAfter(modal.querySelector('[data-content]'));
    document.body.appendChild(modal);
    return modal;
}

ob.modal = function(options){
    const animationSpeed = 200;
    const Cmodal = _createModal(options);
    let closing = false;
    let destroyed = false;

    const modal = {
        open() {
            if (destroyed) {
                return console.log('Modal is destroyed');
            }
            !closing && Cmodal.classList.add('open');
            },
            close() {
                closing = true;
                Cmodal.classList.remove('open');
                Cmodal.classList.add('hide');
                setTimeout(() => {
                    closing = false;
                    Cmodal.classList.remove('hide');
                }, animationSpeed);
        }
    };

    const listener = event => {
        if ( event.target.dataset.close ) {
            modal.close();
        }
        //функция, в которой отслеживается клик по data-close, по нажатии которой модалка закрывается
    };

    Cmodal.addEventListener('click', listener);

    return Object.assign(modal, {
        destroy() {
            Cmodal.parentNode.removeChild(Cmodal);
            Cmodal.removeEventListener('click', listener);
            destroyed = true;
        },
        setContent(html) {
            Cmodal.querySelector('[data-content]').innerHTML = html;
            //динамически изменяем содержимое модального окна (class="event-modal-body"), 
            //если вызвать метод setContent(html) и вместо html вписать свое
        }
    });
} ;

//index.js

const cardsEvents = [
    {id: '1t', name: 'Блинчики с мясом', img: './img/news/zaglushka.png', alt: 'описание один', title: 'т описание один', text: ' Lorem ipsum dolor sit amet, consectetur adipisicing elit 1'},
    {id: '2t', name: 'Блинчики с творогом', img: './img/news/zaglushka.png', alt: 'описание два', title: 'т описание два', text: ' Lorem ipsum dolor sit amet, consectetur adipisicing elit 2'},
    {id: '3t', name: 'яичница', img: './img/news/zaglushka.png', alt: 'описание три', title: 'т описание три', text: ' Lorem ipsum dolor sit amet, consectetur adipisicing elit 3'}
];

const cardModalEvent = ob.modal({
    title: 'События в нашем кафе', // заголовок
    closable: true, // крестик
    width: '400px',
    footerButtons: [ //создаются кнопки и текст для них.
        {text: 'Ok', type: 'event-modal-footer__button', handler() {
            cardModalEvent.close();
            console.log('закрыть');
        }},
        {text: 'Закрыть', type: 'event-modal-footer__button-close', handler() {
            cardModalEvent.close();
            console.log('закрыть');
        }}
    ]
}); 

//
document.addEventListener('click', event => {
    const openItemModal = event.target.dataset.item;
    const id = event.target.dataset.id;

    if (openItemModal === 'openModal') { 
        // содержимое модалки
        event.preventDefault();
        console.log('прошло!')
        const cardsEventsHtml = cardsEvents.find( f => f.id === id )
        cardModalEvent.setContent(`
        <img src="${cardsEventsHtml.img}" alt="${cardsEventsHtml.alt}" title="${cardsEventsHtml.title}" class="modal-event-img">
        <p>${cardsEventsHtml.text}</p>
        `);

        cardModalEvent.open();
    }
});

$('.customNextBtn').click(function() {
    $('.owl-carousel').trigger('next.owl.carousel');
    callback();
});
// Go to the previous item
$('.customPrevBtn').click(function() {
    $('.owl-carousel').trigger('prev.owl.carousel');
    callback();
});


function callback(event){
    if (document.querySelector('.menu__item--subblock.open-menu-subb')){
        document.querySelector('.menu__item--subblock.open-menu-subb').classList.toggle('open-menu-subb');
        document.querySelector('.menu-wrapper--shadow.shadow-top').classList.toggle('shadow-top');
    }
    console.log('сработало');
}
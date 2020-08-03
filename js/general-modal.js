// base.js

const ob = {};

//modal.js

Element.prototype.appendAfter = function(element) {
    element.parentNode.insertBefore(this, element.nextSibling)
}

function noop() {}

function _createModalFooter( buttons = [] ){
    if ( buttons.length === 0 ) {
        return document.createElement('div')
    }

    const wrap = document.createElement('div')
    wrap.classList.add('event-modal-footer')

    buttons.forEach( btn => {
        const $btn = document.createElement('button');
        $btn.textContent = btn.text
        $btn.classList.add('btn') //добавляем класс для кнопок
        $btn.classList.add(`btn-${btn.type || 'secondary'}`)
        $btn.onclick = btn.handler || noop

        wrap.appendChild($btn)
    })

    return wrap;
}

function _createModal(options){
    const defaultWidth = '600px'
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
    `)
    const footer = _createModalFooter(options.footerButtons)
    footer.appendAfter(modal.querySelector('[data-content]'))
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
            !closing && Cmodal.classList.add('open')
            },
            close() {
                closing = true;
                Cmodal.classList.remove('open');
                Cmodal.classList.add('hide')
                setTimeout(() => {
                    closing = false;
                    Cmodal.classList.remove('hide');
                }, animationSpeed)
        }
    }

    const listener = event => {
        if ( event.target.dataset.close ) {
            modal.close()
        }
        //функция, в которой отслеживается клик по data-close, по нажатии которой модалка закрывается
    }

    Cmodal.addEventListener('click', listener)

    return Object.assign(modal, {
        destroy() {
            Cmodal.parentNode.removeChild(Cmodal)
            Cmodal.removeEventListener('click', listener)
            destroyed = true;
        },
        setContent(html) {
            Cmodal.querySelector('[data-content]').innerHTML = html
            //динамически изменяем содержимое модального окна (class="event-modal-body"), 
            //если вызвать метод setContent(html) и вместо html вписать свое
        }
    })
} 

//index.js

const cardsEvents = [
    {id: 'events-elems-header-first', name: 'Событие 1', text:'текст', img: './img/news/zaglushka.png', alt: 'описание один', title: 'т описание один', text: ' Lorem ipsum dolor sit amet, consectetur adipisicing elit 1'},
    {id: 'events-elems-header-second', name: 'Событие 2', text: 'текст 2', img: './img/news/zaglushka.png', alt: 'описание два', title: 'т описание два', text: ' Lorem ipsum dolor sit amet, consectetur adipisicing elit 2'},
    {id: 'events-elems-header-third', name: 'Событие 3', text: 'текст 3', img: './img/news/zaglushka.png', alt: 'описание три', title: 'т описание три', text: ' Lorem ipsum dolor sit amet, consectetur adipisicing elit 3'}
]

const toHTML = cardsEventsHtml => `
<div class="events-elems-header" id="${cardsEventsHtml.id}">
    <div class="events-elems">
        <div class="events-image-block">
            <img src="${cardsEventsHtml.img}" alt="${cardsEventsHtml.alt}" title="${cardsEventsHtml.title}" class="events-image" data-btn="card" data-id="${cardsEventsHtml.id}">
        </div>

        <div class="events-text-block">
            
            <a href="#">ПЕРЕЙТИ К СОБЫТИЮ</a>
        </div>
    </div>
    <a href="#" class="events-elems-header__title">${cardsEventsHtml.name}</a>
</div>
`

function render() {
    const html = cardsEvents.map(toHTML).join('')
    document.querySelector('#events-wrapper').innerHTML = html
}

render();

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
    const Ec = event.target.dataset.btn;
    const id = event.target.dataset.id;

    if (Ec === 'card') { // содержимое модалки
        event.preventDefault();
        const cardsEventsHtml = cardsEvents.find( f => f.id === id )
        cardModalEvent.setContent(`
        <img src="${cardsEventsHtml.img}" alt="${cardsEventsHtml.alt}" title="${cardsEventsHtml.title}" class="modal-event-img">
        <p>${cardsEventsHtml.text}</p>
        `);

        cardModalEvent.open();
        console.log(cardsEventsHtml);
    }
});
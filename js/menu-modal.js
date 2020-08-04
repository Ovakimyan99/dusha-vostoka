// base.js

const ob = {};

//modal.js


//логика: создаем сначала модалку, а потом уже генерируем сами карты под модалки
Element.prototype.appendAfter = function(element) {
    element.parentNode.insertBefore(this, element.nextSibling);
};

//реализация самой модалки через верстку
function _createModal(options){
    const defaultWidth = '600px';
    const modal = document.createElement('div');
    modal.classList.add('event-modal');
    modal.insertAdjacentHTML('afterbegin', `
    <div class="menu-modal" data-close="true">
        <div class="menu-modal-wrapper" style="width: ${options.width || defaultWidth}">

            <h4>${options.title || 'Окно'}</h4>
            ${options.closable ? `<span class="menu-modal-close" data-close="true">&#9746;</span>` : ''}

            <div class="menu-modal__image-wrapper">
                <img src="./img/home/menu-dishes.jpg" alt="" title='' class='menu-modal__image'>
            </div>

            <div class="menu-modal__text" data-content>
            ${options.content || ''}    
            </div>

            <div class="menu-modal__rates">
                <span class="menu__list--item-price">${options.price}</span>
                <span class="menu__list--item-gram">${options.gram}</span>
            </div>

        </div>
    </div>
    `);
    document.body.appendChild(modal);
    return modal;
    //возвращаем модалку. генерируем ее
}

//реализация самой модалки через верстку
function _createSubModal(options){
    const subModal = document.createElement('div');
    subModal.classList.add('menu__item--subblock');
    subModal.insertAdjacentHTML('afterbegin', `
                            
        <div class="menu-hat">

            кафе
            <span>Душа Востока</span>
            ${options.closable ? `<img data-src="./img/menu/close-img.png" data-close="closeImg" alt="" title="" class="menu__close-img owl-lazy">` : ''}

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
    `);
    const headerSubModal = _createSubModalHeader(options);
    headerSubModal.appendAfter(subModal.querySelector('[data-contentSub]'));
    //вставляем в блок с data attribute content
    document.body.appendChild(subModal);
    return subModal;
    //возвращаем модалку. генерируем ее
}

ob.modal = function(options){
    const animationSpeed = 200; //анимация. скорость появления
    const Cmodal = _createModal(options); // Cmodal = модалка
    let closing = false;
    let destroyed = false;

    const modal = { //включение и отключение модалки
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

    Cmodal.addEventListener('click', listener); // отслеживание клика

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
};

ob.subModal = function(options){
    const animationSpeed = 200; //анимация. скорость появления
    const Cmodal = _createSubModal(options); // Cmodal = модалка
    let closing = false;
    let destroyed = false;

    const modal = { //включение и отключение модалки
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

    Cmodal.addEventListener('click', listener); // отслеживание клика

    return Object.assign(modal, {
        destroy() {
            Cmodal.parentNode.removeChild(Cmodal);
            Cmodal.removeEventListener('click', listener);
            destroyed = true;
        },
        setContent(html) {
            Cmodal.querySelector('[data-contentSub]').innerHTML = html;
            //динамически изменяем содержимое модального окна (class="event-modal-body"), 
            //если вызвать метод setContent(html) и вместо html вписать свое
        }
    });
};

//index.js

const cardsEvents = [
    {id: 'events-elems-header-first', text:'текст', img: './img/menu-price/page-1.jpg', alt: 'описание один', title: 'т описание один', text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit 1'},
    {id: 'events-elems-header-second', text: 'текст 2', img: './img/menu-price/page-2.jpg', alt: 'описание два', title: 'т описание два', text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit 2'},
    {id: 'events-elems-header-third', text: 'текст 3', img: './img/menu-price/page-3.jpg', alt: 'описание три', title: 'т описание три', text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit 3'},
    {id: 'events-elems-header-fourth', text: 'текст 4', img: './img/menu-price/page-4.jpg', alt: 'описание четыре', title: 'т описание четыре', text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit 4'}
];

const toHTML = cardsEventsHtml => `
<div class="menu__item" id="${cardsEventsHtml.id}">

    <img data-src="${cardsEventsHtml.img}" alt="${cardsEventsHtml.alt}" title="${cardsEventsHtml.title}" class="menu__item--dishes owl-lazy" data-id="${cardsEventsHtml.id}">

    <div class="menu-wrapper">  

        <!-- блок с тенью -->
        <div class="menu-wrapper--shadow" data-open="menu" data-btn="card">
            <div class="menu__item--subblock-arrow-up" data-open="menu" data-btn="card"></div>
        </div>

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
        </div>
    </div>

</div>
`;

function render() {
    const html = cardsEvents.map(toHTML).join('');
    document.querySelector('.menu__slider--wrapper').innerHTML = html;
}

render();

const cardModalEvent = ob.modal({
    title: 'События в нашем кафе', // заголовок
    closable: true, // крестик
    width: '400px'
}); 


const cardSubModalEvent = ob.subModal({
    title: 'События в нашем кафе', // заголовок
    closable: true, // крестик
    width: '400px'
}); 

//ловля любого клика и нахождение dataset.btn
document.addEventListener('click', event => {
    const Ec = event.target.dataset.open;
    const id = event.target.dataset.id;

    if (Ec === 'card') { // содержимое модалки
        event.preventDefault();
        const cardsEventsHtml = cardsEvents.find( f => f.id === id );
        cardModalEvent.setContent(
        `<img src="${cardsEventsHtml.img}" alt="${cardsEventsHtml.alt}" title="${cardsEventsHtml.title}" class="modal-event-img">
        <p>${cardsEventsHtml.text}</p>
        `);

        cardModalEvent.open();
        console.log(cardsEventsHtml);
    }

    if (Ec === 'menu'){
        console.log('открываем подменю')
        event.preventDefault();
        // console.log(subModal)
    }
    
});
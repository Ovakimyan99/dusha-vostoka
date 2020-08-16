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

//верстка модалки. Динамически подгружаем информацию из cardsEvents - файл index.js
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
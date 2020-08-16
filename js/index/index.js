const cardsEvents = [
    {id: 'events-elems-header-first', name: 'Событие 1', text:'текст', img: './img/news/zaglushka.png', alt: 'описание один', title: 'т описание один', text: ' Lorem ipsum dolor sit amet, consectetur adipisicing elit 1'},
    {id: 'events-elems-header-second', name: 'Событие 2', text: 'текст 2', img: './img/news/zaglushka.png', alt: 'описание два', title: 'т описание два', text: ' Lorem ipsum dolor sit amet, consectetur adipisicing elit 2'},
    {id: 'events-elems-header-third', name: 'Событие 3', text: 'текст 3', img: './img/news/zaglushka.png', alt: 'описание три', title: 'т описание три', text: ' Lorem ipsum dolor sit amet, consectetur adipisicing elit 3'}
]


//внедряется верстка в страницу index.php, в блок с классом events-wrapper
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

//сама модалка
const cardModalEvent = ob.modal({
    title: 'События в нашем кафе', // заголовок
    closable: true, // крестик
    width: '400px',
    footerButtons: [ //создаются кнопки и текст для них.
        {text: 'Ok', type: 'event-modal-footer__button', handler() {
            cardModalEvent.close()
            console.log('закрыть')
        }},
        {text: 'Закрыть', type: 'event-modal-footer__button-close', handler() {
            cardModalEvent.close()
            console.log('закрыть')
        }}
    ]
}); 

document.addEventListener('click', event => {
    const Ec = event.target.dataset.btn
    const id = event.target.dataset.id

    if (Ec === 'card') { // содержимое модалки
        event.preventDefault();
        const cardsEventsHtml = cardsEvents.find( f => f.id === id )
        cardModalEvent.setContent(`
        <img src="${cardsEventsHtml.img}" alt="${cardsEventsHtml.alt}" title="${cardsEventsHtml.title}" class="modal-event-img">
        <p>${cardsEventsHtml.text}</p>
        `)

        cardModalEvent.open()
        console.log(cardsEventsHtml)
    }
})
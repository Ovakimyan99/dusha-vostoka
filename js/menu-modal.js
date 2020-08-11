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
    {id: 'breakfasts-1', name: 'Блинчики с мясом', img: './img/news/zaglushka.png', alt: 'описание один', title: 'т описание один', text: 'Подаются со сметаной'},
    {id: 'breakfasts-2', name: 'Блинчики с творогом', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Подаются со сметаной'},
    {id: 'breakfasts-3', name: 'Яичница', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Из двух яиц'},
    {id: 'breakfasts-4', name: 'Каша овсяная', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Каша овсяная'},
    {id: 'salad-1', name: 'ОЛИВЬЕ С КУРИЦЕЙ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Картофель, огурец соленый, яйцо отваренное, куриное филе, майонез, горошек зеленый, зелень, морковь'},
    {id: 'salad-2', name: 'ГРЕЧЕСКИЙ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Помидоры бакинские, перец ассорти, огурцы свежие, сыр фета, маслины, лук красный, зелень, салат Айсберг, соус'},
    {id: 'salad-3', name: 'ЦЕЗАРЬ С КУРИЦЕЙ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Салат Романо, куриное филе, сыр Пармезан, помидоры Черри, яйцо перепелиное, соус'},
    {id: 'salad-4', name: 'ЦЕЗАРЬ С КРИВЕТКАМИ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Салат руккола, креветки отварные, сыр Пармезан, помидоры Черри, соус'},
    {id: 'salad-5', name: 'РУККОЛА С КРЕВЕТКАМИ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Вырезка говяжья, огурцы свежие, помидоры Черри, микс - салат, сыр пармезан, соус'},
    {id: 'salad-6', name: 'МЯСНОЙ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Помидоры, микс - салат, сыр моцарелла, бальзамический соус, базилик, соус Песто'},
    {id: 'salad-7', name: 'ТАР - ТАР ИЗ ГОВЯДИНЫ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Вырезка говяжья, руккола, помидоры черри, базилик, яйцо Перепелиное, соус'},
    {id: 'salad-8', name: 'КАЛЬМАРОВЫЙ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Кальмар, огурцы свежие, салат Романо, соус кунжутный'},
    {id: 'salad-9', name: 'САЛАТ "ДУША ВОСТОКА"', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Баклажан, кабачки, перец ассорти, морковь, вырезка говяжья, помидоры Черри, базилик, фирменный соус'},
    {id: 'salad-10', name: 'ПОМИДОРЫ С КРАСНЫМ ЛУКОМ И АВОКАДО', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Помидоры Бакинские, лук красный, авокадо, базилик, бальзамический соус, масло оливковое'},
    {id: 'salad-11', name: 'МАНГАЛ САЛАТ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Помидоры Бакинские, баклажан, кабачки, перец ассорти, чеснок, зелень'},
    {id: 'salad-12', name: 'ОВОЩНОЙ БУКЕТ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Помидоры Бакинские, редис, огурцы свежие, лук красный, зелень, заправка на выбор'},
    {id: 'salad-13', name: 'ТЕПЛЫЙ ФЛАМБЕ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Печень куриная, микс - салат, кедровый орех, апельсин, яйцо красное, соус медово - горчичный'},
    {id: 'salad-14', name: 'САЛАТ ВОСТОЧНЫЙ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Баклажан, салат Айсберг, огурцы свежие, морковь свежая, микс - салат, куриное филе, соус'},
    {id: 'cold-snacks-1', name: 'МЯСНАЯ ТАРЕЛКА', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Окорок говяжий копченый, бастурма, колбаса сырокоченая, еврейская, говяжий язык отварной, хрен, горчица, помидоры Черри, зелень'},
    {id: 'cold-snacks-2', name: 'АССОРТИ БРУСЕТТА', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Багет черный, куриное филе, помидоры Бакинские, лосось с/с, Моцарелла, зелень, соус Место, масло оливковое, бальзамический соус'},
    {id: 'cold-snacks-3', name: 'РЫБНОЕ АССОРТИ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Лосось с/с, палтус х/х, маляная рыба, х/к, димон, оливки, маслины, зелень'},
    {id: 'cold-snacks-4', name: 'СЫРНАЯ ТАРЕЛКА', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Пармезан, Дор - Блю, Гауда, Бри, мед, виноград, грецкие орехи, мята'},
    {id: 'cold-snacks-5', name: 'РУЛЕТИКИ ИЗ БАКЛАЖАНОВ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Баклажан, перец сладкий, грецкий орех, кинза, морковь, зелень, соус фирменный'},
    {id: 'cold-snacks-6', name: 'ГРИБНОЕ АССОРТИ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Маслята, шампионьоны, лисички, лук красный, кинза, чеснок, масло оливковое, уксус столовый'},
    {id: 'cold-snacks-7', name: 'АССОРТИ СОЛЕНИЙ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Чеснок, помидоры, перец, огурцы, черемша, квашеная капуста'},
    {id: 'cold-snacks-8', name: 'ВОСТОЧНАЯ ТАРЕЛКА', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Инжир, курага, кешью, миндаль, грецкий орех, изюм, чернослив, мед'},
    {id: 'hot-snack-1', name: 'САМСА ОСОБАЯ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Мясо  говядины, лук красный, помидоры, кинза, специи, тесто'},
    {id: 'hot-snack-2', name: 'САМСА С БАРАНИНОЙ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Мясо баранины, лук, специи, тесто'},
    {id: 'hot-snack-3', name: 'ЖУЛЬЕН С ГРИБАМИ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Шампиньоны, сыр Гауда, лук, соус Бешамель'},
    {id: 'hot-snack-4', name: 'ШАУРМА ПО - АРАБСКИ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Куриное филе, куриное бедро, капуста, огурец свежий, помидор свежий, соус фирменный, аджика, лаваш'},
    {id: 'hot-snack-5', name: 'КУТАБ С СЫРОМ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Сыр Сулугуни, яйцо, сливочное масло, тесто'},
    {id: 'hot-snack-6', name: 'СЫРНЫЕ ШАРИКИ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Сыр Гауда, сухари панировочные, яйцо, мука, топинг, соус'},
    {id: 'hot-snack-7', name: 'КУТАБЫ С ЗЕЛЕНЬЮ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Руккола, шпинат, мята, петрушка, кинща, лук зеленый'},
    {id: 'hot-snack-8', name: 'ПИВНАЯ ТАРЕЛКА', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Луковые кольца, кольца кальмаров, гренки чесночные, картофель фри, сырные шарики, соус чесночный, соус тар - тар'},
    {id: 'hot-snack-9', name: 'ГРЕНКИ С ЧЕСНОКОМ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Гренки с чесноком'},
    {id: 'hot-snack-10', name: 'ПИВНАЯ ЗАКУСКА', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Бараньи семечки, колбаски охотничьи, соус Redhot'},
    {id: 'hot-snack-11', name: 'ЧЕБУРЕК С СЫРОМ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Сыр Сулугуни, тесто'},
    {id: 'hot-snack-12', name: 'ЧЕБУРЕК С МЯСОМ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Фарш говяжий, лук, тесто'},
    {id: 'hot-snack-13', name: 'КРЫЛЬЯ КУРИНЫЕ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Крылышки острые, морковь, стебель сельдерея, соус сырный'},
    {id: 'hot-snack-14', name: 'КРЕВЕТКИ ТИГРОВЫЕ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Креветки, чеснок, на выбор: соус ким -чи, соус соевый, кино белое'},
    {id: 'first-meal-1', name: 'ШУРПА С БАРАНИНОЙ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Каре ягненка, шея баранья, морковь, лук репчатый, нут, картофель, зелень ассорти'},
    {id: 'first-meal-2', name: 'БОРЩ МОСКОВСКИЙ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Капуста б/к, свекла, морковь, лук репчатые, перец болгарский, томат, говядина, чеснок, зелень'},
    {id: 'first-meal-3', name: 'ЛАГМАН', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Лапша домашняя, перец ассорти, говядина мякоть, морковь, нут, томат, чеснок, картофель, зелень'},
    {id: 'first-meal-4', name: 'СУП - ЛАПША КУРИНАЯ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Курица, лапша, лук, морковь, бульон овощной, яйцо перепелиное, зелень'},
    {id: 'first-meal-5', name: 'ПИТИ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Мякоть баранины, нут, курдюк, морковь, лук, репа, картофель, шафран'},
    {id: 'first-meal-6', name: 'УХА ПО - БРАКОНЬЕРСКИ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Филе трески, стебель сельдерея, морковь, картофель, перец зеленый, лук порей, лимон, зелень'},
    {id: 'first-meal-7', name: 'КАПУЧИНО С БЕЛЫМИ ГРИБАМИ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Белые грибы, шампиньоны, лук, картофель, сливки'},
    {id: 'first-meal-8', name: 'ХАРЧО', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Говядина, хмели - сунели, аджика, томат, рис'},
    {id: 'second-hot-dishes-1', name: 'ПЛОВ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Рис дивзира, морковь, мясо баранины, лук, курдюк, специи на выбор'},
    {id: 'second-hot-dishes-2', name: 'МАНТЫ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Говядина, лук репчатый, зелень, мука, специи, яйцо'},
    {id: 'second-hot-dishes-3', name: 'ДОЛМА', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Говядина, рис, лук, помидоры, зелень, мацони'},
    {id: 'second-hot-dishes-4', name: 'ЛАГМАН УЙГУРСКИЙ "ДУША ВОСТОКА"', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Лапша домашняя, перец красный, томат, лук, перец острый, сельдерей, фасоль стручковая, чеснок, зелень'},
    {id: 'second-hot-dishes-5', name: 'КАЗАН - КЕБАБ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Каре ягненка, картофель, помидоры Черри, лук красный, зелень'},
    {id: 'second-hot-dishes-6', name: 'ЦЫПЛЕНОК ТАБАКА', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Цыпленок, кукуруза, фирменный соус, зелень, лаваш, помидоры, огурцы'},
    {id: 'second-hot-dishes-7', name: 'ДОРАДО С ОВОЩАМИ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Дорадо, кабачки, баклажаны, перец ассорти, лимон, зелень'},
    {id: 'second-hot-dishes-8', name: 'ЛОСОСЬ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Лосось, лимон, микс - салат, зелень, соус Наршараб'},
    {id: 'second-hot-dishes-9', name: 'ЛАПША СОБА', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Гречневая лапша, куриное филе, овощи, соус Соба'},
    {id: 'second-hot-dishes-10', name: 'МЕДАЛЬОНЫ С ГРИБАМИ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Вырезка говяжья, грибы шампиньоны, сливки, кукуруза, перец чили'},
    {id: 'second-hot-dishes-11', name: 'БУРГЕР НЕРО', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Булочка, фарш говяжий, лук красный, салат Айсберг, огурцы соленые, помидоры, соус, картофель фри, кетчуп'},
    {id: 'second-hot-dishes-12', name: 'КУРИНОЕ ФИЛЕ ПО - ТАЙСКИ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Филе куриное, морковь, редис, лук красный, соус кисло - сладкий, кунжут, мед'},
    {id: 'second-hot-dishes-13', name: 'ТЕЛЯТИНА ТЕРИЯКИ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Телятина, кабачки, лук красный, чесной, соус терияки, зелень'},
    {id: 'second-hot-dishes-14', name: 'ФИЛЕ МИНЬОН', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Вырезка говяжья, спаржа, помидоры Черри, чеснок, соус Демитласс'},
    {id: 'second-hot-dishes-15', name: 'ПЕЛЬМЕНИ ЖАРЕНЫЕ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Фарш мясной, лук, тесто'},
    {id: 'second-hot-dishes-16', name: 'ПЕЛЬМЕНИ ВАРЕНЫЕ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Фарш мясной, лук, тесто'},
    {id: 'second-hot-dishes-17', name: 'ПЛОВ ПРАЗДНИЧНЫЙ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Рис, морковь, лук, мясо говядины'},
    {id: 'side-dishes-1', name: 'КАРТОФЕЛЬ МОЛОДОЙ С РОЗМАРИНОМ И ЧЕСНОКОМ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Картофель молодой с розмарином и чесноком'},
    {id: 'side-dishes-2', name: 'КАРТОФЕЛЬ ПО - ДЕРЕВЕНСКИ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Картофель по - деревенски'},
    {id: 'side-dishes-3', name: 'КАРТОФЕЛЬ ФРИ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Картофель фри'},
    {id: 'side-dishes-4', name: 'КАРТОФЕЛЬ ЖАРЕНЫЙ С ГРИБАМИ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Картофель жареный с грибами'},
    {id: 'side-dishes-5', name: 'ОВОЩИ ГРИЛЬ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Овощи гриль'},
    {id: 'side-dishes-6', name: 'РИС МИКС', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Рис микс'},
    {id: 'side-dishes-7', name: 'КАРТОФЕЛЬНОЕ ПЮРЕ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Картофельное пюре'},
    {id: 'sauces-1', name: 'ТАР - ТАР', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Тар - тар'},
    {id: 'sauces-2', name: 'REDHOT', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Redhot'},
    {id: 'sauces-3', name: 'ЧЕСНОЧНЫЙ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Чесночный'},
    {id: 'sauces-4', name: 'КЕТЧУП ХАЙНЦ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Кетчуп хайнц'},
    {id: 'sauces-5', name: 'НАРШАРАБ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Наршараб'},
    {id: 'sauces-6', name: 'ГОРЧИЦА ДИЖОНСКАЯ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Горчица дижонская'},
    {id: 'sauces-7', name: 'АДЖИКА', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Аджика'},
    {id: 'sauces-8', name: 'BBQ СОУС', img: './img/news/zaglushka.png', alt: '', title: '', text: 'BBQ соус'},
    {id: 'sauces-9', name: 'КОКТЕЙЛЬ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Коктейль'},
    {id: 'sauces-10', name: 'ТКЕМАЛИ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Ткемали красный или зеленый'},
    {id: 'sauces-11', name: 'ХРЕН СЛИВОЧНЫЙ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Хрен сливочный'},
    {id: 'sauces-12', name: 'СМЕТАНА', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Сметана'},
    {id: 'bread', name: 'Хлеб', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Хлеб'},
    {id: 'real-leaf-tea-1', name: 'АНГЛИЙСКИЙ КЛАССИЧЕСКИЙ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Ароматная смесь из крупнолистового и индийского чая Ассам и цейлонского чая'},
    {id: 'real-leaf-tea-2', name: 'АССАМ №17', img: './img/news/zaglushka.png', alt: '', title: '', text: 'рупнолистовой чай высшего сорта из высокогорного района штата Ассам'},
    {id: 'real-leaf-tea-3', name: 'ЛАПСАНГ СУШОНГ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Китайский чай. Его листья завиливают над костром, в следствии чего они преобретают особый копченый аромат'},
    {id: 'real-leaf-tea-4', name: 'ЧАЙ С ЧАБРЕЦОМ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Черный чай с обавлением соцветий настоящего горного чебреца'},
    {id: 'flavored-tea-1', name: 'ЭРА ГРЕЙ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Смесь китайских, цейлонских и индийских чаён, ароматизирован натуральными маслами бергамота'},
    {id: 'flavored-tea-2', name: 'ЧАЙ С ШИПОВНИКОМ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Любимый многими чай с плодами шиповника'},
    {id: 'herbal-mixtures-1', name: 'КОРОЛЕВСКИЙ ГИБИСКУС', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Смесь из гибискуса, известного также как судаиская роза'},
    {id: 'herbal-mixtures-2', name: 'ЗАРЯД БОДРОСТИ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Смесь из ройбуша красного и зеленого, чая зеленого, кусочков медового дерева, имбиря, ягод лимончика'},
    {id: 'green-tea-1', name: 'ЗЕЛЕНЫЙ ЖЕМЧУГ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Цельносистовой отборный чай из Китая в виде зеленых "жемчужин"'},
    {id: 'green-tea-2', name: 'ЗЕЛЕНЫЙ ПОРОХ СЕН-ЧА', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Китайский скрученный зеленый чай'},
    {id: 'flavored-green-tea-1', name: 'ЗЕЛЕНЫЙ ГРАФ ГРЕЙ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Смесь из японской Сей - Чи и ассамского чая'},
    {id: 'flavored-green-tea-2', name: 'ЗЕЛЕНЫЙ КЛУБНИЧНЫЙ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Смесь китайского зеленого чая и ягод'},
    {id: 'flavored-green-tea-3', name: 'ЯПОНСКАЯ ЛИПА', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Смесь из японской Сен - Чи и ассамского чая со вкусом лимонника'},
    {id: 'flavored-green-tea-4', name: 'ЯПОНСКАЯ САКУРА', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Японская Сен - Чи с плодами вишен'},
    {id: 'paraguayan-mate-tea-1', name: 'МАТЭ ЛИМОННЫЙ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Парагвайский чай с ароматом лимона'},
    {id: 'paraguayan-mate-tea-2', name: 'МАТЭ "СИЦИЛИАНО"', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Парагвайский чай с ароматом бергамота'},
    {id: 'fruit-mix-1', name: 'ФРУКТОВЫЙ ЧАЙ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'В ассортименте, уточняйте у официантов'},
    {id: 'fruit-mix-2', name: 'ВАРЕНЬЕ В АССОРТИМЕНТЕ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Парагвайский чай с ароматом бергамота'},
    {id: 'fruit-mix-3', name: 'МЕД', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Липовый мед'},
    {id: 'coffe-1', name: 'ЭСПРЕССО', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Эспрессо из свежемолотых зерен'},
    {id: 'coffe-2', name: 'ЭСПРЕССО ДВОЙНОЙ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Двойная порция эспрессо - крепость'},
    {id: 'coffe-3', name: 'АМЕРИКАНО', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Эспрессо с двойной порцией воды - объем'},
    {id: 'coffe-4', name: 'КОФЕ СО СЛИВКАМИ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Эспрессо с порционными сливками'},
    {id: 'coffe-5', name: 'КОФЕ ПО - ВЕНСКИ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Кофе с добавлением взбитых сливок'},
    {id: 'coffe-6', name: 'КОФЕ ГЛЯССЕ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Кофе эспрессо с добавлением взбитых мороженого'},
    {id: 'coffe-7', name: 'КАПУЧИНО', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Эспрессо со взбитой молочной пеной, корица подчеркивает вкус кофе'},
    {id: 'coffe-8', name: 'ИРЛАНДСКИЙ КОФЕ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Коктейли из эспрессо, виски и взбитых сливок'},
    {id: 'coffe-9', name: 'ЛАТТЕ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Молочный напиток на основе эспрессо'},
    {id: 'coffe-10', name: 'МОЛОКО', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Молоко'},
    {id: 'coffe-11', name: 'СЛИВКИ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Сливки'},
    {id: 'milk-cocktails-1', name: 'СЛИВОЧНЫЙ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Приготовлен из мороженого "Пломбир", молока и сока'},
    {id: 'milk-cocktails-2', name: 'ДЕСЕРТНЫЙ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Приготовлен из мороженого "Пломбир", свежих фруктов, сока и сиропа'},
    {id: 'water-1', name: 'GSTEINER', img: './img/news/zaglushka.png', alt: '', title: '', text: 'GSTEINER'},
    {id: 'water-2', name: 'БОН АКВА', img: './img/news/zaglushka.png', alt: '', title: '', text: 'БОН АКВА'},
    {id: 'water-3', name: 'НОВОТЕРСКАЯ ЦЕЛЕБНАЯ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'НОВОТЕРСКАЯ ЦЕЛЕБНАЯ'},
    {id: 'water-4', name: 'ЕССЕНТУКИ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'ЕССЕНТУКИ'},
    {id: 'water-5', name: 'НАГУТСКАЯ 26', img: './img/news/zaglushka.png', alt: '', title: '', text: 'НАГУТСКАЯ 26'},
    {id: 'water-6', name: 'ПЕРЬЕ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'ПЕРЬЕ'},
    {id: 'water-7', name: 'КОКА - КОЛА', img: './img/news/zaglushka.png', alt: '', title: '', text: 'КОКА - КОЛА'},
    {id: 'water-8', name: 'СПРАЙТ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'СПРАЙТ'},
    {id: 'water-9', name: 'ФАНТА', img: './img/news/zaglushka.png', alt: '', title: '', text: 'ФАНТА'},
    {id: 'water-10', name: 'BURN', img: './img/news/zaglushka.png', alt: '', title: '', text: 'BURN'},
    {id: 'juices', name: 'СОКИ "ДОБРЫЙ" В АССОРТИМЕНТЕ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Приготовлен из мороженого "Пломбир", молока и сока'},
    {id: 'fresh-juices-1', name: 'АПЕЛЬСИНОВЫЙ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'АПЕЛЬСИНОВЫЙ | Используются тоько свежие фрукты и овощи'},
    {id: 'fresh-juices-2', name: 'ГРЕЙПФРУТОВЫЙ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'ГРЕЙПФРУТОВЫЙ | Используются тоько свежие фрукты и овощи'},
    {id: 'fresh-juices-3', name: 'ЯБЛОЧНЫЙ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'ЯБЛОЧНЫЙ | Используются тоько свежие фрукты и овощи'},
    {id: 'fresh-juices-4', name: 'МОРКОВНЫЙ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'МОРКОВНЫЙ | Используются тоько свежие фрукты и овощи'},
    {id: 'fruit-drink', name: 'МОРС ИЗ ЧЕРНОЙ СМОРОДИНЫ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Морс из черной смородины'},
    {id: 'non-alcoholic-cocktails-1', name: 'ДВОРЕЦ ШИРЛИ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Сок вишневый, лимон, энергетик, лед'},
    {id: 'non-alcoholic-cocktails-2', name: 'КАБРИОЛЕТ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Сироп блю-кюрасао, сок грейпфрутовый, лимон, тоник, лед'},
    {id: 'non-alcoholic-cocktails-3', name: 'МЯТНЫЙ АНАНАСОВЫЙ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Ананасовый сок, тоник, мятный сироп, лед'},
    {id: 'non-alcoholic-cocktails-4', name: 'МОХИТО', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Мята, спрайт, лайм, мед'},
    {id: 'non-alcoholic-cocktails-5', name: 'РОЗОВАЯ ДЮНА', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Ананасовый сок, гренадин, взбитвые сливки'},
    {id: 'non-alcoholic-cocktails-6', name: 'СЛАДКАЯ РАДУГА', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Апельсиновый сок, анмон, блю - кюрасао, гренадии, лед'},
    {id: 'non-alcoholic-cocktails-7', name: 'МОТОР АВТОМОБИЛЯ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Ананасовый сок, лимон, гренадии, энергетик, лед'},
    {id: 'non-alcoholic-cocktails-8', name: 'ЗВОН КОЛОКОЛА', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Сок яблочный, апельсиновый, грейпфрутовый, лимон, энергетик, лед'},
    {id: 'non-alcoholic-cocktails-9', name: 'КИСКИНЫ ЛАПКИ', img: './img/news/zaglushka.png', alt: '', title: '', text: 'Ананасовый, апельсиновый соки, гренадии, лимон, лед'} 
];

const cardModalEvent = ob.modal({
    title: 'Блюдо',
     // заголовок
    closable: true, // крестик
    width: '400px',
    footerButtons: [ //создаются кнопки и текст для них.
        // {text: 'Ok', type: 'event-modal-footer__button', handler() {
        //     cardModalEvent.close();
        //     console.log('закрыть');
        // }},
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
        console.log('прошло!');
        const cardsEventsHtml = cardsEvents.find( f => f.id === id );
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
}
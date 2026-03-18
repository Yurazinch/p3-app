<?php

use Livewire\Component;
use Livewire\Attributes\Title;

new #[Title('Сервис, который делает учебу проще')] class extends Component
{
    //
};
?>

<div class="main">
    <img class="form-back" src="{{ asset('storage/img/Form-back.webp') }}" alt="">    
    <section class="title-info">
        <div class="title-container">            
            <h2 class="title-container__title">Решаем любые</h2>
            <h1 class="title-container__subtitle">учебные задачи</h1>
            <div class="subtitle-container">
                <div class="subtitle-container__light">
                    <p class="subtitle-part">от лёгких</p>
                </div>
                <div  class="subtitle-container__hard">
                    <p class="subtitle-part">до сложных</p>
                </div>
            </div>            
        </div>
        <div class="user-info">
            <div class="user-images">
                <img class="ellipse-100_1" src="{{ asset('storage/img/Ellipse100-1.webp') }}" alt="">
                <img class="ellipse-140" src="{{ asset('storage/img/Ellipse140.webp') }}" alt="">
                <img class="ellipse-100_2" src="{{ asset('storage/img/Ellipse100-2.webp') }}" alt="">
            </div>
            <div class="user-stats">
                <p class="user-stats__number">34200+</p>
                <p class="user-stats__description">Уже сделали свой выбор</p>
            </div>
        </div>
    </section>
    <section class="form-price">
        <img class="form-price__arrow" src="{{ asset('storage/img/Form-arrow.webp') }}" alt="">
        <div class="form-title">
            <h2 class="form-title__text">Заполните форму и узнайте цену</h2>
        </div>
        <form class="lending-form" action="#" method="post">
            <div class="lending-form__container">
                <label class="lending-form__label" for="originality">Оригинальность АП ВУЗ</label>
                <select class="lending-form__field" name="originality">
                    <option class="lending-form__field-option">Выбрать из списка</option>
                </select>
            </div>
            <div class="lending-form__container">
                <label class="lending-form__label" for="exercise-type">Тип работы</label>
                <select class="lending-form__field" name="exercise-type">
                    <option class="lending-form__field-option">Выбрать из списка</option>
                </select>
            </div>
            <!--<select class="lending-form__field" name="academic-subject">
                <option class="lending-form__field-option" value="Предмет">Выберите предмет</option>
            </select>   
            <select class="lending-form__field" name="volume">
                <option class="lending-form__field-option" value="Предмет">Выберите объем</option>
            </select>-->
            <div class="lending-form__container">
                <label class="lending-form__label" for="deadline">Срок выполнения</label>
                <select class="lending-form__field" name="deadline">
                    <option class="lending-form__field-option">Выбрать из списка</option>
                </select> 
            </div>
            <div class="lending-form__container">
                <label class="lending-form__label" for="lead">Контакты</label>
                <div class="lending-form__lead" name="lead">
                    <input class="lending-form__lead-field" type="text" placeholder="Ваше имя" name="name">
                    <input class="lending-form__lead-field" type="tel" placeholder="Телефон для связи" name="phone">
                </div>
            </div>
            <div class="consent-container">
                <input class="consent-checkbox" type="checkbox" name="agreement" checked="checked">
                <label class="consent-text" for="agreement">Даю согласие на обработку персональных данных. С
                    <a class="consent-text__link" href="#">Политикой конфиденциальности</a> и с условиями <a class="consent-text__link" href="#">Пользовательского соглашения</a> ознакомлен
                </label>
            </div>
            <input class="cta-button" type="submit" value="Узнать стоимость">
        </form>        
    </section>
    <section class="why-us">
        <div class="quality-container">
            <div class="quality-content">
                <h2 class="quality-content__title">Качество и надёжность без компромиссов</h2>
                <p class="quality-content__text">Мы соблюдаем все требования, подбираем профильных авторов и выполняем работу строго в срок. Вам остаётся только получить готовый результат — без рисков и переживаний. Даже в сжатые сроки вы получаете корректную, аккуратно оформленную работу. Наши авторы умеют работать быстро и без потери качества.</p>
            </div>
            <div class="stats-container">
                <div class="stats-container__item top-left">
                    <h3 class="stats-container__item-percentage">97%</h3>
                    <p class="stats-container__item-description">Заказов сдаём строго в срок</p>
                </div>
                <div class="stats-container__item top-right">
                    <h3 class="stats-container__item-percentage">99%</h3>
                    <p class="stats-container__item-description">Клиентов отмечают высокую уникальность</p>
                </div>
                <div class="stats-container__item bottom-left">
                    <h3 class="stats-container__item-percentage">300+</h3>
                    <p class="stats-container__item-description">Проверенных авторов в нашей базе</p>
                </div>
                <div class="stats-container__item bottom-right">
                    <h3 class="stats-container__item-percentage">97%</h3>
                    <p class="stats-container__item-description">Заказов сдаём строго в срок</p>
                </div>
            </div>
        </div>
        <div class="services-container">
            <img  class="services-container__img" src="{{ asset('storage/img/Services-Container.webp') }}" alt="">
        </div>        
    </section>
    <section class="steps">
        <div class="steps__title">
            <h2 class="steps__title-text">Готовая работа в четыре простых шага</h2>
            <div class="steps__title-images">
                <img class="steps__title-images-curve" src="{{ asset('storage/img/Steps-curve.webp') }}" alt="">
                <img class="steps__title-images-flyer" src="{{ asset('storage/img/Flyer.webp') }}" alt="">
            </div>
        </div>
        <div class="step-containers">
            <div class="step-container__step1">
                <div class="step-container__step1-content">
                    <div class="step-container__step1-number top-left">
                        <h2 class="step-container__number">1</h2>
                    </div>
                    <div class="step-container__step1-text bottom-left">
                        <h3 class="step-container__step-title">Оставляете заявку</h3>
                        <p class="step-container__step-description">После регистрации заполните короткую форму — мы сразу понимаем объём, дедлайн и требования</p>
                    </div>
                </div>
                <div class="step-container__step1-register">
                    <img class="step-container__step1-img" src="{{ asset('storage/img/image_step1.webp') }}" alt="">
                    <button class="regbtn cta-button step-container__step1-button bottom-right">Регистрируйся!</button>
                </div>
            </div>
            <div class="step-container__step2">
                <div class="step-container__step2-content">
                    <div class="step-container__step-number top-right">
                        <h2 class="step-container__number">2</h2>
                    </div>
                    <div class="step-container__step1-text bottom-left">
                        <h3 class="step-container__step2-title">Для вас подбирается лучший автор</h3>
                        <p class="step-container__step2-description">Только проверенные специалисты с опытом от 3 лет. Мы гарантируем точность, глубину анализа и корректное оформление</p>
                    </div>
                </div>
                <img class="step-container__step2-img" src="{{ asset('storage/img/image_step2.webp') }}" alt="">
            </div>            
            <div class="step-container__step3">
                <div class="step-container__step3-content">
                    <div class="step-container3__step-number top-right">
                        <h2 class="step-container__number">3</h2>
                    </div> 
                    <div class="step-container__step1-text bottom-left">               
                        <h3 class="step-container__step-title">Согласовываем цену и сроки</h3>
                        <p class="step-container__step3-description">Вы получаете прозрачную смету без скрытых доплат. После оплаты автор сразу приступает к работе</p>
                    </div>
                </div>
            </div>
            <div class="step-container__step4">
                <div class="step-container__step4-content">
                    <img class="step-container__step4-img" src="{{ asset('storage/img/step4-curve.webp') }}" alt="">
                    <div class="step-container4__step-number top-right">
                        <h2 class="step-container__number">4</h2>
                    </div>
                    <div class="step-container__step1-text bottom-left"> 
                        <h3 class="step-container__step-title">Получаете части работы и вносите правки</h3>
                        <p class="step-container__step4-description">Мы отправляем работу по этапам — вы контролируете процесс, задаёте вопросы и просите корректировки</p>
                    </div>
                </div>
            </div>
            <div class="step-container__step5">
                <div class="step-container__step5-content"> 
                    <img class="step-container__step5-img" src="{{ asset('storage/img/image_step5.webp') }}" alt="">
                    <div class="step-container__step1-text bottom-left">                       
                        <h3 class="step-container__step5-title">Забираете готовый результат</h3>
                        <p class="step-container__step5-description">Оформленная, проверенная на оригинальность, полностью готовая к сдаче работа — строго в срок и с гарантией</p>
                    </div>
                </div>
            </div>            
        </div>
    </section>
    <section class="rewiews-container">
        <div class="rewiews-container__header">
            <div class="rewiews-container__header-title">
                <h2 class="rewiews-container__header-text">Отзывы от тех, кто заказывал наши услуги</h2>
            </div>
            <div class="rewiews-container__header-grade">
                <div class="rewiews-container__grade-box">
                    <img class="rewiews-container__grade-img" src="{{ asset('storage/img/grade-2.webp') }}" alt="">
                </div>
                <div class="rewiews-container__grade-box">
                    <img class="rewiews-container__grade-img" src="{{ asset('storage/img/grade-yandex.webp') }}" alt="">
                </div>
            </div>
        </div>
        <div class="rewiews-container__content">
            <div class="rewiews-container__content-rewiew">                
                <img class="rewiew-avatar" src="{{ asset('storage/img/Rewiew-avatar.webp') }}" alt="">                
                <div class="rewiews-container__content-header">
                    <h3 class="rewiews-container__content-name">Алина Кулешова</h3>
                    <p class="rewiews-container__content-date">10 августа 2025</p>
                </div>
                <div class="rewiews-container__content-description">
                    <p class="rewiews-container__content-text">Заказывала работу по статистике. Задачи были выполнены не только в невероятно сжатые сроки, но и с безупречным качеством. Виден настоящий профессионализм и внимательное</p>
                </div>
                <img class="rewiew-coma" src="{{ asset('storage/img/coma-odd.png') }}" alt="">
            </div>
            <div class="rewiews-container__content-rewiew">
                <img class="rewiew-avatar" src="{{ asset('storage/img/Rewiew-avatar.webp') }}" alt="">
                <div class="rewiews-container__content-header">
                    <h3 class="rewiews-container__content-name">Алина Кулешова</h3>
                    <p class="rewiews-container__content-date">10 августа 2025</p>
                </div>
                <div class="rewiews-container__content-description">
                    <p class="rewiews-container__content-text">Заказывала работу по статистике. Задачи были выполнены не только в невероятно сжатые сроки, но и с безупречным качеством. Виден настоящий профессионализм и внимательное</p>
                </div>
                <img class="rewiew-coma" src="{{ asset('storage/img/coma-even.png') }}" alt="">                
            </div>
            <div class="rewiews-container__content-rewiew">
                <img class="rewiew-avatar" src="{{ asset('storage/img/Rewiew-avatar.webp') }}" alt="">
                <div class="rewiews-container__content-header">
                    <h3 class="rewiews-container__content-name">Алина Кулешова</h3>
                    <p class="rewiews-container__content-date">10 августа 2025</p>
                </div>
                <div class="rewiews-container__content-description">
                    <p class="rewiews-container__content-text">Заказывала работу по статистике. Задачи были выполнены не только в невероятно сжатые сроки, но и с безупречным качеством. Виден настоящий профессионализм и внимательное</p>
                </div>
                <img class="rewiew-coma" src="{{ asset('storage/img/coma-odd.png') }}" alt="">
            </div>
        </div>
    </section>
    <section class="faq-container">
        <img class="faq-container__image-page" src="{{ asset('storage/img/Faq-page.webp') }}" alt="">
        <img class="faq-container__image-letter" src="{{ asset('storage/img/Faq-letter.webp') }}" alt="">
        <div class="faq-container__title">
            <h2 class="faq-container__title-text">Частые вопросы</h2>
        </div>
        <div class="faq-container__lists">            
            <div class="faq-container__list">
                <div class="faq-container__arrow arrow-down">
                    <img class="faq-container__arrow-down show" src="{{ asset('storage/img/Arrow-down.png') }}" alt="">
                    <img class="faq-container__arrow-top" src="{{ asset('storage/img/Arrow-top.png') }}" alt="">
                </div>
                <h3 class="faq-container__list-question">Как можно получить готовую работу срочно?</h3>
                <p class="faq-container__list-ansver">Ответ на вопрос</p>
            </div>
            <div class="faq-container__list">
                <div class="faq-container__arrow arrow-down">
                    <img class="faq-container__arrow-down show" src="{{ asset('storage/img/Arrow-down.png') }}" alt="">
                    <img class="faq-container__arrow-top" src="{{ asset('storage/img/Arrow-top.png') }}" alt="">
                </div>
                <h3 class="faq-container__list-question">Какова стоимость заказа?</h3>
                <p class="faq-container__list-ansver">Ответ на вопрос</p>
            </div>
            <div class="faq-container__list">
                <div class="faq-container__arrow arrow-down">
                    <img class="faq-container__arrow-down show" src="{{ asset('storage/img/Arrow-down.png') }}" alt="">
                    <img class="faq-container__arrow-top" src="{{ asset('storage/img/Arrow-top.png') }}" alt="">
                </div>
                <h3 class="faq-container__list-question">Как заплатить автору?</h3>
                <p class="faq-container__list-ansver">Ответ на вопрос</p>
            </div>
            <div class="faq-container__list">
                <div class="faq-container__arrow arrow-down">
                    <img class="faq-container__arrow-down show" src="{{ asset('storage/img/Arrow-down.png') }}" alt="">
                    <img class="faq-container__arrow-top" src="{{ asset('storage/img/Arrow-top.png') }}" alt="">
                </div>
                <h3 class="faq-container__list-question">Какие вы даёте гарантии?</h3>
                <p class="faq-container__list-ansver">Ответ на вопрос</p>
            </div>
            <div class="faq-container__list">
                <div class="faq-container__arrow arrow-down">
                    <img class="faq-container__arrow-down show" src="{{ asset('storage/img/Arrow-down.png') }}" alt="">
                    <img class="faq-container__arrow-top" src="{{ asset('storage/img/Arrow-top.png') }}" alt="">
                </div>
                <h3 class="faq-container__list-question">Как вы работаете?</h3>
                <p class="faq-container__list-ansver">Сервис работает круглосуточно и без выходных.</p>
            </div>
        </div> 
        @script
            <script>            
                const lists = document.querySelectorAll('.faq-container__list');    
                lists.forEach((list, index) => {
                    list.addEventListener('click', () => {
                        let i = Array.from(lists).findIndex(el => el.children[0].classList.contains('arrow-top'));
                        if(i > -1)  {                  
                            lists[i].children[0].children[0].classList.add('show');
                            lists[i].children[0].children[1].classList.remove('show');
                            lists[i].children[0].classList.replace('arrow-top', 'arrow-down');
                            lists[i].children[2].classList.remove('show'); 
                        }                  
                        lists[index].children[0].children[0].classList.remove('show');
                        lists[index].children[0].children[1].classList.add('show');
                        lists[index].children[0].classList.replace('arrow-down', 'arrow-top');
                        lists[index].children[2].classList.add('show');
                    });
                });       
            </script>
        @endscript       
    </section>
    <section class="faq-container__features">
        <div class="faq-container__button">
            <button id="backbtn" class="cta-button faq-container__button-content">Остались сомнения заполните форму и мы свяжемся с вами</button>
        </div>        
        <img class="faq-container__features-top" src="{{ asset('storage/img/Features-top.webp') }}" alt="">
        <img class="faq-container__features-down" src="{{ asset('storage/img/Features-down.webp') }}" alt="">
    </section>
    <dialog id="logModal">
        <div id="dialog-login" class="form-container">
            <div class="form-container__header">
                <div class="form-container__header-title">
                    <h2 class="form-container__header-text">Вход</h2>
                </div>
                <div class="form-container__header-close">
                    <button id="closeLog" class="close-cross"><img class="form-container__header-cross" src="{{ asset('storage/img/close-cross.png') }}" alt=""></button>
                </div>
            </div>
            <form id="login" class="form-modal" action="">
                <input class="form-modal__input" type="email" placeholder="Введите логин">
                <input class="form-modal__input" type="password"  placeholder="Введите пароль">
                <div class="form-modal__buttons">
                    <button class="cta-button form-modal__submit" type="submit">Войти</button>
                    <button id="confirmbtn" class="form-modal__forget" type="button"><span class="form-modal__forget-text">Забыли логин или пароль?</span></button>
                </div>
            </form>
        </div>
    </dialog>
    <dialog id="backModal">
        <div id="dialog-callback" class="form-container">
            <div class="form-container__header">
                <div class="form-container__header-title">
                    <h2 class="form-container__header-text">Перезвоните мне</h2>
                </div>
                <div class="form-container__header-close">
                    <button id="closeBack" class="close-cross"><img class="form-container__header-cross" src="{{ asset('storage/img/close-cross.png') }}" alt=""></button>
                </div>
            </div>
            <form id="callback" class="form-modal" action="">
                <input class="form-modal__input" type="text" placeholder="Введите имя">
                <input class="form-modal__input" type="tel" placeholder="Введите номер телефона">
                <div class="form-modal__buttons">
                    <button class="cta-button form-modal__submit" type="submit">Отправить</button>
                </div>
            </form>
        </div>
    </dialog>
    <dialog id="confirModal">
        <div id="dialog-confirm" class="form-container confirm">
            <div class="form-container__header">
                <div class="form-container__header-title">
                    <h2 class="form-container__header-text">Отправьте ваш email</h2>
                </div>
                <div class="form-container__header-close">
                    <button id="closeConfirm" class="close-cross"><img class="form-container__header-cross" src="{{ asset('storage/img/close-cross.png') }}" alt="">
                </div>
            </div>
            <form id="confirm" class="form-modal" action="">
                <input class="form-modal__input" type="email" placeholder="Введите имя">
                <div class="form-modal__buttons">
                    <button class="cta-button form-modal__submit" type="submit">Отправить</button>
                </div>
            </form>
        </div>
    </dialog>
    <dialog id="regModal">
        <div class="form-container registration">
            <div class="form-container__header">
                <div class="form-container__header-title">
                    <h2 class="form-container__header-text">Регистрация</h2>
                </div>
                <div class="form-container__header-close">
                    <button id="closeReg" class="close-cross"><img class="form-container__header-cross" src="{{ asset('storage/img/close-cross.png') }}" alt=""></button>
                </div>
            </div>
            <form class="form-modal registrstion-form" action="#" method="dialog">
                <input class="form-modal__input" type="text" placeholder="Укажите имя">
                <input class="form-modal__input" type="text" placeholder="Укажите фамилию">
                <input class="form-modal__input" type="text" placeholder="Придумайте логин">
                <input class="form-modal__input" type="password" placeholder="Укажите пароль">
                <div class="modal-agreement">
                    <input class="agreement-checkbox" type="checkbox" name="modal-agreement" checked="checked">
                    <label class="agreement-checkbox__text" for="modal-agreement">Даю согласие на обработку персональных данных. С
                    <a class="consent-text__link" href="#">Политикой конфиденциальности</a> и с условиями <a class="consent-text__link" href="#">Пользовательского соглашения</a> ознакомлен
                </label>
                </div>
                <div class="form-modal__buttons">
                    <button class="cta-button form-modal__submit" type="submit">Отправить</button>
                </div>
            </form>
        </div>
    </dialog> 
    @script
        <script>
            const regButtons = document.querySelectorAll('.regbtn');
            const logButton = document.getElementById('logbtn');
            const backButton = document.getElementById('backbtn');
            const confirmButton = document.getElementById('confirmbtn');
            const logModal = document.getElementById('logModal');
            const regModal = document.getElementById('regModal');
            const backModal = document.getElementById('backModal');
            const confirModal = document.getElementById('confirModal');
            const closeLog = document.getElementById('closeLog');
            const closeReg = document.getElementById('closeReg');
            const closeBack = document.getElementById('closeBack');
            const closeConfirm = document.getElementById('closeConfirm');
            regButtons.forEach(regButton => {
                regButton.addEventListener('click', () => {
                    regModal.showModal();
                });
            });
            logButton.addEventListener('click', () => {
                logModal.showModal();
            });
            backButton.addEventListener('click', () => {
                backModal.showModal();
            });
            confirmButton.addEventListener('click', () => {
                confirModal.showModal();
                logModal.close();
            });
            closeReg.addEventListener('click', () => {
                regModal.close();
            });            
            closeLog.addEventListener('click', () => {
                logModal.close();
            });
            closeBack.addEventListener('click', () => {
                backModal.close();
            });
            closeConfirm.addEventListener('click', () => {
                confirModal.close();
            });
            const dialogs = document.querySelectorAll('dialog');
            dialogs.forEach(dialog => {
                dialog.addEventListener('click', (e) => {
                    const dialogDimensions = dialog.getBoundingClientRect();
                    if (
                        e.clientX < dialogDimensions.left ||
                        e.clientX > dialogDimensions.right ||
                        e.clientY < dialogDimensions.top ||
                        e.clientY > dialogDimensions.bottom
                    ) {
                        dialog.close();
                    }
                })
            })    
        </script>        
    @endscript
</div>
<?php

use Livewire\Component;
use Livewire\Attributes\Title;

new #[Title('Личный кабинет пользователя')] class extends Component
{
    //
};
?>

<div class="cabinet">
    <div class="cabinet__header">
        <h1 class="cabinet__header-title">Личный кабинет</h1>
    </div>
    <div class="dashboard">
        <div class="dashboard__sidebar">
            <nav class="dashboard__sidebar-menu">
                <ul class="dashboard__sidebar-lists">                    
                    <li class="dashboard__sidebar-list"><span class="dashboard__sidebar-text active">Заявки</span></li>
                    <li class="dashboard__sidebar-list"><span class="dashboard__sidebar-text">Оплаты</span></li>
                    <li class="dashboard__sidebar-list"><span class="dashboard__sidebar-text">Профиль</span></li>
                </ul>
            </nav>
            <div class="dashboard__sidebar-service">
                <button class="cta-button sidebar-service">Написать в поддержку</button>
            </div>
        </div>        
        <div class="dashboard__wrapper user-orders show">
            <section class="user-orders">
                <div class="user__header">
                    <div class="user__header-title">
                        <h1 class="user__header-text">Мои заявки</h1>
                    </div>
                    <div class="user-orders__header-button">
                        <button class="cta-button">Создать заявку</button>
                    </div>
                    <nav class="user-orders__header-menu">
                        <ul class="user-orders__header-lists">
                            <li class="user-orders__header-list">Новые</li>
                            <li class="user-orders__header-list">На модерации</li>
                            <li class="user-orders__header-list">В работе</li>
                            <li class="user-orders__header-list">Выполненные</li>
                        </ul>
                    </nav>                    
                </div>
                <div class="user-orders__cards">
                    <div class="user-orders__card">
                        <div class="user-orders__card-info">
                            <div class="user-orders__card-number">
                                <h2 class="user-orders__card-id">Заявка № 2345789</h2>
                            </div>
                            <div class="user-orders__card-status in-work">
                                <h3 class="user-orders__card-execution">Взята в работу</h3>
                            </div>
                            <div class="user-orders__card-description">
                                <p class="user-orders__card-text">Предмет: Физика</p>
                                <p class="user-orders__card-text">Тема: Теория относительности</p>
                                <p class="user-orders__card-text">Срок выполнения: до 15.07.2026 г.</p>
                            </div>
                        </div>
                        <div class="user-orders__card-price">
                            <h2 class="user-orders__card-pay">4500 ₽</h2>
                        </div>
                        <div class="user-orders__card-file">
                            <p class="user-orders__card-text">Переносим строку «Преимущества, чтобы разместить текст «Центр содействия должникам» (шрифт как «Заказать обратный звонок»)</p>
                            <p class="user-orders__card-text">Файлы: Не прикреплены</p>
                        </div>
                        <button class="user-orders__card-button">Подробнее</button>
                    </div>
                    <div class="user-orders__card">
                        <div class="user-orders__card-info">
                            <div class="user-orders__card-number">
                                <h2 class="user-orders__card-id">Заявка № 2345789</h2>
                            </div>
                            <div class="user-orders__card-status new">
                                <h3 class="user-orders__card-execution">Новая</h3>
                            </div>
                            <div class="user-orders__card-description">
                                <p class="user-orders__card-text">Предмет: Физика</p>
                                <p class="user-orders__card-text">Тема: Теория относительности</p>
                                <p class="user-orders__card-text">Срок выполнения: до 15.07.2026 г.</p>
                            </div>
                        </div>
                        <div class="user-orders__card-price">
                            <h2 class="user-orders__card-pay">- ₽</h2>
                        </div>
                        <div class="user-orders__card-file">
                            <p class="user-orders__card-text">Переносим строку «Преимущества, чтобы разместить текст «Центр содействия должникам» (шрифт как «Заказать обратный звонок»)</p>
                            <p class="user-orders__card-text">Файлы: Не прикреплены</p>
                        </div>
                        <button class="user-orders__card-button">Подробнее</button>
                    </div>
                    <div class="user-orders__card">
                        <div class="user-orders__card-info">
                            <div class="user-orders__card-number">
                                <h2 class="user-orders__card-id">Заявка № 2345789</h2>
                            </div>
                            <div class="user-orders__card-status moderation">
                                <h3 class="user-orders__card-execution">На модерации</h3>
                            </div>
                            <div class="user-orders__card-description">
                                <p class="user-orders__card-text">Предмет: Физика</p>
                                <p class="user-orders__card-text">Тема: Теория относительности</p>
                                <p class="user-orders__card-text">Срок выполнения: до 15.07.2026 г.</p>
                            </div>
                        </div>
                        <div class="user-orders__card-price">
                            <h2 class="user-orders__card-pay">4500 ₽</h2>
                        </div>
                        <div class="user-orders__card-file">
                            <p class="user-orders__card-text">Переносим строку «Преимущества, чтобы разместить текст «Центр содействия должникам» (шрифт как «Заказать обратный звонок»)</p>
                            <p class="user-orders__card-text">Файлы: Не прикреплены</p>
                        </div>
                        <button class="user-orders__card-button">Подробнее</button>
                    </div>
                    <div class="user-orders__card">
                        <div class="user-orders__card-info">
                            <div class="user-orders__card-number">
                                <h2 class="user-orders__card-id">Заявка № 2345789</h2>
                            </div>
                            <div class="user-orders__card-status done">
                                <h3 class="user-orders__card-execution">Выполнена</h3>
                            </div>
                            <div class="user-orders__card-description">
                                <p class="user-orders__card-text">Предмет: Физика</p>
                                <p class="user-orders__card-text">Тема: Теория относительности</p>
                                <p class="user-orders__card-text">Срок выполнения: до 15.07.2026 г.</p>
                            </div>
                        </div>
                        <div class="user-orders__card-price">
                            <h2 class="user-orders__card-pay">4500 ₽</h2>
                        </div>
                        <div class="user-orders__card-file">
                            <p class="user-orders__card-text">Переносим строку «Преимущества, чтобы разместить текст «Центр содействия должникам» (шрифт как «Заказать обратный звонок»)</p>
                            <p class="user-orders__card-text">Файлы: Не прикреплены</p>
                        </div>
                        <button class="user-orders__card-button">Подробнее</button>
                    </div>
                </div>
            </section>
        </div>        
        <div class="dashboard__wrapper">
            <section class="user-paying">
                <div class="user__header paying">
                    <div class="user__header-title">
                        <h1 class="user__header-text">Мои оплаты</h1>
                    </div>
                    <div class="user-paying__header-balance">
                        <p class="user-paying__header-text">К оплате:</p>
                        <h2 class="user-paying__header-remainder">4500 ₽</h2>
                        <div class="user__button-wrapper">
                            <button class="user-paying__header-button">Оплатить</button>
                        </div>
                    </div>
                </div>
                <table class="user-paying__table">
                    <thead>
                        <tr>
                            <th>№</th><th>id заказа</th><th>сумма, ₽</th><th>состояние</th><th>статус</th>
                        </tr>                        
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td><td>456778</td><td>4500</td><td>к оплате</td><td>новый</td>
                        </tr>
                        <tr>
                            <td>2</td><td>1176763</td><td>4000</td><td>оплачен</td><td>на модерации</td>
                        </tr>
                        <tr>
                            <td>3</td><td>413239</td><td>5000</td><td>оплачен</td><td>выполнен</td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </div>
        <div class="dashboard__wrapper">          
            <section class="user-profile">
                <div class="user__header">
                    <div class="user__header-title">
                        <h1 class="user__header-text">Личные данные</h1>
                    </div>
                    <div class="user-profile__header-avatar">
                        <img class="user-profile__header-image" src="{{ asset('storage/img/Ellipse100-1.webp') }}" alt="">
                    </div>
                </div>
                <div class="user-profile__data">
                    <div class="user-profile__data-component">
                        <label class="user-profile__data-label" for="name">Имя</label>
                        <input class="user-profile__data-input" type="text" name="name" value="Аделаида" readonly>
                    </div>
                    <div class="user-profile__data-component">
                        <label class="user-profile__data-label" for="last-name">Фамилия</label>
                        <input class="user-profile__data-input" type="text" name="last-name" value="Иванова" readonly>
                    </div>
                    <div class="user-profile__data-component">
                        <label class="user-profile__data-label" for="surname">Отчество</label>
                        <input class="user-profile__data-input" type="text" name="surname" value="Ивановна" readonly>
                    </div>
                    <div class="user-profile__data-component">
                        <label class="user-profile__data-label" for="pseudonym">Псевдоним</label>
                        <input class="user-profile__data-input" type="text" name="pseudonym" value="Баба Яга" readonly>
                    </div>
                    <div class="user-profile__data-component">
                        <label class="user-profile__data-label" for="phone">Телефон</label>
                        <input class="user-profile__data-input" type="tel" name="phone" value="+7 (999) 888-77-66" readonly>
                    </div>
                    <div class="user-profile__data-component">
                        <label class="user-profile__data-label" for="email">Электронная почта</label>
                        <input class="user-profile__data-input" type="email" name="email" value="email@demo.dw" readonly>
                    </div>
                </div>
            </section>        
        </div>
        <div class="dashboard__wrapper">
            <section class="user-ordering">
                <div class="user__header paying">
                    <div class="user__header-title">
                        <h1 class="user__header-text">Разместить заказ</h1>
                    </div>
                    <div class="user-paying__header-balance">
                        <p class="user-paying__header-text">К оплате:</p>
                        <h2 class="user-paying__header-remainder">4500 ₽</h2>
                        <div class="user__button-wrapper">
                            <button class="user-paying__header-button">Оплатить</button>
                        </div>
                    </div>
                </div>
                <form class="ordering-form" action="#" method="post">
                    <div class="user-profile__data-component">
                        <label class="ordering-form__data-label" for="originality">Оригинальность АП ВУЗ</label>
                        <select class="user-profile__data-input" name="originality">
                            <option class="ordering-form__field-option">Выбрать из списка</option>
                        </select>
                    </div>
                    <div class="user-profile__data-component">
                        <label class="ordering-form__data-label" for="exercise-type">Тип работы</label>
                        <select class="user-profile__data-input" name="exercise-type">
                            <option class="ordering-form__field-option">Выбрать из списка</option>
                        </select>
                    </div>
                    <div class="user-profile__data-component">
                        <label class="ordering-form__data-label" for="exercise-type">Предмет</label>
                        <select class="user-profile__data-input" name="academic-subject">
                            <option class="ordering-form__field-option" value="Предмет">Выберите предмет</option>
                        </select>   
                    </div>
                    <div class="user-profile__data-component">
                        <div class="user-profile__data-subcomponent">
                            <div class="user-profile__data-item">
                                <label class="ordering-form__data-label" for="volume">Объем</label>                    
                                <input class="user-profile__item-input" type="text" value="" placeholder="Объем работы, количество страниц" name="volume" readonly>
                            </div>
                            <div class="user-profile__data-item">
                                <label class="ordering-form__data-label" for="deadline">Срок выполнения</label>
                                <input class="user-profile__item-input" type="date" placeholder="Выберите крайнюю дату готовности" name="deadline">
                            </div>
                        </div>
                    </div>
                    <div class="user-profile__data-component order-description">
                        <label class="ordering-form__data-label" for="description">Описание задания</label>
                        <textarea class="user-profile__data-input" name="description" placeholder="Кратко и четко сформулируйте задание"></textarea>
                    </div>
                    <div class="user-profile__data-component">
                        <div class="user-profile__data-subcomponent">
                            <div class="user-profile__data-item file-item">                        
                                <label class="ordering-form__file-style cta-button" for="form__file">Файлы</label>
                                <p class="ordering-form__file-changed">Выбраны файлы: <span id="file-name">файл не выбран</span></p>
                                <input class="ordering-form__file-item" id="form__file" type="file" multiple="multiple" accept=".doc, .pdf, .jpg, .jpeg, .png">
                            </div>
                            <div class="user-profile__data-item item-buttons">
                                <input class="ordering-form__file-style cta-button" type="submit" value="Заказать">
                            </div>
                        </div>
                    </div>
                </form> 
                @script
                    <script>
                        const fileInput = document.getElementById('form__file');
                        const fileNameSpan = document.getElementById('file-name');
                        fileInput.addEventListener('change', function() {
                            if (this.files && this.files.length > 0) {
                            fileNameSpan.textContent = this.files[0].name;
                            } else {
                            fileNameSpan.textContent = 'Файл не выбран';
                            }
                        });
                    </script>
                @endscript
            </section>
        </div>
    </div>
    @script
        <script>
            const points = document.querySelectorAll('.dashboard__sidebar-text');
            const boards = document.querySelectorAll('.dashboard__wrapper');
            points.forEach((point, index) => {
                point.addEventListener('click', () => {
                    let i = Array.from(points).findIndex(el => el.classList.contains('active'));                    
                    points[i].classList.remove('active');
                    boards[i].classList.remove('show');
                    points[index].classList.add('active');
                    boards[index].classList.add('show');
                })
            })
        </script>
    @endscript
</div>
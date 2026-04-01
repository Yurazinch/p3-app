<?php

use Livewire\Component;
use Livewire\Attributes\Title;

new #[Title('Кабинет администратора')] class extends Component
{
    public string $cabinetTitle;

    public function mount()
    {
        $this->cabinetTitle = 'Вы в системе как администратор';
        $this->dispatch('component-changed', cabinetTitle: $this->cabinetTitle);
    }
};
?>

<div class="cabinet admin">    
    <div class="dashboard">
        <div class="dashboard__sidebar">
            <nav class="dashboard__sidebar-menu">
                <ul class="dashboard__sidebar-lists">
                    <li class="dashboard__sidebar-list"><span class="dashboard__sidebar-text active">Настройки</span></li>                
                    <li class="dashboard__sidebar-list"><span class="dashboard__sidebar-text">Дисциплины</span></li> 
                    <li class="dashboard__sidebar-list"><span class="dashboard__sidebar-text">Работы и срочность</span></li>
                    <li class="dashboard__sidebar-list"><span class="dashboard__sidebar-text">Пакеты и цены</span></li>
                    <li class="dashboard__sidebar-list"><span class="dashboard__sidebar-text">Заказы</span></li>
                    <li class="dashboard__sidebar-list"><span class="dashboard__sidebar-text">Заказчики</span></li>
                    <li class="dashboard__sidebar-list"><span class="dashboard__sidebar-text">Авторы</span></li>
                    <li class="dashboard__sidebar-list"><span class="dashboard__sidebar-text">Модераторы</span></li>
                    <li class="dashboard__sidebar-list"><span class="dashboard__sidebar-text">Финансы</span></li>
                </ul>
            </nav>
            <div class="dashboard__sidebar-service">
                <button class="cta-button sidebar-service">Написать в поддержку</button>
            </div>
        </div>
        <section class="dashboard__wrapper show">
            <div class="user__header">
                <div class="user__header-title">
                    <h1 class="user__header-text">Основные настройки</h1>
                </div>
            </div>                
            <livewire:admin.packages />
            <livewire:admin.urgencys />
            <livewire:admin.chapters />
        </section>                
        <section class="dashboard__wrapper">
            <div class="user__header">
                <div class="user__header-title">
                    <h1 class="user__header-text">Дисциплины</h1>
                </div>                 
            </div>
            <livewire:admin.disciplines />            
        </section>
        <section class="dashboard__wrapper">
            <div class="user__header">
                <div class="user__header-title">
                    <h1 class="user__header-text">Работы и срочность</h1>
                </div>
            </div>
            <livewire:admin.works />
            <livewire:admin.corrections />
        </section>        
        <section class="dashboard__wrapper">
            <div class="user__header">
                <div class="user__header-title">
                    <h1 class="user__header-text">Пакеты и цены</h1>
                </div>
            </div>
            <div class="admin-section__segment">
                <div class="admin-section__segment-header">
                    <select class="admin-section__part-select" name="making">
                        <option class="admin-section__part-select-option">Выбрать работу</option>
                    </select>
                    <button class="admin-section__cell-button">Создать</button>
                </div>
                <div class="admin-tables">
                    <div class="admin-tables__head-wrapper tables-overflow">
                        <div class="admin-tables__head cell-id">ID</div>
                        <div class="admin-tables__head cell-10">Пакет</div>
                        <div class="admin-tables__head cell-50">Работа</div>
                        <div class="admin-tables__head cell-10">Страниц</div>
                        <div class="admin-tables__head cell-10">Цена</div>
                        <div class="admin-tables__head cell-10">Изменить</div>
                    </div>
                    <ul class="admin-tables__lists width-520">
                        <li class="admin-tables__list">
                            <div class="admin-tables__list-wrapper">
                                <div class="admin-tables__list-cell cell-id">ID</div>
                                <div class="admin-tables__list-cell cell-10">50% АП ВУЗ</div>
                                <div class="admin-tables__list-cell cell-50">Выпускная квалификационная работа (дипломная работа)</div>
                                <div class="admin-tables__list-cell cell-10">50-80</div>
                                <div class="admin-tables__list-cell cell-10">25000</div>
                                <div class="admin-tables__list-cell cell-5"><button class="cell-button"><img src="{{ asset('storage/img/pen_edit_icon.webp') }}" alt=""></button></div>
                                <div class="admin-tables__list-cell cell-5"><button class="cell-button"><img src="{{ asset('storage/img/basket_trash_icon.webp') }}" alt=""></button></div>
                            </div>                            
                        </li>
                        <li class="admin-tables__list">
                            <div class="admin-tables__list-wrapper">
                                <div class="admin-tables__list-cell cell-id">ID</div>
                                <div class="admin-tables__list-cell cell-10">50% АП ВУЗ</div>
                                <div class="admin-tables__list-cell cell-50">Магистерская диссертация</div>
                                <div class="admin-tables__list-cell cell-10">80-100</div>
                                <div class="admin-tables__list-cell cell-10">30000</div>
                                <div class="admin-tables__list-cell cell-5"><button class="cell-button"><img src="{{ asset('storage/img/pen_edit_icon.webp') }}" alt=""></button></div>
                                <div class="admin-tables__list-cell cell-5"><button class="cell-button"><img src="{{ asset('storage/img/basket_trash_icon.webp') }}" alt=""></button></div>
                            </div>                            
                        </li>
                        <li class="admin-tables__list">
                            <div class="admin-tables__list-wrapper">
                                <div class="admin-tables__list-cell cell-id">ID</div>
                                <div class="admin-tables__list-cell cell-10">50% АП ВУЗ</div>
                                <div class="admin-tables__list-cell cell-50">Научная работа</div>
                                <div class="admin-tables__list-cell cell-10">30-45</div>
                                <div class="admin-tables__list-cell cell-10">7000</div>
                                <div class="admin-tables__list-cell cell-5"><button class="cell-button"><img src="{{ asset('storage/img/pen_edit_icon.webp') }}" alt=""></button></div>
                                <div class="admin-tables__list-cell cell-5"><button class="cell-button"><img src="{{ asset('storage/img/basket_trash_icon.webp') }}" alt=""></button></div>
                            </div>                            
                        </li>
                        <li class="admin-tables__list">
                            <div class="admin-tables__list-wrapper">
                                <div class="admin-tables__list-cell cell-id">ID</div>
                                <div class="admin-tables__list-cell cell-10">50% АП ВУЗ</div>
                                <div class="admin-tables__list-cell cell-50">Курсовая работа</div>
                                <div class="admin-tables__list-cell cell-10">25-35</div>
                                <div class="admin-tables__list-cell cell-10">4000</div>
                                <div class="admin-tables__list-cell cell-5"><button class="cell-button"><img src="{{ asset('storage/img/pen_edit_icon.webp') }}" alt=""></button></div>
                                <div class="admin-tables__list-cell cell-5"><button class="cell-button"><img src="{{ asset('storage/img/basket_trash_icon.webp') }}" alt=""></button></div>
                            </div>                            
                        </li>
                        <li class="admin-tables__list">
                            <div class="admin-tables__list-wrapper">
                                <div class="admin-tables__list-cell cell-id">ID</div>
                                <div class="admin-tables__list-cell cell-10">50% АП ВУЗ</div>
                                <div class="admin-tables__list-cell cell-50">Реферат</div>
                                <div class="admin-tables__list-cell cell-10">20-30</div>
                                <div class="admin-tables__list-cell cell-10">2500</div>
                                <div class="admin-tables__list-cell cell-5"><button class="cell-button"><img src="{{ asset('storage/img/pen_edit_icon.webp') }}" alt=""></button></div>
                                <div class="admin-tables__list-cell cell-5"><button class="cell-button"><img src="{{ asset('storage/img/basket_trash_icon.webp') }}" alt=""></button></div>
                            </div>                            
                        </li>
                        <li class="admin-tables__list">
                            <div class="admin-tables__list-wrapper">
                                <div class="admin-tables__list-cell cell-id">ID</div>
                                <div class="admin-tables__list-cell cell-10">50% АП ВУЗ</div>
                                <div class="admin-tables__list-cell cell-50">Статья РИНЦ</div>
                                <div class="admin-tables__list-cell cell-10">4-6</div>
                                <div class="admin-tables__list-cell cell-10">2000</div>
                                <div class="admin-tables__list-cell cell-5"><button class="cell-button"><img src="{{ asset('storage/img/pen_edit_icon.webp') }}" alt=""></button></div>
                                <div class="admin-tables__list-cell cell-5"><button class="cell-button"><img src="{{ asset('storage/img/basket_trash_icon.webp') }}" alt=""></button></div>
                            </div>                            
                        </li>
                        <li class="admin-tables__list">
                            <div class="admin-tables__list-wrapper">
                                <div class="admin-tables__list-cell cell-id">ID</div>
                                <div class="admin-tables__list-cell cell-10">50% АП ВУЗ</div>
                                <div class="admin-tables__list-cell cell-50">Статья ВАК</div>
                                <div class="admin-tables__list-cell cell-10">4-6</div>
                                <div class="admin-tables__list-cell cell-10">6000</div>
                                <div class="admin-tables__list-cell cell-5"><button class="cell-button"><img src="{{ asset('storage/img/pen_edit_icon.webp') }}" alt=""></button></div>
                                <div class="admin-tables__list-cell cell-5"><button class="cell-button"><img src="{{ asset('storage/img/basket_trash_icon.webp') }}" alt=""></button></div>
                            </div>                            
                        </li>
                        <li class="admin-tables__list">
                            <div class="admin-tables__list-wrapper">
                                <div class="admin-tables__list-cell cell-id">ID</div>
                                <div class="admin-tables__list-cell cell-10">50% АП ВУЗ</div>
                                <div class="admin-tables__list-cell cell-50">Отчет по практике</div>
                                <div class="admin-tables__list-cell cell-10"></div>
                                <div class="admin-tables__list-cell cell-10">2500</div>
                                <div class="admin-tables__list-cell cell-5"><button class="cell-button"><img src="{{ asset('storage/img/pen_edit_icon.webp') }}" alt=""></button></div>
                                <div class="admin-tables__list-cell cell-5"><button class="cell-button"><img src="{{ asset('storage/img/basket_trash_icon.webp') }}" alt=""></button></div>
                            </div>                            
                        </li>
                        <li class="admin-tables__list">
                            <div class="admin-tables__list-wrapper">
                                <div class="admin-tables__list-cell cell-id">ID</div>
                                <div class="admin-tables__list-cell cell-10">65% АП ВУЗ</div>
                                <div class="admin-tables__list-cell cell-50">Выпускная квалификационная работа (дипломная работа)</div>
                                <div class="admin-tables__list-cell cell-10">50-80</div>
                                <div class="admin-tables__list-cell cell-10">30000</div>
                                <div class="admin-tables__list-cell cell-5"><button class="cell-button"><img src="{{ asset('storage/img/pen_edit_icon.webp') }}" alt=""></button></div>
                                <div class="admin-tables__list-cell cell-5"><button class="cell-button"><img src="{{ asset('storage/img/basket_trash_icon.webp') }}" alt=""></button></div>
                            </div>                            
                        </li>
                        <li class="admin-tables__list">
                            <div class="admin-tables__list-wrapper">
                                <div class="admin-tables__list-cell cell-id">ID</div>
                                <div class="admin-tables__list-cell cell-10">65% АП ВУЗ</div>
                                <div class="admin-tables__list-cell cell-50">Магистерская диссертация</div>
                                <div class="admin-tables__list-cell cell-10">80-100</div>
                                <div class="admin-tables__list-cell cell-10">37500</div>
                                <div class="admin-tables__list-cell cell-5"><button class="cell-button"><img src="{{ asset('storage/img/pen_edit_icon.webp') }}" alt=""></button></div>
                                <div class="admin-tables__list-cell cell-5"><button class="cell-button"><img src="{{ asset('storage/img/basket_trash_icon.webp') }}" alt=""></button></div>
                            </div>                            
                        </li>
                        <li class="admin-tables__list">
                            <div class="admin-tables__list-wrapper">
                                <div class="admin-tables__list-cell cell-id">ID</div>
                                <div class="admin-tables__list-cell cell-10">65% АП ВУЗ</div>
                                <div class="admin-tables__list-cell cell-50">Научная работа</div>
                                <div class="admin-tables__list-cell cell-10">30-45</div>
                                <div class="admin-tables__list-cell cell-10">10000</div>
                                <div class="admin-tables__list-cell cell-5"><button class="cell-button"><img src="{{ asset('storage/img/pen_edit_icon.webp') }}" alt=""></button></div>
                                <div class="admin-tables__list-cell cell-5"><button class="cell-button"><img src="{{ asset('storage/img/basket_trash_icon.webp') }}" alt=""></button></div>
                            </div>                            
                        </li>
                        <li class="admin-tables__list">
                            <div class="admin-tables__list-wrapper">
                                <div class="admin-tables__list-cell cell-id">ID</div>
                                <div class="admin-tables__list-cell cell-10">65% АП ВУЗ</div>
                                <div class="admin-tables__list-cell cell-50">Курсовая работа</div>
                                <div class="admin-tables__list-cell cell-10">25-35</div>
                                <div class="admin-tables__list-cell cell-10">6000</div>
                                <div class="admin-tables__list-cell cell-5"><button class="cell-button"><img src="{{ asset('storage/img/pen_edit_icon.webp') }}" alt=""></button></div>
                                <div class="admin-tables__list-cell cell-5"><button class="cell-button"><img src="{{ asset('storage/img/basket_trash_icon.webp') }}" alt=""></button></div>
                            </div>                            
                        </li>
                        <li class="admin-tables__list">
                            <div class="admin-tables__list-wrapper">
                                <div class="admin-tables__list-cell cell-id">ID</div>
                                <div class="admin-tables__list-cell cell-10">65% АП ВУЗ</div>
                                <div class="admin-tables__list-cell cell-50">Реферат</div>
                                <div class="admin-tables__list-cell cell-10">20-30</div>
                                <div class="admin-tables__list-cell cell-10">3500</div>
                                <div class="admin-tables__list-cell cell-5"><button class="cell-button"><img src="{{ asset('storage/img/pen_edit_icon.webp') }}" alt=""></button></div>
                                <div class="admin-tables__list-cell cell-5"><button class="cell-button"><img src="{{ asset('storage/img/basket_trash_icon.webp') }}" alt=""></button></div>
                            </div>                            
                        </li>
                    </ul>
                </div>
            </div>                           
        </section>        
        <div class="dashboard__wrapper">
            <section class="user-ordering">
                <div class="user__header paying">
                    <div class="user__header-title">
                        <h1 class="user__header-text">Заказы</h1>
                    </div>
                    <div class="user-orders__header-button">
                        <button class="cta-button">Добавить дисциплину</button>
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
                <div>

                </div>
            </section>
        </div>
        <div class="dashboard__wrapper">
            <section>
                <div class="user__header paying">
                    <div class="user__header-title">
                        <h1 class="user__header-text">Заказчики</h1>
                    </div>
                    <div class="user-orders__header-button">
                        <button class="cta-button">Добавить дисциплину</button>
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
                <div>

                </div>
            </section>
        </div>
        <div class="dashboard__wrapper">
            <section>
                <div class="user__header paying">
                    <div class="user__header-title">
                        <h1 class="user__header-text">Авторы</h1>
                    </div>
                    <div class="user-orders__header-button">
                        <button class="cta-button">Добавить</button>
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
                <div>

                </div>
            </section>
        </div>
        <div class="dashboard__wrapper">
            <section>
                <div class="user__header paying">
                    <div class="user__header-title">
                        <h1 class="user__header-text">Модераторы</h1>
                    </div>
                    <div class="user-orders__header-button">
                        <button class="cta-button">Добавить</button>
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
                <div>

                </div>
            </section>
        </div>
        <div class="dashboard__wrapper">
            <section>
                <div class="user__header paying">
                    <div class="user__header-title">
                        <h1 class="user__header-text">Финансы</h1>
                    </div>
                    <div class="user-orders__header-button">
                        <button class="cta-button">Добавить</button>
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
                <div>

                </div>
            </section>
        </div>
    </div>
    <dialog id="save-package-dialog">
        <div class="admin-modal__container">        
            <div class="admin-modal__header">
                <div class="admin-modal__header-title">
                    <h3 class="admin-modal__header-text">Создать пакет</h3>
                </div>
                <button id="create-package-close" class="admin-modal__close"><img class="admin-modal__cross" src="{{ asset('storage/img/close-cross.png') }}" alt="Закрыть окно"></button>
            </div>
            <div class="admin-modal__description">
                <p class="admin-modal__description-text">Укажите в поле формы имя пакета</p>
            </div>
            <form id="create-package-form" class="admin-modal__form" wire:submit="save">
                @csrf
                <input class="admin-modal__form-input" type="text" autocomplete="off" value="" wire:model="name">                
                <button class="admin-modal__form-button" type="submit">Сохранить</button>
            </form>
        </div>
    </dialog>
    <dialog id="edit-package-dialog"> 
        <div class="admin-modal__container">       
            <div class="admin-modal__header">
                <h3>Изменить пакет</h3>
                <button id="edit-package-close" class="admin-modal__close"><img class="admin-modal__cross" src="{{ asset('storage/img/close-cross.png') }}" alt="Закрыть окно"></button>
            </div>
            <div class="admin-modal__description">
                <p class="admin-modal__description-text">Укажите в поле формы новое имя пакета</p>
            </div>
            <form id="edit-package-form" class="admin-modal__form" wire:submit="packageUpdate" method="dialog">            
                @csrf
                <input class="admin-modal__form-input" type="text" autocomplete="off" value="" wire:model="name">                
                <button class="admin-modal__form-button" type="submit">Сохранить</button>
            </form>
        </div>
    </dialog>
</div>
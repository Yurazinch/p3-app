<?php

use Livewire\Component;
use Livewire\Attributes\On;

new class extends Component
{
    public string $showLendingComponent;
    public string $showCabinetComponent;
    public $cabinetTitle;

    public function mount()
    {
        $this->showLendingComponent = 'active-component';
        $this->showCabinetComponent = '';
    }

    #[On('component-changed')]
    public function changeMenuComponent($cabinetTitle) 
    {
        $this->cabinetTitle = $cabinetTitle;
        $this->showLendingComponent = '';
        $this->showCabinetComponent = 'active-component';
    }

    public function logout()
    {
        return redirect()->route('lending');
    }
};
?>

<div class="menu-component">
    <div class="menu-component__container {{ $showLendingComponent }}">
        <nav class="menu">
            <ul class="menu__lists">
                <li class="menu__list">Главная</li>
                <li class="menu__list">Преимущества</li>
                <li class="menu__list">Как мы работаем</li>
                <li class="menu__list">Ответы и вопросы</li>
            </ul>
        </nav>
        <div class="cta-container">
            <button class="regbtn cta-header register">Регистрация</button>
            <button id="logbtn" class="cta-header login">Вход</button>
        </div>
    </div>
    <div class="menu-component__container {{ $showCabinetComponent }}">
        <div class="menu-component__cabinet-title">
            <h2 class="menu-component__cabinet-title-text">{{ $cabinetTitle }}</h2>
        </nav>
        <div class="menu-component__container-cta">
            <button wire:click="logout" class="cta-header logout">Выход</button>
        </div>
    </div>
</div>
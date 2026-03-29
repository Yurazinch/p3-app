<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? config('app.name') }}</title>

        @vite([
        'resources/css/lending.css',
        'resources/css/cabinet.css',
        'resources/js/app.js',
        'resources/js/lending.js',
        'resources/js/admin.js'])

        @livewireStyles
    </head>
    <body>        
        <header>
            <div class="logo-container">
                <img class="vector" src="{{ asset('storage/img/Vector.png')}}" alt="">
                <div class="logo">
                    <img class="logo__img" src="{{ asset('storage/img/Logo.png') }}" alt="">
                </div>
                <div class="tagline">
                    <p class="tagline__text">Сервис, который делает учёбу проще</p>
                </div>
            </div>
            <livewire:menu-component />
            <!--<nav class="menu">
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
            </div>-->
        </header>        
        {{ $slot }}
        <footer>
            <div class="footer-header">
                <div class="logo-container">
                    <img class="vector" src="{{ asset('storage/img/Vector.png') }}" alt="">
                    <div class="logo">
                        <img src="{{ asset('storage/img/Logo.png') }}" alt="">
                    </div>
                    <div class="tagline">
                        <p class="tagline__text">Сервис, который делает учёбу проще</p>
                    </div>
                </div>
                <nav class="menu">
                    <ul class="menu__lists">
                        <li class="menu__list">Главная</li>
                        <li class="menu__list">Преимущества</li>
                        <li class="menu__list">Как мы работаем</li>
                        <li class="menu__list">Ответы и вопросы</li>
                    </ul>
                </nav>
            </div>
            <div class="footer-wrapper">
                <p class="footer-wrapper__text">© 2026 -  Все права защищены</p>
                <div class="payment-method">
                    <p class="payment-method__text">Способы оплаты</p>
                    <ul class="footer-wrapper__payment">
                        <li class="payment-card"><img src="{{ asset('storage/img/Mastercard.png')}}" alt=""></li>
                        <li class="payment-card"><img src="{{ asset('storage/img/Mir.png')}}" alt=""></li>
                        <li class="payment-card"><img src="{{ asset('storage/img/Visa.png')}}" alt=""></li>
                    </ul>
                    <ul class="footer-wrapper__social">
                        <li class="social-icon"><img src="{{ asset('storage/img/Whatsapp.png')}}" alt=""></li>
                        <li class="social-icon"><img src="{{ asset('storage/img/Telegram.png')}}" alt=""></li>
                    </ul>
                </div>                
            </div>
        </footer>
        @livewireScripts
    </body>
</html>

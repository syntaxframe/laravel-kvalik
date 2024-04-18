<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('public/css/style.css')}}">
    <script src="{{asset('public/js/main.js')}}" defer></script>
    <base href="{{url('/')}}">
    <title>Kvalik</title>
</head>
<body class="antialiased">
<header>
    <div class="header__content container">
        <img src="public/img/logo/logo.svg" alt="logo" class="header__logo">
        <nav class="header__menu">
            <div class="header__links">
                <a href="/ ">Главная</a>
                <a href="/catalog">Каталог</a>
                <a href="/#faq">Вопрос/Ответ</a>
            </div>
            <div class="header__btns">
                @auth
                    @if(\Illuminate\Support\Facades\Auth::user()->role_id > 2)
                        <a href="/admin" class="btn">Админ-панель</a>
                    @endif
                    <form action="{{route('user.logout')}}" class="btn_form" method="post">
                        @csrf
                        <button>
                            Выйти
                        </button>
                    </form>
                    <a href="/cart" class="btn">Корзина</a>
                @else
                    <a href="/signin" class="btn">Войти</a>
                    <a href="/signup" class="btn">Зарегистрироваться</a>
                @endauth
            </div>
        </nav>
    </div>
</header>

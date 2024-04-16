@include('components.header')
<section class="form_section">
    <form action="/signin" method="post">
        @csrf
        <h2>Вход</h2>
        <div class="input_container">
            <input type="email" name="email" value="{{old('email')}}" placeholder="E-mail">
            @error('email')
            <p class="err-text">{{$message}}</p>
            @enderror
        </div>
        <div class="input_container">
            <input type="password" name="password" placeholder="Пароль">
            @error('password')
            <p class="err-text">{{$message}}</p>
            @enderror
        </div>
        <button class="form__btn">Войти</button>
    </form>
</section>
@include('components.footer')

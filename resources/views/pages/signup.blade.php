@include('components.header')
<section class="form_section">
    <form action="/signup" method="post">
        @csrf
        <h2>Регистрация</h2>
        <div class="input_container">
            <input type="text" name="name" value="{{old('name')}}" placeholder="Имя">
            @error('name')
            <p class="err-text">{{$message}}</p>
            @enderror
        </div>
        <div class="input_container">
            <input type="email" name="email" value="{{old('email')}}" placeholder="E-mail">
            @error('email')
            <p class="err-text">{{$message}}</p>
            @enderror
        </div>
        <div class="input_container">
            <input type="text" name="phone" value="{{old('phone')}}" placeholder="Телефон">
            @error('phone')
            <p class="err-text">{{$message}}</p>
            @enderror
        </div>
        <div class="input_container">
            <input type="password" name="password" placeholder="Пароль">
            @error('password')
            <p class="err-text">{{$message}}</p>
            @enderror
        </div>
        <div class="input_container">
            <input type="password" name="password_confirmation" placeholder="Пароль повторно">
            @error('password_confirmation')
            <p class="err-text">{{$message}}</p>
            @enderror
        </div>
        <div class="input_container">
            <div class="checkbox-label">
                <input type="checkbox" id="rules" name="rules" @if(old('rules')) checked @endif>
                <label for="rules">Согласен(-на) с правилами регистрации</label>
            </div>
            @error('rules')
            <p class="err-text">{{$message}}</p>
            @enderror
        </div>
        <button class="form__btn">Зарегистрироваться</button>
    </form>
</section>
@include('components.footer')

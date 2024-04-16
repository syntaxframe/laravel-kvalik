@include('components.header')
<section class="form_section">
    <form action="{{route('category.store')}}" method="post">
        @csrf
        <h2>Добавить категорию</h2>
        <div class="input_container">
            <input type="text" name="name" value="{{old('name')}}" placeholder="Название">
            @error('name')
            <p class="err-text">{{$message}}</p>
            @enderror
        </div>
        <button class="form__btn">Создать категорию</button>
    </form>
</section>
@include('components.footer')

@include('components.header')
<section class="form_section">
    <form action="{{route('category.update', ['id' => $category['id']])}}" method="post">
        @method('PATCH')
        @csrf
        <h2>Изменить категорию</h2>
        <div class="input_container">
            <input type="text" name="name" value="@if(old('name')){{old('name')}}@else{{$category['name']}}@endif"
                   placeholder="Название">
            @error('name')
            <p class="err-text">{{$message}}</p>
            @enderror
        </div>
        <button class="form__btn">Изменить категорию</button>
    </form>
</section>
@include('components.footer')

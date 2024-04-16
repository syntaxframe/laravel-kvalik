@include('components.header')
<section class="form_section">
    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <h2>Добавить товар</h2>
        <div class="input_container">
            <input type="text" name="name" value="{{old('name')}}" placeholder="Имя">
            @error('name')
            <p class="err-text">{{$message}}</p>
            @enderror
        </div>
        <div class="input_container">
            <input type="text" inputmode="numeric" name="price" value="{{old('price')}}" placeholder="Цена">
            @error('price')
            <p class="err-text">{{$message}}</p>
            @enderror
        </div>
        <div class="input_container">
            <input type="text" inputmode="numeric" name="quantity" value="{{old('quantity')}}" placeholder="Количество">
            @error('quantity')
            <p class="err-text">{{$message}}</p>
            @enderror
        </div>
        <div class="input_container">
            <select name="category_id">
                <option value="">Выберите категорию</option>
                @foreach($categories as $category)
                    <option value="{{$category['id']}}"
                            @if(old('category_id') == $category['id']) selected @endif>{{$category['name']}}</option>
                @endforeach
            </select>
            @error('category_id')
            <p class="err-text">{{$message}}</p>
            @enderror
        </div>
        <div class="input_container">
            <input type="file" name="image">
            @error('image')
            <p class="err-text">{{$message}}</p>
            @enderror
        </div>
        <button class="form__btn">Создать товар</button>
    </form>
</section>
@include('components.footer')

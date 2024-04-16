@include('components.header')
<section class="form_section">
    <form action="{{route('product.update', ['id' => $product['id']])}}" method="post" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <h2>Изменить товар</h2>
        <div class="input_container">
            <input type="text" name="name" value="@if(old('name')){{old('name')}}@else{{$product['name']}}@endif"
                   placeholder="Имя">
            @error('name')
            <p class="err-text">{{$message}}</p>
            @enderror
        </div>
        <div class="input_container">
            <input type="text" inputmode="numeric" name="price"
                   value="@if(old('price')){{old('price')}}@else{{$product['price']}}@endif" placeholder="Цена">
            @error('price')
            <p class="err-text">{{$message}}</p>
            @enderror
        </div>
        <div class="input_container">
            <input type="text" inputmode="numeric" name="quantity"
                   value="@if(old('quantity')){{old('quantity')}}@else{{$product['quantity']}}@endif"
                   placeholder="Количество">
            @error('quantity')
            <p class="err-text">{{$message}}</p>
            @enderror
        </div>
        <div class="input_container">
            <select name="category_id">
                <option value="">Выберите категорию</option>
                @foreach($categories as $category)
                    <option value="{{$category['id']}}"
                            @if($category['id'] == $product['category_id'] || $category['id'] == old('category_id')) selected @endif>{{$category['name']}}</option>
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
        <button class="form__btn">Изменить товар</button>
    </form>
</section>
@include('components.footer')

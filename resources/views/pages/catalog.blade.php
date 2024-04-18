@include('components.header')
<section class="catalog">
    <div class="catalog__content container">
        <form class="catalog__filters">
            <h3>Фильтры</h3>
            <div class="filters__wrapper">
                <div class="filter__item">
                    <h4>Категория</h4>
                    <select name="c">
                        <option value="">Выберите категорию</option>
                        @foreach($categories as $category)
                            <option value="{{$category['id']}}" @if($_GET && $_GET['c'] && $_GET['c'] == $category['id']) selected @endif>
                                {{$category['name']}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button class="form__btn">Применить фильтры</button>
            </div>
        </form>
        <div class="catalog__wrapper">
            @foreach($products as $product)
                <div class="product-card">
                    <a href="catalog/{{$product->id}}">
                        <img src="{{'public/storage/products/'.$product->image}}" alt="image" class="product-card__img">
                    </a>
                    <h3 class="product-card__title">{{$product->name}}</h3>
                    <p class="product-card__price">{{$product->price}} r</p>
                    <p class="product-card__price">Количество: {{$product->quantity}}</p>
                    <form action="{{route('cart.add', ['id' => $product->id])}}" method="post">
                        @csrf
                        <button class="product-card__btn">В корзину</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</section>
@include('components.footer')

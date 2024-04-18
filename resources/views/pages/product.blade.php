@include('components.header')
<section class="catalog">
    <div class="catalog__content container">
        <div class="product">
            <a href="product/{{$product->id}}">
                <img src="{{'public/storage/products/'.$product->image}}" alt="image" class="product-card__img">
            </a>
            <div class="">
                <h3 class="product__title">{{$product->name}}</h3>
                <p class="product-card__price">{{$product->price}} r</p>
                <p class="product-card__price">Количество: {{$product->quantity}}</p>
                <form action="{{route('cart.add', ['id' => $product->id])}}" method="post">
                    @csrf
                    <button class="product-card__btn">В корзину</button>
                </form>
                @if(\Illuminate\Support\Facades\Auth::user() && \Illuminate\Support\Facades\Auth::user()->role_id > 2)
                    <div class="product__btns">
                        <a href="{{route('product.edit', ['id' => $product['id']])}}" class="btn">Изменить</a>
                        <form class="btn_form" action="{{route('product.delete', ['id' => $product['id']])}}"
                              method="post">
                            @csrf
                            @method('DELETE')
                            <button>Удалить</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@include('components.footer')

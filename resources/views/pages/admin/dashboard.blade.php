@include('components.header')
<section class="categories">
    <div class="container">
        <div class="title-add_btn">
            <h2>Категории</h2>
            <a href="{{route('category.create')}}" class="btn">Добавить</a>
        </div>
        <div class="categories__wrapper">
            @foreach($categories as $category)
                <div class="category">
                    <p>{{$category['name']}}</p>
                    <div class="category__btns">
                        <a href="{{route('category.edit', ['id' => $category['id']])}}" class="btn">Изменить</a>
                        <form class="btn_form" action="{{route('category.delete', ['id' => $category['id']])}}"
                              method="post">
                            @csrf
                            @method('DELETE')
                            <button>Удалить</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<div class="categories">
    <div class="container">
        <div class="title-add_btn">
            <h2>Товары</h2>
            <a href="{{route('product.create')}}" class="btn">Добавить товар</a>
        </div>
    </div>
</div>
@include('components.footer')

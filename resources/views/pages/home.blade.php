@include('components.header')
<section class="slider_section">
    <div class="slider__content">
        <div class="slider-container">
            <div class="slider">
                <div class="slide">
                    <img src="public/img/slider/slide1.webp" alt="Slide 1">
                </div>
                <div class="slide">
                    <img src="public/img/slider/slide2.jpg" alt="Slide 2">
                </div>
                <div class="slide">
                    <img src="public/img/slider/slide3.webp" alt="Slide 3">
                </div>
            </div>
            <div class="slider-btns">
                <button class="slider-btn" id="prevBtn">&#10094;</button>
                <button class="slider-btn" id="nextBtn">&#10095;</button>
            </div>
            <p class="slider__quote">Девиз</p>
        </div>
    </div>
</section>
<div class="faq" id="faq">
    <div class="container">
        <h2>Вопрос-ответ</h2>
        <div class="faq__wrapper">
            <div class="faq__item">
                <div class="question">
                    <h3>Test</h3>
                    <span>&#10006;</span>
                </div>
                <p class="answer">
                    Test
                </p>
            </div>
        </div>
    </div>
</div>
<footer>
    <div class="footer__container container">
        <a href="" class="name">Имя Фамилия</a>
        <div class="footer__contacts">
            <div class="contact">
                <p>+7 999 999-99-99</p>
            </div>
        </div>
    </div>
</footer>
@include('components.footer')

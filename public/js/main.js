try {
    const slider = document.querySelector('.slider');
    const slides = document.querySelectorAll('.slide');
    let slideIndex = 0;

    function showSlide(index) {
        slideIndex = index;
        const slideWidth = slides[0].clientWidth;
        slider.style.transform = `translateX(-${slideWidth * slideIndex}px)`;
    }

    showSlide(0);

    document.getElementById('prevBtn').addEventListener('click', () => {
        slideIndex = (slideIndex - 1 + slides.length) % slides.length;
        showSlide(slideIndex);
    });

    document.getElementById('nextBtn').addEventListener('click', () => {
        slideIndex = (slideIndex + 1) % slides.length;
        showSlide(slideIndex);
    });

    const faq = document.querySelectorAll('.faq__item');

    faq.forEach(e => {
        e.addEventListener('click', () => {
            const icon = e.querySelector('.question > span');
            const answer = e.querySelector('.answer');

            answer.classList.toggle('open');
            icon.classList.toggle('open');
        });
    });
} catch (e) {
}

let currentSlide = 0;

document.getElementById('nextBtn').addEventListener('click', function() {
    showSlide(currentSlide + 1);
});

document.getElementById('prevBtn').addEventListener('click', function() {
    showSlide(currentSlide - 1);
});

function showSlide(n) {
    const slides = document.querySelector('.slider-content');
    const totalSlides = document.querySelectorAll('.slide').length;

    if (n >= totalSlides) {
        currentSlide = 0;
    } else if (n < 0) {
        currentSlide = totalSlides - 1;
    } else {
        currentSlide = n;
    }

    slides.style.transform = `translateX(${-currentSlide * 100}%)`;
}
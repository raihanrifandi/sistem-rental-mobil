document.addEventListener("DOMContentLoaded", function () {
    AOS.init({
        duration: 1000,
        once: false
    });

    const swiper = new Swiper('.swiper-container', {
        slidesPerView: 'auto',
        spaceBetween: 30,
        autoplay: {
            delay: 2500,
            disableOnInteraction: true,
        },
        breakpoints: {
            640: { slidesPerView: 3 },
            768: { slidesPerView: 4 },
            1024: { slidesPerView: 6 },
        },
    });

    const brandLogos = [
        { name: 'BMW', file: 'BMW.png' },
        { name: 'Lexus', file: 'Lexus.png' },
        { name: 'Mercedes', file: 'Mercedes.png' },
        { name: 'Honda', file: 'Honda.png' },
        { name: 'Hyundai', file: 'Hyundai.png' },
        { name: 'Nissan', file: 'Nissan.png' },
        { name: 'Toyota', file: 'Toyota.png' },
        { name: 'KIA', file: 'KIA.png' },
    ];

    const swiperWrapper = document.querySelector('.swiper-wrapper');

    brandLogos.forEach(brand => {
        const slide = document.createElement('div');
        slide.className = 'swiper-slide';
        slide.innerHTML = `
            <img src="assets/img/${brand.file}" alt="${brand.name}" class=" grayscale hover:grayscale-0 transition duration-300 w-[16px] h-[16px]">
        `;
        swiperWrapper.appendChild(slide);
    });

    const scrollToTopButton = document.getElementById('scrollToTop');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 200) {
            scrollToTopButton.classList.add('opacity-100');
            scrollToTopButton.classList.remove('opacity-0');
        } else {
            scrollToTopButton.classList.add('opacity-0');
            scrollToTopButton.classList.remove('opacity-100');
        }
    });

    scrollToTopButton.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
});

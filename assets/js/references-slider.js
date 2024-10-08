document.addEventListener('DOMContentLoaded', () => {
	const swiper = new Swiper('.st-references-slider', {
		loop: true,
		spaceBetween: 48,
		slidesPerView: 3,
		autoplay: {
			delay: 1,
			disableOnInteraction: true,
		},
		speed: 3500,
		freeMode: false,
		grabCursor: false,
		allowTouchMove: false,
		disableOnInteraction: true,

		breakpoints: {
			1440: {
				slidesPerView: 10,
			},
			1024: {
				slidesPerView: 6,
			},
			768: {
				slidesPerView: 4,
			},

			425: {
				slidesPerView: 3,
			},
		},
	});
});

document.addEventListener('DOMContentLoaded', () => {
	const swiper = new Swiper('.st-references-slider', {
		loop: true,
		spaceBetween: 48,
		slidesPerView: 10,
		autoplay: {
			delay: 1,
			disableOnInteraction: true,
		},
		speed: 3500,
		freeMode: false,
		grabCursor: false,
		allowTouchMove: false,
		disableOnInteraction: true,
	});
});

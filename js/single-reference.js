document.addEventListener('DOMContentLoaded', () => {
	if (document.querySelector('.st-single-reference__gallery.swiper')) {
		const swiper = new Swiper('.st-single-reference__gallery.swiper', {
			spaceBetween: 32,
			slidesPerView: 1.5,
			centeredSlides: true,
			loop: true,
			speed: 600,
			pagination: {
				el: '.swiper-pagination',
				clickable: true,
			},
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
		});
	}
});

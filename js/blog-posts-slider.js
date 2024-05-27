document.addEventListener('DOMContentLoaded', () => {
	const swiper = new Swiper('.st-blog-posts-slider', {
		loop: true,
		spaceBetween: 24,
		slidesPerView: 3.5,
		centeredSlides: true,
		autoplay: {
			delay: 1000,
		},
		speed: 750,
	});
});

document.addEventListener('DOMContentLoaded', () => {
	if (document.querySelector('.st-blog-posts-slider')) {
		const swiper = new Swiper('.st-blog-posts-slider', {
			loop: true,
			spaceBetween: 24,
			slidesPerView: 3.5,
			centeredSlides: true,
			autoplay: {
				delay: 1500,
				disableOnInteraction: false,
			},
			speed: 750,
		});

		swiper.el.addEventListener(
			'mouseenter',
			function (event) {
				swiper.autoplay.stop();
			},
			false
		);

		swiper.el.addEventListener(
			'mouseleave',
			function (event) {
				swiper.autoplay.start();
			},
			false
		);
	}
});

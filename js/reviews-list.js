document.addEventListener('DOMContentLoaded', () => {
	const swiper = new Swiper('.st-reviews-list', {
		effect: 'cards',
		grabCursor: true,
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
	});
});

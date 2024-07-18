document.addEventListener('DOMContentLoaded', () => {
	if (document.querySelector('.st-reviews-list')) {
		const swiper = new Swiper('.st-reviews-list', {
			effect: 'cards',
			grabCursor: true,
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
		});
	}
});

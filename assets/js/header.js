document.addEventListener('DOMContentLoaded', () => {
	// == Constants
	const header = document.querySelector('.st-header');
	const navigation = document.querySelector('.st-header__navigation');
	const burgerButton = document.querySelector('.st-header__burger');

	// == Add fixed class on scroll above 150px
	window.addEventListener('scroll', () => {
		let scrollPosition = window.scrollY;

		if (scrollPosition > 100) {
			header.classList.add('hidden');
		} else {
			header.classList.remove('hidden');
		}
	});

	// == Open burger button on button click
	burgerButton.addEventListener('click', () => {
		burgerButton.classList.toggle('active');

		navigation.classList.toggle('active');
	});
});

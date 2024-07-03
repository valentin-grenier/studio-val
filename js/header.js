document.addEventListener('DOMContentLoaded', () => {
	// == Constants
	const header = document.querySelector('.st-header');
	const navigation = document.querySelector('.st-header__navigation');
	const burgerButton = document.querySelector('.st-header__burger');

	// == Add fixed class on page load
	if (window.scrollY === 0) {
		header.classList.remove('hidden');
	} else {
		header.classList.add('hidden');
	}

	// == Add fixed class on scroll above 150px
	window.addEventListener('scroll', () => {
		let scrollPosition = window.scrollY;

		if (scrollPosition > 50) {
			header.classList.add('hidden');
		} else {
			header.classList.remove('hidden');
		}
	});

	// == Open burger button on button click
	// burgerButton.addEventListener('click', () => {
	// 	navigation.classList.toggle('opened');

	// 	if (!header.classList.contains('fixed')) {
	// 		header.classList.add('fixed');
	// 	}
	// });
});

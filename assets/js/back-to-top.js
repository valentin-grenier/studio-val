document.addEventListener('DOMContentLoaded', () => {
	const button = document.querySelector('.st-back-to-top');

	// == Scroll to top on click
	button.addEventListener('click', () => {
		window.scrollTo({
			top: 0,
			behavior: 'smooth',
		});
	});

	// == Hide button when at the top
	window.addEventListener('scroll', () => {
		console.log(window.scrollY);

		if (window.scrollY < 500) {
			button.classList.remove('active');
		} else {
			button.classList.add('active');
		}
	});

	// == Hide button when at the top on load
	if (window.scrollY < 500) {
		button.classList.remove('active');
	} else {
		button.classList.add('active');
	}
});

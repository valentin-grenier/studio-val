document.addEventListener('DOMContentLoaded', () => {
	window.addEventListener('load', () => {
		// == Homepage loader
		if (window.location.pathname === '/') {
			const loader = document.querySelector('.st-loader');
			const loaderInner = loader.querySelector('.st-loader__inner');
			const loaderText = ['Studio', 'Val'];

			if (loader) {
				loaderText.forEach((word, index) => {
					const span = document.createElement('span');
					span.textContent = word;
					loaderInner.appendChild(span);

					const tl = gsap.timeline();

					tl.fromTo(
						span,
						{ opacity: 0, y: 75 },
						{
							opacity: 1,
							y: 0,
							duration: 0.75,
							delay: index * 0.1,
							ease: 'power2.inOut',
						},
						'+=0.75'
					);

					// == Slide up loader
					tl.fromTo(
						loader,
						{ transform: 'translateY(0%)' },
						{
							transform: 'translateY(-100%)',
							duration: 0.75,
							delay: 0.75,
							ease: 'power2.inOut',
							onComplete: () => {
								loader.classList.add('is-hidden');
							},
						}
					);
				});
			}
		}
	});
});

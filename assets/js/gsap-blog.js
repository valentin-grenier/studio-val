document.addEventListener('DOMContentLoaded', () => {
	window.addEventListener('load', () => {
		gsap.fromTo(
			'.st-blog__title',
			{
				opacity: 0,
				y: 15,
			},
			{
				opacity: 1,
				y: 0,
				ease: 'power4.out',
				duration: 1,
				delay: 0.5,
			}
		);

		gsap.fromTo(
			'.st-blog__hero',
			{
				opacity: 0,
				y: -15,
			},
			{
				opacity: 1,
				y: 0,
				ease: 'power4.out',
				duration: 1,
				delay: 0.5,
			}
		);

		gsap.utils
			.toArray('.st-blog__posts-list .st-card-post')
			.forEach((card, index) => {
				gsap.fromTo(
					card,
					{
						opacity: 0,
						y: 15,
					},
					{
						opacity: 1,
						y: 0,
						duration: 0.5,
						scrollTrigger: {
							trigger: card,
							start: 'top: 90%',
							end: 'bottom: 20%',
							toggleActions: 'play none none none',
						},
						delay: index * 0.075,
					}
				);
			});
	});
});

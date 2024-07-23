document.addEventListener('DOMContentLoaded', () => {
	window.addEventListener('load', () => {
		// == Custom cursor
		const cursor = document.querySelector('.st-cursor');

		document.addEventListener('mousemove', (event) => {
			gsap.to(cursor, {
				x: event.clientX + 16,
				y: event.clientY + 24,
				duration: 0.5,
				ease: 'power1.out',
			});
		});

		const growCursor = () => {
			cursor.classList.add('is-scaled');
		};

		const resetCursor = () => {
			cursor.classList.remove('is-scaled');
		};

		document.querySelectorAll('a').forEach((link) => {
			link.addEventListener('mouseenter', () => {
				growCursor();
			});

			link.addEventListener('mouseleave', resetCursor);
		});

		gsap.registerPlugin(ScrollTrigger);

		// == Cards list animation
		gsap.utils.toArray('.st-cards-list .st-card').forEach((card, index) => {
			gsap.fromTo(
				card,
				{
					opacity: 0,
					y: 30,
				},
				{
					opacity: 1,
					y: 0,
					duration: 0.5,
					scrollTrigger: {
						trigger: card,
						start: 'top: 70%',
						end: 'bottom: 20%',
						toggleActions: 'play none none none',
					},
					delay: index * 0.075,
				}
			);
		});

		// == Cards number animation
		gsap.utils
			.toArray('.st-cards-numbers .st-cards-numbers__card')
			.forEach((card, index) => {
				gsap.fromTo(
					card,
					{
						opacity: 0,
						x: -50,
					},
					{
						opacity: 1,
						x: 0,
						duration: 1,
						ease: 'expo.out',
						scrollTrigger: {
							trigger: card,
							start: 'top: 60%',
							end: 'bottom: 20%',
							toggleActions: 'play none none none',
						},
						delay: index * 0.075,
					}
				);
			});

		// == Callout block animation
		gsap.utils.toArray('.st-callout-block').forEach((block) => {
			gsap.fromTo(
				block,
				{
					opacity: 0,
					scale: 0.9,
					y: 30,
				},
				{
					opacity: 1,
					scale: 1,
					y: 0,
					duration: 1,
					delay: 0.25,
					ease: 'expo',
					scrollTrigger: {
						trigger: block,
						start: 'top: 50%',
						end: 'bottom: 20%',
						toggleActions: 'play none none none',
					},
				}
			);
		});

		// == Graphic blocks animation
		gsap.utils
			.toArray('.st-graphic-blocks .st-block')
			.forEach((block, index) => {
				// == Set rotation duration for each block
				let duration = 10;
				switch (duration) {
					case index === 1:
						duration = 8;
						break;
					case index === 2:
						duration = 12;
						break;
					case index === 3:
						duration = 6;
						break;
					case index === 4:
						duration = 14;
						break;
				}

				const isEven = index % 2 === 0;
				const rotation = isEven ? '-=360' : '+=360';

				// == Rotate blocks
				gsap.to(block, {
					rotation: rotation,
					repeat: -1,
					duration: 10,
					ease: 'linear',
				});

				// == Disperse blocks on scroll
				const pinTrigger = ScrollTrigger.create({
					trigger: block,
					start: '0',
				});

				let tl = gsap.timeline();

				// == Depending on the index, disperse blocks to the left or right
				if (!isEven) {
					// == Blocks on the left
					tl.fromTo(
						block,
						{
							x: 0,
						},
						{
							x: 200,
							scrollTrigger: {
								start: () => pinTrigger?.start,
								end: () => pinTrigger?.end,
								scrub: 1,
							},
						}
					);
				} else {
					// == Blocks on the right
					tl.fromTo(
						block,
						{ x: 0 },
						{
							x: -200,
							scrollTrigger: {
								start: () => pinTrigger?.start,
								end: () => pinTrigger?.end,
								scrub: 1,
							},
						}
					);
				}

				// == Depending on their index, disperse blocks to the top or bottom
				switch (index) {
					case 0:
					case 1:
						tl.fromTo(
							block,
							{
								y: 0,
								opacity: block.style.opacity,
							},
							{
								y: -300,
								opacity: 0,
								scrollTrigger: {
									start: () => pinTrigger?.start,
									end: () => pinTrigger?.end,
									scrub: 1,
								},
							}
						);
						break;
					case 2:
					case 3:
						tl.fromTo(
							block,
							{
								y: 0,
								opacity: block.style.opacity,
							},
							{
								y: 300,
								opacity: 0,
								scrollTrigger: {
									start: () => pinTrigger?.start,
									end: () => pinTrigger?.end,
									scrub: 1,
								},
							}
						);
						break;
				}

				return () => {
					pinTrigger.kill();
					tl.kill();
				};
			});

		// == References slider animation
		gsap.utils
			.toArray('.st-references-slider .swiper-slide')
			.forEach((slide, index) => {
				gsap.fromTo(
					slide,
					{
						opacity: 0,
						x: 50,
					},
					{
						opacity: 1,
						x: 0,
						duration: 0.5,
						scrollTrigger: {
							trigger: slide,
							start: 'top: 90%',
							end: 'bottom: 20%',
							toggleActions: 'play none none none',
						},
						delay: index * 0.05,
					}
				);
			});

		// === Homepage animations === //
		if (window.location.pathname === '/') {
			// == Hero section
			const animatedTitle = document.querySelector(
				'.st-site-title__animated-title'
			);
			const mainTitle = document.querySelector(
				'.st-site-title__main-title'
			);
			const buttons = document.querySelector('.st-site-title__buttons');
			const slider = document.querySelector('.st-references-slider');

			const graphicBlocks = document.querySelectorAll(
				'.st-graphic-blocks .st-block'
			);

			if (
				animatedTitle &&
				mainTitle &&
				buttons &&
				slider &&
				graphicBlocks
			) {
				const tl = gsap.timeline({
					opacity: 1,
				});

				// == 1. Display animated title
				tl.fromTo(
					animatedTitle,
					{
						opacity: 0,
						scale: 0.9,
					},
					{
						opacity: 1,
						scale: 1,
						duration: 1,
						delay: 1,
						ease: 'expo',
					}
				);

				// == 2. Display main title
				tl.fromTo(
					mainTitle,
					{
						opacity: 0,
					},
					{
						opacity: 1,
						delay: 0.5,
						duration: 1,
						ease: 'expo',
					},
					'-=0.5'
				);

				// == 3. Display buttons
				tl.fromTo(
					buttons,
					{
						opacity: 0,
					},
					{
						opacity: 1,
						duration: 4,
						ease: 'expo',
					}
				);

				// == 4. Display graphic blocks

				// == 5. Display slider with delay
				tl.fromTo(
					slider,
					{
						opacity: 0,
					},
					{
						opacity: 1,
						duration: 1,
						ease: 'expo',
					},
					'-=4'
				);
			}
		}
	});
});

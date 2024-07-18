document.addEventListener('DOMContentLoaded', () => {
	const filters = document.querySelectorAll(
		'.st-projects-gallery__filters button'
	);
	const projects = document.querySelectorAll('.st-card-project');

	filters.forEach((filter) => {
		filter.addEventListener('click', () => {
			// == Remove active class from all buttons
			filters.forEach((button) => button.classList.remove('active'));

			// == Add active class to the clicked button
			filter.classList.add('active');
			const selectedFilter = filter.getAttribute('data-filter');

			// == Filter projects depending on their category
			projects.forEach((project) => {
				const projectType = project.getAttribute('data-category');
				const categories = projectType.split(' ');

				if (categories.includes(selectedFilter)) {
					project.classList.remove('hidden');
				} else {
					project.classList.add('hidden');
				}
			});

			// == Display all projects if the "All" button is clicked
			if (selectedFilter === 'all') {
				projects.forEach((project) => {
					project.classList.remove('hidden');
				});
			}
		});
	});
});

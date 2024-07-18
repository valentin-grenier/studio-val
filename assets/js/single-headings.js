document.addEventListener('DOMContentLoaded', () => {
	const headings = document.querySelectorAll(
		'.st-single__content h2, .st-single__content h3'
	);

	// Edit post content headings
	headings.forEach((heading) => {
		// Remove existing id
		heading.id = '';

		// Get the heading text content
		let textContent = heading.textContent;

		// Normalize accented characters to their non-accented counterparts
		textContent = textContent
			.normalize('NFD')
			.replace(/[\u0300-\u036f]/g, '');

		// Remove non-ASCII characters like emojis
		const sanitizedText = textContent
			.replace(/[^\x00-\x7F]/g, '')
			.replace(/[^\w\s-]/gi, '') // Include hyphen in the character set to keep it
			.trim()
			.replace(/\s+/g, '-');

		// Update the heading id
		headingSlug = sanitizedText.toLowerCase().replace(/\s+/g, '-');
		heading.id = headingSlug;
	});
});

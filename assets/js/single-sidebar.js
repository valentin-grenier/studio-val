document.addEventListener('DOMContentLoaded', () => {
	if (document.querySelector('.st-single')) {
		const sidebarSocials = document.querySelector('.st-single__sidebar ul');
		const linkButton = document.querySelector(
			'.st-single__sidebar ul li:last-child'
		);

		const postUrl = window.location.href;

		const facebookUrl = `fb://share/?href=${encodeURIComponent(postUrl)}`;
		const twitterUrl = `twitter://post?message=${encodeURIComponent(
			postUrl
		)}`;
		const linkedinUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(
			postUrl
		)}`;

		// === Share link button
		linkButton.addEventListener('click', () => {
			const notification = document.querySelector(
				'.st-link-notification'
			);

			// Create a temporary textarea element to copy the URL
			const textarea = document.createElement('textarea');
			textarea.value = postUrl;
			document.body.appendChild(textarea);
			textarea.select();
			document.execCommand('copy');
			document.body.removeChild(textarea);

			// Show the notification
			notification.classList.add('active');

			// Hide the notification 2 seconds after showing it
			setTimeout(() => notification.classList.remove('active'), 2000);
		});
	}
});

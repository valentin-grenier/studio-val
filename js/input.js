document.addEventListener('DOMContentLoaded', () => {
	const textInputs = document.querySelectorAll('input[type="text"]');
	const emailInputs = document.querySelectorAll('input[type="email"]');
	const telInputs = document.querySelectorAll('input[type="tel"]');

	// === Functions
	function handleInputValidation(input, isValid) {
		if (isValid) {
			input.classList.add('input-valid');
			input.classList.remove('input-not-valid');
		} else {
			input.classList.add('input-not-valid');
			input.classList.remove('input-valid');
		}
	}

	function isValidEmail(email) {
		// Basic email validation using a regular expression
		return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
	}

	function isValidPhoneNumber(input) {
		let cleaned = input.value.replace(/\D/g, '');

		return cleaned.length === 10;
	}

	function formatPhoneNumber(input) {
		// Remove all non-digit characters from the input value
		let cleaned = input.value.replace(/\D/g, '');

		// Format the cleaned input with spaces every two characters
		let formatted = '';
		for (let i = 0; i < cleaned.length; i += 2) {
			formatted += cleaned.substr(i, 2) + ' ';
		}

		// Update the input value with the formatted string
		input.value = formatted.trim();
	}

	// === Event listeners for text inputs
	textInputs.forEach((input) => {
		input.addEventListener('input', () => {
			handleInputValidation(input, !/\d/.test(input.value));
		});

		input.addEventListener('change', () => {
			if (input.value.trim() === '') {
				input.classList.remove('input-valid', 'input-not-valid');
			}
		});
	});

	// === Event listeners for email inputs
	emailInputs.forEach((input) => {
		input.addEventListener('input', () => {
			handleInputValidation(input, isValidEmail(input.value));
		});

		input.addEventListener('change', () => {
			if (input.value.trim() === '') {
				input.classList.remove('input-valid', 'input-not-valid');
			}
		});
	});

	// === Event listeners for tel inputs
	telInputs.forEach((input) => {
		input.addEventListener('input', () => {
			handleInputValidation(input, isValidPhoneNumber(input));
			formatPhoneNumber(input);
		});

		input.addEventListener('change', () => {
			if (input.value.trim() === '') {
				input.classList.remove('input-valid', 'input-not-valid');
			}
		});
	});
});

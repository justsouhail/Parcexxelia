document.addEventListener('DOMContentLoaded', function() {
	const togglePasswords = document.querySelectorAll('.toggle-password');

	togglePasswords.forEach(function(togglePassword) {
		const password = togglePassword.previousElementSibling;

		togglePassword.addEventListener('click', function(e) {
			const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
			password.setAttribute('type', type);
			this.classList.toggle('fa-eye-slash');
		});
	});
});

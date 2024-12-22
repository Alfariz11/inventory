document.getElementById('registerForm').addEventListener('submit', function (e) {
    let valid = true;

    const username = document.getElementById('regUsername').value;
    const password = document.getElementById('regPassword').value;
    const repassword = document.getElementById('regRepassword').value;

    // Reset error messages
    document.getElementById('usernameError').textContent = '';
    document.getElementById('passwordError').textContent = '';
    document.getElementById('repasswordError').textContent = '';

    // Username validation
    if (!username) {
        valid = false;
        document.getElementById('usernameError').textContent = 'Username is required.';
    }

    // Password validation
    if (password.length < 8) {
        valid = false;
        document.getElementById('passwordError').textContent = 'Password must be at least 8 characters.';
    } else if (!/[A-Z]/.test(password) || !/\d/.test(password)) {
        valid = false;
        document.getElementById('passwordError').textContent = 'Password must contain at least one uppercase letter and one number.';
    }

    // Confirm Password validation
    if (password !== repassword) {
        valid = false;
        document.getElementById('repasswordError').textContent = 'Passwords do not match.';
    }

    if (!valid) {
        e.preventDefault(); // Prevent form submission
    }
});

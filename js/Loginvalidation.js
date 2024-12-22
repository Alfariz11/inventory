document.getElementById('loginForm').addEventListener('submit', function (e) {
    let valid = true;

    const username = document.getElementById('loginUsername').value;
    const email = document.getElementById('loginEmail').value;
    const password = document.getElementById('loginPassword').value;

    // Reset error messages for client-side validation
    document.getElementById('usernameError').textContent = '';
    document.getElementById('emailError').textContent = '';
    document.getElementById('passwordError').textContent = '';

    // Validate username
    if (!username) {
        valid = false;
        document.getElementById('usernameError').textContent = 'Username is required.';
    }

    // Validate email
    if (!email) {
        valid = false;
        document.getElementById('emailError').textContent = 'Email is required.';
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        valid = false;
        document.getElementById('emailError').textContent = 'Please enter a valid email address.';
    }

    // Validate password
    if (!password) {
        valid = false;
        document.getElementById('passwordError').textContent = 'Password is required.';
    }

    if (!valid) {
        e.preventDefault(); // Prevent form submission if validation fails
    }
});


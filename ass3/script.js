document.getElementById('registrationForm').addEventListener('submit', function(event) {
    event.preventDefault();

    // Clear previous errors
    document.getElementById('nameError').textContent = '';
    document.getElementById('emailError').textContent = '';
    document.getElementById('mobileError').textContent = '';

    let isValid = true;

    // Validate Name
    const name = document.getElementById('name').value.trim();
    if (name === '') {
        document.getElementById('nameError').textContent = 'Name is required.';
        isValid = false;
    } else if (!/^[a-zA-Z\s]+$/.test(name)) {
        document.getElementById('nameError').textContent = 'Name should contain only letters and spaces.';
        isValid = false;
    }

    // Validate Email
    const email = document.getElementById('email').value.trim();
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email === '') {
        document.getElementById('emailError').textContent = 'Email is required.';
        isValid = false;
    } else if (!emailRegex.test(email)) {
        document.getElementById('emailError').textContent = 'Please enter a valid email address.';
        isValid = false;
    }

    // Validate Mobile Number
    const mobile = document.getElementById('mobile').value.trim();
    const mobileRegex = /^\d{10}$/;
    if (mobile === '') {
        document.getElementById('mobileError').textContent = 'Mobile number is required.';
        isValid = false;
    } else if (!mobileRegex.test(mobile)) {
        document.getElementById('mobileError').textContent = 'Mobile number should be 10 digits.';
        isValid = false;
    }

    if (isValid) {
        alert('Registration successful!');
        // Here you can add code to submit the form data
    }
});

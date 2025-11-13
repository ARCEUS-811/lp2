// Login Form Validation
document.getElementById('login-form')?.addEventListener('submit', function(event) {
    event.preventDefault();
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const errorMessage = document.getElementById('error-message');

    // Simple validation (for UI only, no real authentication)
    if (username === 'admin' && password === 'password') {
        // Redirect to dashboard (simulate)
        window.location.href = 'admin-dashboard.html';
    } else {
        errorMessage.textContent = 'Invalid username or password.';
    }
});

// Dashboard Interactions
console.log('Dashboard script loaded');

// Logout button
const logoutBtn = document.getElementById('logout-btn');
if (logoutBtn) {
    logoutBtn.addEventListener('click', function() {
        // Simulate logout by redirecting to login
        window.location.href = 'admin-login.html';
    });
}

// Update and Delete buttons (UI only, simulate actions)
const updateBtns = document.querySelectorAll('.update-btn');
const deleteBtns = document.querySelectorAll('.delete-btn');

console.log('Update buttons found:', updateBtns.length);
console.log('Delete buttons found:', deleteBtns.length);

updateBtns.forEach(btn => {
    btn.addEventListener('click', function() {
        console.log('Update button clicked');
        const row = btn.closest('tr');
        const cells = row.querySelectorAll('td');
        const newName = prompt('Enter new event name:', cells[1].textContent);
        const newDate = prompt('Enter new date:', cells[2].textContent);
        const newLocation = prompt('Enter new location:', cells[3].textContent);
        if (newName !== null && newDate !== null && newLocation !== null) {
            cells[1].textContent = newName;
            cells[2].textContent = newDate;
            cells[3].textContent = newLocation;
        }
    });
});

deleteBtns.forEach(btn => {
    btn.addEventListener('click', function() {
        console.log('Delete button clicked');
        const row = btn.closest('tr');
        console.log('Row to delete:', row);
        if (confirm('Are you sure you want to delete this event?')) {
            // Simulate deletion by removing the row
            row.remove();
            console.log('Row removed');
        }
    });
});

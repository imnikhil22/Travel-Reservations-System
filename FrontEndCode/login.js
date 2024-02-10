function loginUser(event) {
    event.preventDefault();

    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    // Retrieve the user from localStorage (in-memory storage for simplicity).
    const storedUser = JSON.parse(localStorage.getItem('currentUser'));

    if (storedUser && storedUser.username === username && storedUser.password === password) {
        alert('Login successful! Redirecting to the reservations page.');
        window.location.href = 'reservations.html';
    } else {
        alert('Invalid credentials. Please try again.');
    }
}

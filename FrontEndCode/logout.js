function logoutUser() {
    // Clear user data from storage (in-memory for simplicity).
    localStorage.removeItem('currentUser');
    localStorage.removeItem('userReservations');

    alert('Logout successful! Redirecting to the homepage.');
    window.location.href = 'index.html';
}

document.addEventListener('DOMContentLoaded', displayReservations);

function displayReservations() {
    const reservationList = document.getElementById('reservationList');

    // Retrieve the user's reservations from storage (in-memory for simplicity).
    const userReservations = JSON.parse(localStorage.getItem('userReservations')) || [];

    // Display each reservation in the list.
    userReservations.forEach(reservation => {
        const listItem = document.createElement('li');
        listItem.textContent = reservation;
        reservationList.appendChild(listItem);
    });
}

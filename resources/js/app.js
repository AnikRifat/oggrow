import './bootstrap';

// Initialize Laravel Echo and set the Pusher credentials
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'd0ae78a47b387fb705da',
    cluster: 'mt1',
    encrypted: true
});

// Listen for the 'user.updated' event from the WebSocket server
Echo.private('user-data').listen('.user.updated', function(data) {
    // Update the table with the new data
    const tableBody = document.querySelector('tbody');
    tableBody.innerHTML = '';

    data.users.forEach((user) => {
        const row = document.createElement('tr');
        row.innerHTML = `<td>${user.id}</td><td>${user.name}</td><td>${user.email}</td>`;
        tableBody.appendChild(row);
    });
});

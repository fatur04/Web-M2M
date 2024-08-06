require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.Echo.channel('data-channel')
    .listen('DataInserted', (e) => {
        console.log('Data inserted: ', e.data);
        // Lakukan refresh data tabel di sini
        addRowToTable(e.data);
    });

function addRowToTable(data) {
    let table = document.getElementById('yourTable');
    let newRow = table.insertRow();
    // Sesuaikan dengan struktur data dan kolom tabel kamu
    newRow.insertCell(0).innerText = data.id;
    newRow.insertCell(1).innerText = data.name;
    newRow.insertCell(2).innerText = data.created_at;
}





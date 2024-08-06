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
    let table = document.getElementById('table');
    let newRow = table.insertRow();
    // Sesuaikan dengan struktur data dan kolom tabel kamu
    newRow.insertCell(0).innerText = data.id_log;
    newRow.insertCell(1).innerText = data.nama;
    newRow.insertCell(2).innerText = data.activity;
    newRow.insertCell(2).innerText = data.tanggal;
}





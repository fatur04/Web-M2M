require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import Vue from 'vue';
import Echo from 'laravel-echo';

window.Echo.channel('data-channel')
    .listen('DataUpdated', (e) => {
        console.log('Data updated: ', e.data);
        // Lakukan refresh data tabel di sini
    });


window.Vue = Vue;

new Vue({
    el: '#app',
    data: {
        items: []
    },
    mounted() {
        Echo.channel('dashboard')
            .listen('oke', (event) => {
                this.updateItems(event.data);
            });

        // Optionally, you can fetch initial data from your API
        this.fetchData();
    },
    methods: {
        fetchData() {
            fetch('/api/items') // Adjust this endpoint as needed
                .then(response => response.json())
                .then(data => {
                    this.items = data;
                });
        },
        updateItems(updatedItem) {
            let index = this.items.findIndex(item => item.id === updatedItem.id);
            if (index !== -1) {
                this.$set(this.items, index, updatedItem);
            } else {
                this.items.push(updatedItem);
            }
        }
    }
});



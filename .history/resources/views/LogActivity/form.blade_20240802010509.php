<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Realtime</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pusher@7/dist/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
</head>
<body>
    <div id="app">
        <h1>Dashboard</h1>

        <form @submit.prevent="addActivity">
            <input type="text" v-model="newName" placeholder="Nama" required>
            <input type="text" v-model="newName" placeholder="Inisial" required>
            <input type="text" v-model="newActivity" placeholder="Aktivitas" required>
            <input type="date" v-model="newDate" required>
            <button type="submit">Add Activity</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Inisial</th>
                    <th>Aktivitas</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="activity in activities" :key="activity.id">
                    <td>{{ activity.id }}</td>
                    <td>{{ activity.name }}</td>
                    <td>{{ activity.activity }}</td>
                    <td>{{ activity.tanggal }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const app = new Vue({
                el: '#app',
                data: {
                    activities: @json($activities),
                    newName: '',
                    newActivity: '',
                    newDate: ''
                },
                methods: {
                    addActivity() {
                        axios.post('/logupdate', {
                            name: this.newName,
                            activity: this.newActivity,
                            date: this.newDate
                        })
                        .then(response => {
                            this.newName = '';
                            this.newActivity = '';
                            this.newDate = '';
                        })
                        .catch(error => console.error(error));
                    }
                },
                mounted() {
                    Pusher.logToConsole = true;

                    const pusher = new Pusher('your-pusher-app-key', {
                        cluster: 'your-pusher-app-cluster',
                        forceTLS: true
                    });

                    const channel = pusher.subscribe('activities');
                    channel.bind('App\\Events\\ActivityCreated', data => {
                        this.activities.push(data.activity);
                    });
                }
            });
        });
    </script>
</body>
</html>

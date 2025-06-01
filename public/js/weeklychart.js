document.addEventListener('DOMContentLoaded', function() {
    fetch('/admin/weekly')
    .then(response => response.json())
    .then(data => {
        const days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        const dataMap = {};

        days.forEach((day, index) => {
            dataMap[day] = 0;
        });

        data.forEach(item => {
            const dayIndex = (item.day + 5) % 7;
            dataMap[days[dayIndex]] = item.count;
        });

        const labels = Object.keys(dataMap);
        const counts = Object.values(dataMap);

        const ctx = document.getElementById('myChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Weekly User Registrations',
                    data: counts,
                    borderColor: 'rgba(255, 159, 64, 0.2)',
                    backgroundColor: '#01acf3',
                    borderWidth: 1,
                }]
            },
            options: {
                scales: {
                    y: {
                        suggestedMax: 10,
                    }
                }
            }
        });
    });
});

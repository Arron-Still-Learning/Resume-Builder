document.addEventListener('DOMContentLoaded', function() {
    fetch('/admin/monthly')
    .then(response => response.json())
    .then(data => {
        const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        const dataMap = {};

        months.forEach((month, index) => {
            dataMap[month] = 0;
        });

        data.forEach(item => {
            const monthIndex = item.month - 1;
            dataMap[months[monthIndex]] = item.count;
        });

        const labels = Object.keys(dataMap);
        const counts = Object.values(dataMap);

        const ctx = document.getElementById('myChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Monthly User Registrations',
                    data: counts,
                    borderColor: 'rgba(255, 159, 64, 0.2)',
                    backgroundColor: '#01acf3',
                    borderWidth: 1,
                }]
            },
            options: {
                scales: {
                    y: {
                        suggestedMax: 50,
                    }
                }
            }
        });
    });
});

import Chart from 'chart.js/auto'

const ctx = document.getElementById('myChart');

window.showChart = function showChart(users, events, articles) {
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Users', 'Events', 'Articles'],
            datasets: [{
                label: 'Total',
                data: [users, events, articles],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}


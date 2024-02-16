let currentPeriod = 'janvier';

const generateRandomData = (numPoints) => Array.from({ length: numPoints }, () => Math.floor(Math.random() * 1000));

const data = {
    janvier: generateRandomData(31),
    fevrier: generateRandomData(28),
    mars: generateRandomData(31),
    avril: generateRandomData(30),
    mai: generateRandomData(31),
    juin: generateRandomData(30),
    juillet: generateRandomData(31),
    aout: generateRandomData(31),
    septembre: generateRandomData(30),
    octobre: generateRandomData(31),
    novembre: generateRandomData(30),
    decembre: generateRandomData(31),
};

const ctx = document.getElementById('myChart').getContext('2d');
const gradient = ctx.createLinearGradient(0, 0, 0, 400);
gradient.addColorStop(0, 'rgba(67, 121, 238, 0.5)');
gradient.addColorStop(1, 'rgba(255, 255, 255, 0.01)');

const config = {
    type: 'line',
    data: {
        labels: Array.from({ length: 31 }, (_, i) => i + 1),
        datasets: [{
            label: 'Chiffre d\'affaire',
            data: data[currentPeriod],
            backgroundColor: gradient,
            borderColor: '#4379EE',
            borderWidth: 2,
            fill: true,
            pointBackgroundColor: '#4379EE', 
            pointBorderColor: '#4379EE',
            pointRadius: 3
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                stacked: true, 
                grid: {
                    color: '#ffffff00',
                },
                ticks: {
                    color: '#202224',
                }
            },
            x: {
                grid: {
                    color: '#ffffff00',
                },
                ticks: {
                    color: '#202224',
                }
            }
        },
        plugins: {
            legend: {
                display: false
            }
        }
    }
};

let myChart = new Chart(ctx, config);

document.getElementById('time-period').addEventListener('change', (e) => {
    const selectedMonth = e.target.value;
    myChart.data.datasets[0].data = data[selectedMonth];
    myChart.update();
});

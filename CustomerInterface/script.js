const ctx = document.querySelector('.activity-chart');
const ctx2 = document.querySelector('.prog-chart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
        datasets: [{
            label: 'Grading Activity',
            data: [5, 6, 7, 6, 10, 8, 4],
            backgroundColor: '#62bd69',
            borderWidth: 3,
            borderRadius: 6,
            hoverBackgroundColor: '#358856'
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            x: {
                border: {
                    display: true
                },
                grid: {
                    display: true,
                    color: '#1e293b'
                }
            },
            y: {
                ticks: {
                    display: false
                }
            }
        },
        plugins: {
            legend: {
                display: false
            }
        },
        animation: {
            duration: 1000,
            easing: 'easeInOutQuad',
        }
    }
});



MYPRODUCT

const products = [
    { name: 'Organic Apples', gradingStatus: 'Completed', gradeDate: '2024-11-20', transitStatus: 'In Transit' },
    { name: 'Fresh Carrots', gradingStatus: 'In Progress', gradeDate: '2024-11-23', transitStatus: 'Not Shipped' },
    { name: 'Grain Pack', gradingStatus: 'Completed', gradeDate: '2024-11-18', transitStatus: 'Delivered' }
];

const tableBody = document.querySelector('tbody');

products.forEach(product => {
    const row = document.createElement('tr');
    row.innerHTML = `
        <td>${product.name}</td>
        <td>${product.gradingStatus}</td>
        <td>${product.gradeDate}</td>
        <td>${product.transitStatus}</td>
        <td><button>${product.transitStatus === 'Not Shipped' ? 'Track' : 'View'}</button></td>
    `;
    tableBody.appendChild(row);
});





 var ctx = document.getElementById('maladiesChart').getContext('2d');

    // إنشاء مخطط دائري
    var maladiesChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Grippe', 'COVID-19', 'Diabète', 'Hypertension'],
            datasets: [{
                data: [25, 40, 15, 20], // قيم عشوائية
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0']
            }]
        }
    });

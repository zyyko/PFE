/* 
document.addEventListener('DOMContentLoaded', function() {

    // Dummy data for charts
    const totalReservationsData = {
        labels: ["January", "February", "March", "April", "May", "June"],
        datasets: [{
            label: "Total Reservations",
            data: [65, 59, 80, 81, 56, 55],
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    };

    const totalPricesData = {
        labels: ["January", "February", "March", "April", "May", "June"],
        datasets: [{
            label: "Total Prices",
            data: [28, 48, 40, 19, 86, 27],
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    };

    const totalInscriptionsData = {
        labels: ["January", "February", "March", "April", "May", "June"],
        datasets: [{
            label: "Total Inscriptions",
            data: [35, 25, 45, 30, 55, 20],
            backgroundColor: 'rgba(255, 206, 86, 0.2)',
            borderColor: 'rgba(255, 206, 86, 1)',
            borderWidth: 1
        }]
    };

    const typePercentageData = {
        labels: ["Type A", "Type B", "Type C"],
        datasets: [{
            label: "Type Percentage",
            data: [30, 40, 30],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    };

    // Create charts
    const totalReservationsChart = new Chart(document.getElementById('totalReservationsChart'), {
        type: 'bar',
        data: totalReservationsData,
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    const totalPricesChart = new Chart(document.getElementById('totalPricesChart'), {
        type: 'bar',
        data: totalPricesData,
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    const totalInscriptionsChart = new Chart(document.getElementById('totalInscriptionsPerMonth'), {
        type: 'line',
        data: totalInscriptionsData,
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    const typePercentageChart = new Chart(document.getElementById('typePercentage'), {
        type: 'pie',
        data: typePercentageData,
    });
    }); */
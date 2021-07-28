function monthlyIncome(monthly_income) {

    var monthly_income1 = JSON.parse("[" + monthly_income + "]");

    var ctx = document.getElementById('myChart1').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [{
                label: 'Monthly Income($)',
                data: monthly_income1,
                backgroundColor: ['#e80a68', '#d74340', '#8e3d87', '#40b9d7', '#26ab8d', '#7e5c3e', '#3e447e', '#638e3d', '#766677', '#f35df8', '#e49e23', '#f68b98'],
                borderWidth: 1
            }]
        },
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


};

function monthlyStudentRegistration(monthly_std_reg) {

    var monthly_std_reg1 = JSON.parse("[" + monthly_std_reg + "]");

    var ctx = document.getElementById('myChart2').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [{
                label: 'New Student Registration',
                data: monthly_std_reg1,
                borderColor: "#00c0ef",
                fill: false,
                borderWidth: 3
            }]
        },
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


};


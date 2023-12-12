$(document).ready(function () {

    var ctx = $('#myChart');
    var textColor = '#383838';
    var data = {'m01': 0,'m02': 0,'m03': 0,'m04': 0,'m05': 0,'m06': 0,'m07': 0,'m08': 0,'m09': 0,'m10': 0,'m11': 0,'m12': 0};

    vendaMes.forEach(element => {
        data[element]++;
    });

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            datasets: [{
            label: 'N° Vendas',
            data: [data['m01'],data['m02'],data['m03'],data['m04'],data['m05'],data['m06'],data['m07'],data['m08'],data['m09'],data['m10'],data['m11'],data['m12']],
            borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    ticks: {
                        stepSize: 1,
                        color: textColor
                    }
                },
                x: {
                    ticks: {
                        color: textColor
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        color: textColor
                    }
                }
            }
        }
    });      
});
window.dataSetsStyles = [
    {
        backgroundColor: "rgba(38, 185, 154, 0.31)",
        borderColor: "rgba(38, 185, 154, 0.7)",
        pointBorderColor: "rgba(38, 185, 154, 0.7)",
        pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
        pointHoverBackgroundColor: "#fff",
        pointHoverBorderColor: "rgba(220,220,220,1)",
        pointBorderWidth: 4,
        hitRadius:4,
        fill: false
    },
    {
        backgroundColor: "rgba(3, 88, 106, 0.3)",
        borderColor: "rgba(3, 88, 106, 0.70)",
        pointBorderColor: "rgba(3, 88, 106, 0.70)",
        pointBackgroundColor: "rgba(3, 88, 106, 0.70)",
        pointHoverBackgroundColor: "#fff",
        pointHoverBorderColor: "rgba(151,187,205,1)",
        pointBorderWidth: 4,
        hitRadius:4,
        fill: false
    }
];

window.defaultConfig = {
    type: 'line',
    data: {
        datasets: []
    },
    options: {
        responsive: true,
        title: {
            display: true,
            text: 'Gráfica'
        },
        scales: {
            xAxes: [{
                type: 'time',
                display: true
            }],
            yAxes: [{
                display: true,
            }]
        }
    }
};
function round(value, decimals) {
    return Number(Math.round(value+'e'+decimals)+'e-'+decimals);
}

window.charts = {};
window.configs = {};
$(function() {
    moment.updateLocale('es', {longDateFormat : {
        LL : 'D MMMM YYYY'
    }});

    var params = {
        'tension_arterial' : {'label' : 'Tensión arterial', 'unidad' : 'mmHg'},
        'frecuencia_cardiaca' : {'label' : 'Frecuencia cardiaca', 'unidad' : 'min'},
        'frecuencia_respiratoria' : {'label' : 'Frecuencia respiratora', 'unidad' : 'min'},
        'saturacion' : {'label' : 'Saturación O2', 'unidad' : '%'},
        'temperatura' : {'label' : 'Temperatura', 'unidad' : '°C'},
        'peso' : {'label' : 'Peso', 'unidad' : 'kg'}
    };
    for(var param in params){
        var config = JSON.parse(JSON.stringify(defaultConfig));
        var datasets = [];
        if(param == 'tension_arterial'){
            datasets = [
                Object.assign({}, dataSetsStyles[1], {
                    label: 'Sistólica',
                    data: graf_data.tension_arterial.sistolica,
                    param : params[param]
                }),
                Object.assign({}, dataSetsStyles[0], {
                    label: 'Diastólica',
                    data: graf_data.tension_arterial.diastolica,
                    param : params[param]
                })
            ]
        }else{
            datasets = [
                Object.assign({}, dataSetsStyles[1], {
                    label: params[param].label, data: graf_data[param], param : params[param]
                })
            ]
        }
        config.data.datasets = datasets;
        config.options.title.text = params[param].label;
        config.options.tooltips = {callbacks : { label : function(tooltipItem, data){
            var label = data.datasets[tooltipItem.datasetIndex].label + ': ';
            return label + tooltipItem.yLabel + " " + data.datasets[tooltipItem.datasetIndex].param.unidad;
        }}};
        config.options.scales.yAxes[0].ticks = {
            param : params[param],
            callback: function(value, index, values) {
                return round(value, 2) + " " + this.param.unidad;
            }
        };

        window.configs[param] = config;
    }

    var ctx = document.getElementById('tension_arterial').getContext('2d');
    window.charts['tension_arterial'] = new Chart(ctx, window.configs['tension_arterial']);

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var $target = $(e.target);
        var param = $target.attr('href').replace('_tab', '').replace('#', '');
        if(typeof window.charts[param] == "undefined"){
            ctx = document.getElementById(param).getContext('2d');
            window.charts[param] = new Chart(ctx, window.configs[param]);
        }
    })
});

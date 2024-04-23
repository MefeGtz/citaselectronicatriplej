const chart = Highcharts.chart('containerbar', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Desempeño Tecnicos',
        //align: 'left'
    },
    xAxis: {
        categories: [],
        crosshair: true,
    },
    yAxis: {
        min: 0,
        title: {
            useHTML: true,
            text: 'Citas atendidas'
        }
    },
    tooltip: {
        valueSuffix: ''
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: []
});

//funcion encargaa de pedir informacion al servidor
function fetchData() {
    //Fetch API
    fetch('/graficas/datatec')
        .then(function (response) {
            return response.json();
        })
        .then(function (myJson) {
            // console.log(myJson);
            chart.xAxis[0].setCategories(myJson.categories);
            chart.addSeries(myJson.series[0]);//citas finalizadas
            chart.addSeries(myJson.series[1]);//citas canceladas
        });

}

$(function () {
    fetchData();
});
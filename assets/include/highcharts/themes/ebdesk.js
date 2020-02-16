/**
 * eBdesk theme for Highcharts JS
 * @author eBdesk Frontend Team
 */
Highcharts.theme = {
//    colors: ["#376092", "#7798BF", "#55BF3B", "#DF5353", "#aaeeee", "#ff0066"],
    global: {
        useUTC: false
    },
    lang: {
        thousandsSep: ",",
        decimalPoint: ".",
        tooltipButton: "Back to up",
        drillUpText: 'Back'
    },
    credits: {
        enabled: false
    },
    chart: {
        style: {
            fontFamily: "Arial",
            fontSize: '15px'
        },
        spacingBottom: 5,
        backgroundColor: "transparent"
    },
    exporting: {
        buttons: {
            contextButton: {
                enabled: false
            }
        }
    },
    title: {
        style: {
            color: '#C0C0C0',
            font: 'bold 16px "Arial", "Trebuchet MS", Verdana, sans-serif'
        }
    },
    legend: {
        itemStyle: {
            fontSize: '0.7em'
        }
    },
    tooltip: {
        style: {
            fontSize: '0.7em'
        },
        itemStyle: {
            fontSize: '0.7em'
        }
    },
    subtitle: {
        style: {
            color: '#666666',
            font: 'bold 12px "Open Sans", "Trebuchet MS", Verdana, sans-serif',
            fontSize: '1.1em'
        }
    },
    xAxis: {
        labels: {
            style: {
                color: "#333",
                fontSize: '0.7em'
            },
            autoRotation: false
        }
    },
    yAxis: {
        gridLineColor: '#eee',
        labels: {
            style: {
                color: "#333",
                fontSize: '0.7em'
            },
            autoRotation: false
        },
        stackLabels: {
            style: {
                fontSize: '0.7em'
            }
        }
    },
    plotOptions: {
        column: {
            borderWidth: 0
        },
        area: {
            marker: {
                enabled: false
            }
        },
        pie: {
            borderWidth: 0
        }
    }
};

// Apply the theme
var highchartsOptions = Highcharts.setOptions(Highcharts.theme);

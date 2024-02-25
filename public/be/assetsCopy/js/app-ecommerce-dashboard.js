
function drawTotalIncomeChart() {
    let monthValues = {};

    for (let i = 1; i <= 12; i++){
        monthValues['month_' + i] = document.getElementById(i).value;
    }

    let dataArrayTotalIncomeChart = [];

    for (let i = 1; i <= 12; i++) {
        dataArrayTotalIncomeChart.push(monthValues['month_' + i]);
    }
    let o, e, r, t, s, a, i, n, l;
    l = isDarkStyle ? (o = config.colors_dark.cardColor, e = config.colors_dark.headingColor, r = config.colors_dark.textMuted, s = config.colors_dark.borderColor, t = "dark", a = "#4f51c0", i = "#595cd9", n = "#8789ff", "#c3c4ff") : (o = config.colors.cardColor, e = config.colors.headingColor, r = config.colors.textMuted, s = config.colors.borderColor, t = "", a = "#e1e2ff", i = "#c3c4ff", n = "#a5a7ff", "#696cff");

    var totalIncomeChart = document.querySelector("#totalIncomeChart");
    var chartOptions = {
        chart: {
            height: 250,
            type: "area",
            toolbar: false,
            dropShadow: {
                enabled: true,
                top: 14,
                left: 2,
                blur: 3,
                color: config.colors.primary,
                opacity: 0.15
            }
        },
        series: [{data: dataArrayTotalIncomeChart}],
        dataLabels: {enabled: false},
        stroke: {width: 3, curve: "straight"},
        colors: [config.colors.primary],
        fill: {
            type: "gradient",
            gradient: {
                shade: t,
                shadeIntensity: 0.8,
                opacityFrom: 0.7,
                opacityTo: 0.25,
                stops: [0, 95, 100]
            }
        },
        grid: {
            show: true,
            borderColor: s,
            padding: {top: -15, bottom: -10, left: 0, right: 0}
        },
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            labels: {offsetX: 0, style: {colors: r, fontSize: "13px"}},
            axisBorder: {show: false},
            axisTicks: {show: false},
            lines: {show: false}
        },
        yaxis: {
            labels: {
                offsetX: -15,
                formatter: function (o) {
                    return "₫" + (o / 1000).toLocaleString("vi-VN") + "k";
                },
                style: {fontSize: "13px", colors: r}
            },
            min: 0,
            max: 10000000,
            tickAmount: 5
        }
    };

    if (totalIncomeChart !== null) {
        new ApexCharts(totalIncomeChart, chartOptions).render();
    }
}

function drawPerformanceChart() {

    let monthValues = {};

    for (let i = 1; i <= 12; i++){
        monthValues['month_' + i] = document.getElementById(i).value;
    }

    let dataArrayPerformanceChart = [];

    for (let i = 1; i <= 12; i++) {
        dataArrayPerformanceChart.push(monthValues['month_' + i]);
    }
 // --------------------------------------------------------------
    let monthValuesLastYear = {};
    for (let i = 1; i <= 12; i++){
        monthValuesLastYear['lastYear_' + i] = document.querySelector('#lastYear_'+i).value;
    }

    let dataArrayTotalIncomeChartLastYear = [];

    for (let i = 1; i <= 12; i++) {
        dataArrayTotalIncomeChartLastYear.push(monthValuesLastYear['lastYear_' + i]);
    }
    console.log(dataArrayTotalIncomeChartLastYear);
    let o, e, r, t, s, a, i, n, l;
    l = isDarkStyle ? (o = config.colors_dark.cardColor, e = config.colors_dark.headingColor, r = config.colors_dark.textMuted, s = config.colors_dark.borderColor, t = "dark", a = "#4f51c0", i = "#595cd9", n = "#8789ff", "#c3c4ff") : (o = config.colors.cardColor, e = config.colors.headingColor, r = config.colors.textMuted, s = config.colors.borderColor, t = "", a = "#e1e2ff", i = "#c3c4ff", n = "#a5a7ff", "#696cff");

    var performanceChart = document.querySelector("#performanceChart");
    var chartOptions = {
        series: [
            {name: "Năm trước", data:  dataArrayTotalIncomeChartLastYear},
            {name: "Năm Hiện tại", data: dataArrayPerformanceChart}
        ],
        chart: {
            height: 270,
            type: "radar",
            toolbar: {show: false},
            dropShadow: {
                enabled: true,
                enabledOnSeries: undefined,
                top: 6,
                left: 0,
                blur: 6,
                color: "#000",
                opacity: 0.14
            }
        },
        plotOptions: {radar: {polygons: {strokeColors: s, connectorColors: s}}},
        stroke: {show: false, width: 0},
        legend: {
            show: true,
            fontSize: "13px",
            position: "bottom",
            labels: {colors: "#aab3bf", useSeriesColors: false},
            markers: {height: 10, width: 10, offsetX: -3},
            itemMargin: {horizontal: 10},
            onItemHover: {highlightDataSeries: false}
        },
        colors: [config.colors.primary, config.colors.info],
        fill: {opacity: [1, 0.85]},
        markers: {size: 0},
        grid: {show: false, padding: {top: -8, bottom: -5}},
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            labels: {show: true, style: {colors: [r, r, r, r, r, r], fontSize: "13px", fontFamily: "Public Sans"}}
        },
        yaxis: {show: false, min: 0, max: 5000000, tickAmount: 4}
    };

    if (performanceChart !== null) {
        new ApexCharts(performanceChart, chartOptions).render();
    }
}

function drawConversionRateChart() {
    let o, e, r, t, s, a, i, n, l;
    l = isDarkStyle ? (o = config.colors_dark.cardColor, e = config.colors_dark.headingColor, r = config.colors_dark.textMuted, s = config.colors_dark.borderColor, t = "dark", a = "#4f51c0", i = "#595cd9", n = "#8789ff", "#c3c4ff") : (o = config.colors.cardColor, e = config.colors.headingColor, r = config.colors.textMuted, s = config.colors.borderColor, t = "", a = "#e1e2ff", i = "#c3c4ff", n = "#a5a7ff", "#696cff");

    var conversionRateChart = document.querySelector("#conversionRateChart");
    var chartOptions = {
        chart: {
            height: 80,
            width: 140,
            type: "line",
            toolbar: {show: false},
            dropShadow: {
                enabled: true,
                top: 10,
                left: 5,
                blur: 3,
                color: config.colors.primary,
                opacity: 0.15
            },
            sparkline: {enabled: true}
        },
        markers: {
            size: 6,
            colors: "transparent",
            strokeColors: "transparent",
            strokeWidth: 4,
            discrete: [{
                fillColor: config.colors.white,
                seriesIndex: 0,
                dataPointIndex: 3,
                strokeColor: config.colors.primary,
                strokeWidth: 4,
                size: 6,
                radius: 2
            }],
            hover: {size: 7}
        },
        grid: {show: false, padding: {right: 8}},
        colors: [config.colors.primary],
        dataLabels: {enabled: false},
        stroke: {width: 5, curve: "smooth"},
        series: [{data: [137, 210, 160, 245]}],
        xaxis: {show: false, lines: {show: false}, labels: {show: false}, axisBorder: {show: false}},
        yaxis: {show: false}
    };

    if (conversionRateChart !== null) {
        new ApexCharts(conversionRateChart, chartOptions).render();
    }
}

function drawExpensesBarChart() {
    let o, e, r, t, s, a, i, n, l;
    l = isDarkStyle ? (o = config.colors_dark.cardColor, e = config.colors_dark.headingColor, r = config.colors_dark.textMuted, s = config.colors_dark.borderColor, t = "dark", a = "#4f51c0", i = "#595cd9", n = "#8789ff", "#c3c4ff") : (o = config.colors.cardColor, e = config.colors.headingColor, r = config.colors.textMuted, s = config.colors.borderColor, t = "", a = "#e1e2ff", i = "#c3c4ff", n = "#a5a7ff", "#696cff");

    var expensesBarChart = document.querySelector("#expensesBarChart");
    var chartOptions = {
        series: [{name: "2021", data: [15, 37, 14, 30, 38, 30, 20, 13, 14, 23]}, {
            name: "2020",
            data: [-33, -23, -29, -21, -25, -21, -23, -19, -37, -22]
        }],
        chart: {height: 150, stacked: true, type: "bar", toolbar: {show: false}},
        plotOptions: {bar: {horizontal: false, columnWidth: "40%", borderRadius: 5, startingShape: "rounded"}},
        colors: [config.colors.primary, config.colors.warning],
        dataLabels: {enabled: false},
        stroke: {curve: "smooth", width: 2, lineCap: "round", colors: [o]},
        legend: {show: false},
        grid: {show: false, padding: {top: -10}},
        xaxis: {
            show: false,
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
            labels: {show: false},
            axisTicks: {show: false},
            axisBorder: {show: false}
        },
        yaxis: {show: false},
        responsive: [{
            breakpoint: 1440,
            options: {plotOptions: {bar: {borderRadius: 5, columnWidth: "60%"}}}
        }, {breakpoint: 1300, options: {plotOptions: {bar: {borderRadius: 5, columnWidth: "70%"}}}}, {
            breakpoint: 1200,
            options: {plotOptions: {bar: {borderRadius: 4, columnWidth: "50%"}}}
        }, {breakpoint: 1040, options: {plotOptions: {bar: {borderRadius: 4, columnWidth: "60%"}}}}, {
            breakpoint: 991,
            options: {plotOptions: {bar: {borderRadius: 4, columnWidth: "40%"}}}
        }, {breakpoint: 420, options: {plotOptions: {bar: {borderRadius: 5, columnWidth: "60%"}}}}, {
            breakpoint: 360,
            options: {plotOptions: {bar: {borderRadius: 5, columnWidth: "70%"}}}
        }],
        states: {hover: {filter: {type: "none"}}, active: {filter: {type: "none"}}}
    };

    if (expensesBarChart !== null) {
        new ApexCharts(expensesBarChart, chartOptions).render();
    }
}

function drawTotalBalanceChart() {
    let o, e, r, t, s, a, i, n, l;
    l = isDarkStyle ? (o = config.colors_dark.cardColor, e = config.colors_dark.headingColor, r = config.colors_dark.textMuted, s = config.colors_dark.borderColor, t = "dark", a = "#4f51c0", i = "#595cd9", n = "#8789ff", "#c3c4ff") : (o = config.colors.cardColor, e = config.colors.headingColor, r = config.colors.textMuted, s = config.colors.borderColor, t = "", a = "#e1e2ff", i = "#c3c4ff", n = "#a5a7ff", "#696cff");

    var totalBalanceChart = document.querySelector("#totalBalanceChart");
    var chartOptions = {
        series: [{data: [137, 210, 160, 275, 205, 315]}],
        chart: {
            height: 250,
            parentHeightOffset: 0,
            parentWidthOffset: 0,
            type: "line",
            dropShadow: {enabled: true, top: 10, left: 5, blur: 3, color: config.colors.warning, opacity: .15},
            toolbar: {show: false}
        },
        dataLabels: {enabled: false},
        stroke: {width: 4, curve: "smooth"},
        legend: {show: false},
        colors: [config.colors.warning],
        markers: {
            size: 6,
            colors: "transparent",
            strokeColors: "transparent",
            strokeWidth: 4,
            discrete: [{
                fillColor: config.colors.white,
                seriesIndex: 0,
                dataPointIndex: 5,
                strokeColor: config.colors.warning,
                strokeWidth: 8,
                size: 6,
                radius: 8
            }],
            hover: {size: 7}
        },
        grid: {show: false, padding: {top: -10, left: 0, right: 0, bottom: 10}},
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
            axisBorder: {show: false},
            axisTicks: {show: false},
            labels: {show: true, style: {fontSize: "13px", colors: r}}
        },
        yaxis: {labels: {show: false}}
    };

    if (totalBalanceChart !== null) {
        new ApexCharts(totalBalanceChart, chartOptions).render();
    }
}

window.addEventListener("load", function() {
    drawTotalIncomeChart();
    drawPerformanceChart();
    drawConversionRateChart();
    drawExpensesBarChart();
    drawTotalBalanceChart();
});

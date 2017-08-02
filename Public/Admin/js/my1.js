var chart;
var legend;

var chartData = [{
    country: "策略类",
    value: 260},
{
    country: "冒险类",
    value: 201},
{
    country: "益智类",
    value: 65},
{
    country: "体育类",
    value: 39},
{
    country: "动作类",
    value: 19},
{
    country: "射击类",
    value: 10}];

AmCharts.ready(function() {
    // 饼图
    chart = new AmCharts.AmPieChart();
    chart.dataProvider = chartData;
    chart.titleField = "country";
    chart.valueField = "value";
    chart.outlineColor = "";
    chart.outlineAlpha = 0.8;
    chart.outlineThickness = 2;
    // 3D
    chart.depth3D = 20;
    chart.angle = 30;

    // 图形写入
    chart.write("chartdiv");
});
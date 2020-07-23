<!DOCTYPE html>
<html lang="ja">
<head>
    @include('components.chartHeader', ['title' => $param['year'] . '年' . $param['month'] . '月　日別の経費計上合計金額のグラフ'])
</head>
<body>
    @include('components.CallChartJs')
    <canvas id="myLineGraph"></canvas>

    <script type="text/javascript">
        var costData = @json($lineGraphData);
        var labelData = @json($param);
        // 日付の配列を用意
        var dataDates = new Array();
        costData.forEach(function(item, index, array){
            dataDates[index] = costData[index]['day'];
        });
        // 経費計上額の配列を用意
        var dataCosts = new Array();
        costData.forEach(function(item, index, array){
            dataCosts[index] = costData[index]['dayAmount'];
        });

        var ctx = document.getElementById('myLineGraph').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: dataDates,
                datasets: [{
                    label: labelData['year'] + "年" + labelData['month'] + "月" + "日別の経費計上累計金額 (単位：円)",
                    type: "line",
                    fill: false,
                    data: dataCosts,
                    borderColor: "rgb(255, 69, 0)",
                    yAxisID: "y-axis-1",
                }]
            },
            options: {
                tooltips: {
                    mode: 'nearest',
                    intersect: false,
                },
                responsive: true,
                scales: {
                    yAxes: [{
                        id: "y-axis-1",
                        type: "linear",
                        position: "left",
                        ticks: {
                            max: 70000, // ここにマックスの金額を渡して調整する
                            min: 0,
                            stepSize: 2000
                        },
                    }],
                },
            }
        });
    </script>
    <br>
    <br>
    @include('components.linkToTop')
</body>
</html>

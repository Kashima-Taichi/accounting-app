<!DOCTYPE html>
<html lang="ja">
<head>
    @include('components.chartHeader', ['title' => '過去' . $request . '日間の経費計上折れ線グラフの参照'])
</head>
<body>
    @include('components.CallChartJs')
    <canvas id="myLineGraph"></canvas>

    <script type="text/javascript">
        var costData = @json($lineGraphData);
        costData.reverse();
        var labelData = @json($request);
        // 日付の配列を用意
        var dataDates = new Array();
        costData.forEach(function(item, index, array){
            dataDates[index] = costData[index]['date'];
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
                    label: "過去" + labelData + "日間の経費計上折れ線グラフの参照 (単位：円)",
                    type: "line",
                    fill: false,
                    data: dataCosts,
                    borderColor: "rgb(154, 162, 235)",
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
                            max: 40000, // ここにマックスの金額を渡して調整する
                            min: -40000,
                            stepSize: 1000
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

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/style/pieChart.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
    <title>{{ $param['year'] }}年{{ $param['month'] }}月経費計上折れ線グラフの参照</title>
</head>
<body>
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
                    label: labelData['year'] + "年" + labelData['month'] + "月" + "経費計上折れ線グラフ日別推移 (単位：円)",
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

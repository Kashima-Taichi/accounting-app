<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/style/pieChart.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
    <title>{{ $param }}の計上推移</title>
</head>
<body>
    <canvas id="myLineGraph"></canvas>

    <script type="text/javascript">
        var costData = @json($lineGraphData);
        var labelData = @json($param);
        // 年月の配列を用意
        var dataDates = new Array();
        costData.forEach(function(item, index, array){
            dataDates[index] = costData[index]['yearMonth'];
        });
        // 経費計上額の配列を用意
        var dataCosts = new Array();
        costData.forEach(function(item, index, array){
            dataCosts[index] = costData[index]['amount'];
        });

        var ctx = document.getElementById('myLineGraph').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: dataDates,
                datasets: [{
                    label: labelData　+ "の計上推移",
                    type: "line",
                    fill: true,
                    data: dataCosts,
                    borderColor: "rgb(198, 255, 170)",
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
                            max: 50000, // ここにマックスの金額を渡して調整する
                            min: 0,
                            stepSize: 5000
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

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/style/Chart.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
    <title>稼働時間の計上推移</title>
</head>
<body>
    <canvas id="myLineGraph"></canvas>

    <script type="text/javascript">
        var hourData = @json($hourData);
        // 年月の配列を用意
        var dataDates = new Array();
        hourData.forEach(function(item, index, array){
            dataDates[index] = hourData[index]['yearMonth'];
        });
        // 総労働時間の配列を用意
        var dataTotalHours = new Array();
        hourData.forEach(function(item, index, array){
            dataTotalHours[index] = hourData[index]['fixedTime'] + hourData[index]['overTime'];
        });

        var ctx = document.getElementById('myLineGraph').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                // X軸のデータに対応するラベルの指定
                labels: dataDates,
                datasets: [{
                    // グラフのタイトル
                    label: "稼働時間の計上推移",
                    type: "line",
                    fill: false,
                    // グラフで使用する数値データ
                    data: dataTotalHours,
                    borderColor: "rgb(176, 196, 222)",
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
                            // Y軸の最大値
                            max: 300,
                            // Yの最小値
                            min: 0,
                            // 間隔
                            stepSize: 30
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

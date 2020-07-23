<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/style/Chart.css') }}">
    <title>手取り金額の計上推移</title>
</head>
<body>
    @include('components.CallChartJs')
    <canvas id="myLineGraph"></canvas>

    <script type="text/javascript">
        var incomeData = @json($incomeData);
        // 年月の配列を用意
        var dataDates = new Array();
        incomeData.forEach(function(item, index, array){
            dataDates[index] = incomeData[index]['yearMonth'];
        });
        // 手取り計上額の配列を用意
        var dataNetincome = new Array();
        incomeData.forEach(function(item, index, array){
            dataNetincome[index] = incomeData[index]['netIncome'];
        });

        var ctx = document.getElementById('myLineGraph').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                // X軸のデータに対応するラベルの指定
                labels: dataDates,
                datasets: [{
                    // グラフのタイトル
                    label: "手取り額の計上推移",
                    type: "line",
                    fill: false,
                    // グラフで使用する数値データ
                    data: dataNetincome,
                    borderColor: "rgb(255, 127, 80)",
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
                            max: 300000,
                            // Yの最小値
                            min: 0,
                            // 間隔
                            stepSize: 30000
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

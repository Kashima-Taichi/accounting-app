<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/style/Chart.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
    <title>経費計上折れ線グラフの参照(複数月)</title>
</head>
<body>
    <canvas id="myLineGraph"></canvas>

    <script type="text/javascript">
        var costData = @json($lineGraphData);
        var costDataMinusOne = @json($lineGraphDataMinusOne);
        var labelData = @json($param);
        // 日付の配列を用意
        var dataDates = new Array();
        costData.forEach(function(item, index, array){
            dataDates[index] = costData[index]['day'];
        });
        // 経費計上額の配列を用意(当月)
        var dataCosts = new Array();
        costData.forEach(function(item, index, array){
            dataCosts[index] = costData[index]['dayAmount'];
        });
        // 経費計上額の配列を用意(マイナス1月)
        var dataCostsMInusOne = new Array();
        costDataMinusOne.forEach(function(item, index, array){
            dataCostsMInusOne[index] = costDataMinusOne[index]['dayAmount'];
        });

        var ctx = document.getElementById('myLineGraph').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                    labels: dataDates,
                    datasets: [{
                        // 選択月
                        label: labelData['year'] + "年" + labelData['month'] + "月" + "経費計上実績 (単位：円)",
                        type: "line",
                        fill: false,
                        data: dataCosts,
                        borderColor: "rgb(154, 162, 235)",
                        yAxisID: "y-axis-1",
                    }, 
                    {
                        // 選択月マイナス1
                        label: labelData['year'] + "年" + (labelData['month'] - 1) + "月" + "経費計上実績 (単位：円)",
                        type: "line",
                        fill: false,
                        data: dataCostsMInusOne,
                        borderColor: "rgb(0, 191, 255)",
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

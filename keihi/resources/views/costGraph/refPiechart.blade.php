<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/style/Chart.css') }}">
    <title>{{ $param['year'] }}年{{ $param['month'] }}月経費計上円グラフの参照</title>
</head>
<body>
    <canvas id="myPieChart"></canvas>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>

    <script>
        // コントローラーから取得した配列データのjs変換
        var Data = @json($piechartData);
        var DataYearMonth = @json($param);
        // 科目名の配列を用意
        var DataAccountname = new Array();
        Data.forEach(function(item, index, array){
            DataAccountname[index] = Data[index]['accountName'];
        });
        // 経費計上額の配列を用意
        var DataAmount = new Array();
        var DataTotal = 0;
        Data.forEach(function(item, index, array){
            DataAmount[index] = Data[index]['accountAmount'];
            DataTotal += parseInt(Data[index]['accountAmount']);
        });
        // 色彩データの配列を用意
        var colorData = @json(config('colorMst'));
        var DataColor = new Array();
        for (let i = 0; i < Data.length; i++) {
            DataColor[i] = colorData[i];
        }
        // 円グラフの描画
        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                // 科目名の配列
                labels: DataAccountname,
                datasets: [{
                    // 色彩の配列
                    backgroundColor: DataColor,
                    // 経費計上金額の配列
                    data: DataAmount
                }]
            },
            options: {
                title: {
                    display: true,
                    text: DataYearMonth['year'] + "年" + DataYearMonth['month'] + "月" + "経費計上円グラフ (単位：円)　計上金額合計：" + DataTotal.toLocaleString() + " 円"
                }
            }
        });
    </script>
    @include('components.linkToTop')
</body>
</html>

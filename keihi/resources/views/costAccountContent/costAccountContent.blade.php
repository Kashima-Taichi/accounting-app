<!DOCTYPE html>
<html lang="ja">
<head>
    @include('components.header', ['title' => '科目別経費明細の参照'])
</head>
<body>
<h2>{{ $extractedYear }}年{{ $extractedMonth }}月に計上された{{ $extractedAccountName }}の内訳</h2>
    <table border="1" style="border-collapse: collapse" align="center">
    <tr>
    <th class="id">id</th>
    <th class="accName">科目名称</th>
    <th class="price">金額</th>
    <th class="journal">摘要</th>
    <th class="day">計上日</th>
    </tr>
        @foreach ($extractedCosts as $extractedCost)
            <tr>
                <td>{{ $extractedCost->id }}</td>
                <td>{{ $extractedCost->accountName }}</td>
                <td><?php echo number_format($extractedCost->price); ?></td>
                <td>{{ $extractedCost->journal }}</td>
                <td>{{ $extractedCost->day }}</td>
            </tr>
        @endforeach
    </table>
    <br>
    <p>科目別計上金額合計：<?php echo number_format($extractedCostAmount); ?>円</p>
    <br>
    @include('components.linkToTop')
</body>
</html>

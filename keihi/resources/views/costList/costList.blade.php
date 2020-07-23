<!DOCTYPE html>
<html lang="ja">
<head>
    @include('components.header', ['title' => '経費明細の参照'])
</head>
<body>
    @if (count($costLists) == 0)
    <h2>指定された年月日に経費の計上実績はありません。</h2>
    @else
    <h2>{{ $selectedYear }}年{{ $selectedMonth }}月<?= $selectedDay !== 'select' ? $selectedDay . '日' : ''; ?>経費計上明細</h2>
    <table border="1" style="border-collapse: collapse" align="center">
    <tr>
    <th class="id">id</th>
    <th class="accName">科目名称</th>
    <th class="price">金額</th>
    <th class="journal">摘要</th>
    <th class="day">計上日</th>
    </tr>
        @foreach ($costLists as $costList)
            <tr>
                <td><a id="link" href="{{ action('CostListController@getIndividualCost', $costList->id) }}">{{ $costList->id }}</a></td>
                <td>{{ $costList->accountName }}</td>
                <td><?php echo number_format($costList->price); ?></td>
                <td>{{ $costList->journal }}</td>
                <td>{{ $costList->day }}</td>
            </tr>
        @endforeach
    </table>
    <br>
    <p>計上金額合計：<?php echo number_format($costAmounts); ?>円</p>
    <br>
    @endif
    @include('components.linkToTop')
</body>
</html>

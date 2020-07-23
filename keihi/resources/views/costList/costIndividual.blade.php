<!DOCTYPE html>
<html lang="ja">
<head>
    @include('components.header', ['title' => '個別の経費明細の参照'])
</head>
<body>
<h2>id:{{ $individualContents->id }}の経費計上明細</h2>
    <table border="1" style="border-collapse: collapse" align="center">
    <tr>
    <th class="id">id</th>
    <th class="accName">科目名称</th>
    <th class="price">金額</th>
    <th class="journal">摘要</th>
    <th class="year">計上年</th>
    <th class="month">計上月</th>
    <th class="day">計上日</th>
    </tr>
            <tr>
                <td>{{ $individualContents->id }}</td>
                <td>{{ $individualContents->accountName }}</td>
                <td><?= number_format($individualContents->price); ?></td>
                <td>{{ $individualContents->journal }}</td>
                <td>{{ $individualContents->year }}</td>
                <td>{{ $individualContents->month }}</td>
                <td>{{ $individualContents->day }}</td>
            </tr>
    </table>
    <br>
    <div class="edit-or-del">
        <button><a href="{{ action('CostListController@costDelete', $individualContents->id) }}">この経費明細を削除する(※このボタンを押すと現在ご覧の経費明細は削除されます)</a></button>
        <button><a href="{{ action('CostListController@costEdit', $individualContents->id) }}">この経費明細を修正する</a></button>
    </div>
    <br>
    @include('components.linkToTop')
    </body>
</html>

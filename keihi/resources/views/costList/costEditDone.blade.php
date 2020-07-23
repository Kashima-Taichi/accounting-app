<!DOCTYPE html>
<html lang="ja">
<head>
    @include('components.header', ['title' => '経費の修正が完了しました'])
</head>
<body>
<h2>id:{{ $editedRecord->id }}の経費計上明細が修正できました</h2>
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
                <td>{{ $editedRecord->id }}</td>
                <td>{{ $editedRecord->accountName }}</td>
                <td><?php echo number_format($editedRecord->price); ?></td>
                <td>{{ $editedRecord->journal }}</td>
                <td>{{ $editedRecord->year }}</td>
                <td>{{ $editedRecord->month }}</td>
                <td>{{ $editedRecord->day }}</td>
            </tr>
    </table>
    <br>
    @include('components.linkToTop')
</body>
</html>

<!DOCTYPE html>
<html lang="ja">
<head>
    @include('components.header', ['title' => '稼働時間の計上明細'])
</head>
<body>
    <h2>稼働時間の計上明細</h2>
    <table border="1" style="border-collapse: collapse">
    <tr>
    <th class="id">id</th>
    <th class="year">計上年</th>
    <th class="month">計上月</th>
    <th class="fixedTime">定時間</th>
    <th class="overTime">残業時間</th>
    <th class="totalTime">総時間</th>
    </tr>
        <tr>
            <td>{{ $individualAttendance->id }}</td>
            <td>{{ $individualAttendance->year }}</td>
            <td>{{ $individualAttendance->month }}</td>
            <td>{{ $individualAttendance->fixedTime }}</td>
            <td>{{ $individualAttendance->overTime }}</td>
            <td>{{ $individualAttendance->fixedTime + $individualAttendance->overTime }}</td>
        </tr>
    </table>
    <br>
    <div class="edit-or-del">
        <button><a href="{{ action('WorkingHoursController@workingHoursDelete', $individualAttendance->id) }}">この計上した時間を削除する(※このボタンを押すと現在ご覧の経費明細は削除されます)</a></button>
        <button><a href="{{ action('WorkingHoursController@workingHoursEdit', $individualAttendance->id) }}">この計上した時間を修正する</a></button>
    </div>
    <br>
    @include('components.linkToTop')
</body>
</html>

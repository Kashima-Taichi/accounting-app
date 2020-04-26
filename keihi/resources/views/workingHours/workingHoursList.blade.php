<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/style/common.css') }}">
    <script src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('/js/common.js') }}"></script>
    <title>経費明細の参照</title>
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
        @foreach ($attendanceData as $attendanceDatum)
            <tr>
                <td><a id="link" href="{{ action('WorkingHoursController@IndividualHours', $attendanceDatum->id) }}">{{ $attendanceDatum->id }}</a></td>
                <td>{{ $attendanceDatum->year }}</td>
                <td>{{ $attendanceDatum->month }}</td>
                <td>{{ $attendanceDatum->fixedTime }}</td>
                <td>{{ $attendanceDatum->overTime }}</td>
                <td>{{ $attendanceDatum->fixedTime + $attendanceDatum->overTime }}</td>
            </tr>
        @endforeach
    </table>
    <br>
    @include('components.linkToTop')
</body>
</html>

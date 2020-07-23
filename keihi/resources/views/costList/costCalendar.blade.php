<!DOCTYPE html>
<html lang="ja">
<head>
    @include('components.header', ['title' => '経費計上カレンダーの参照'])
    <link rel="stylesheet" href="{{ asset('/style/calendar.css') }}">
</head>
<body>
    <h2>{{ $year }}年{{ $month }}月経費計上カレンダー</h2>
    <div class="calendarBody">
    <table border="1" style="border-collapse: collapse" align="center">
        <thead>
            <tr>
                <th class="calendarTop">日</th>
                <th class="calendarTop">月</th>
                <th class="calendarTop">火</th>
                <th class="calendarTop">水</th>
                <th class="calendarTop">木</th>
                <th class="calendarTop">金</th>
                <th class="calendarTop">土</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @for ($i = 0; $i < 7; $i++)
                <td height="70">{{ $calendarData[$i]['calendarData'] }}<br>{{ $calendarData[$i]['price'] }}</td>
                @endfor
            </tr>
            <tr>
                @for ($j = 7; $j < 14; $j++)
                <td height="70">{{ $calendarData[$j]['calendarData'] }}<br>{{ $calendarData[$j]['price'] }}</td>
                @endfor            
            </tr>
            <tr>
                @for ($k = 14; $k < 21; $k++)
                <td height="70">{{ $calendarData[$k]['calendarData'] }}<br>{{ $calendarData[$k]['price'] }}</td>
                @endfor            
            </tr>
            <tr>
                @for ($l = 21; $l < 28; $l++)
                <td height="70">{{ $calendarData[$l]['calendarData'] }}<br>{{ $calendarData[$l]['price'] }}</td>
                @endfor            
            </tr>
            <tr>
                @for ($m = 28; $m < 35; $m++)
                <td height="70">{{ $calendarData[$m]['calendarData'] }}<br>{{ $calendarData[$m]['price'] }}</td>
                @endfor            
            </tr>
            @if (count($calendarData) > 35)
                <tr>
                    @for ($n = 35; $n < count($calendarData); $n++)
                        <td height="70">{{ $calendarData[$n]['calendarData'] }}<br>{{ $calendarData[$n]['price'] }}</td>
                    @endfor
                </tr>
            @endif
        </tbody>
    </table>
    </div>
    @include('components.linkToTop')
</body>
</html>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/style/common.css') }}">
    <link rel="stylesheet" href="{{ asset('/style/refpl.css') }}">
    <script src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
    <title>個人PL参照</title>
</head>
<body>
    <h2>{{ $param['year'] }}年{{ $param['month'] }}月度個人PL</h2>
    <table border="1" style="border-collapse: collapse" align="center">
    <tr>
    <th class="accName">項目</th>
    <th class="price">金額</th>
    </tr>

    @if (!empty($salaryForPL) === true)
    <tr class="netincome">
        <td>手取給与</td>
        <td class="net-income"><?= number_format($salaryForPL->netIncome); ?></td>
    </tr>
    @endif

    @if (!empty($costsForPL) === true)
        <?php $cost = 0; ?>
        @foreach ($costsForPL as $costForPL)
        <tr>
            <td>{{ $costForPL->accountName }}</td>
            <td><?= number_format($costForPL->accountAmount); ?></td>
        </tr>
        <?php $cost += $costForPL->accountAmount; ?>
        @endforeach
    <tr class="costamount">
        <td>経費合計</td>
        <td class="cost-amount"><?= number_format($cost); ?></td>
    </tr>
    <tr class="balance">
        <td>差引貯蓄可能額</td>
        <td><?= number_format($salaryForPL->netIncome - $cost); ?></td>
    </tr>
    @endif

    @if (!empty($hoursForPL) === true)
    <tr>
        <td>総労働時間</td>
        <td>{{ $hoursForPL->fixedTime + $hoursForPL->overTime }}</td>
    </tr>
    <tr>
        <td>定時間</td>
        <td>{{ $hoursForPL->fixedTime }}</td>
    </tr>
    <tr>
        <td>残業時間</td>
        <td>{{ $hoursForPL->overTime }}</td>
    </tr>
    <tr>
        <td>時間当たり手取り</td>
        <td><?= round(($salaryForPL->netIncome / ($hoursForPL->fixedTime + $hoursForPL->overTime)), 2); ?></td>
    </tr>
    @endif

    </table>
    <br>
    <br>
    @include('components.linkToTop')
</body>
</html>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/style/common.css') }}">
    <link rel="stylesheet" href="{{ asset('/style/refpl.css') }}">
    <title>個人PL参照(複数月)</title>
</head>
<body>
    <h2>{{ $param['year'] }}年{{ $param['month']-1 }}月から{{ $param['month'] }}月度個人PL</h2>
    
    <!-- ↓　PLマイナス1月　↓ -->
    <table border="1" style="border-collapse: collapse" align="left">
    <!-- 項目 -->
    <tr>
    <th class="accName">項目</th>
    <th class="price">金額</th>
    </tr>
    <!-- 所得 -->
    <tr class="netincome">
        <td>手取給与</td>
        <td class="net-income"><?= number_format($salaryForPLMinus->netIncome); ?></td>
    </tr>
    <!-- 経費 -->
    <?php $costMinus = 0; ?>
    @foreach ($costsForPLMinus as $costForPLMinus)
        <?php $costMinus += $costForPLMinus['accountAmount']; ?>
    @endforeach
    @foreach ($costsForPLMinus as $costForPLMinus)
    <tr>
        <td>{{ $costForPLMinus['accountName'] }}</td>
        <td><?= number_format($costForPLMinus['accountAmount']) . ' ( ' . round($costForPLMinus['accountAmount'] / $costMinus, 4) * 100 . '% )'; ?></td>
    </tr>
    @endforeach
    <tr class="costamount">
        <td>経費合計</td>
        <td class="cost-amount"><?= number_format($costMinus); ?></td>
    </tr>
    <!-- 貯蓄可能額 -->
    <tr class="balance">
        <td>差引貯蓄可能額</td>
        <td><?= number_format($salaryForPLMinus->netIncome - $costMinus); ?></td>
    </tr>
    <!-- 稼働時間 -->
    <tr>
        <td>総労働時間</td>
        <td>{{ $hoursForPLMinus->fixedTime + $hoursForPLMinus->overTime }}</td>
    </tr>
    <tr>
        <td>定時間</td>
        <td>{{ $hoursForPLMinus->fixedTime }}</td>
    </tr>
    <tr>
        <td>残業時間</td>
        <td>{{ $hoursForPLMinus->overTime }}</td>
    </tr>
    <tr>
        <td>時間当たり手取り</td>
        <td><?= round(($salaryForPLMinus->netIncome / ($hoursForPLMinus->fixedTime + $hoursForPLMinus->overTime)), 2); ?></td>
    </tr>
    </table>

    <!-- ↓　PL選択月　↓ -->
    <table border="1" style="border-collapse: collapse" align="center">
    <!-- 項目 -->
    <tr>
    <th class="accName">項目</th>
    <th class="price">金額</th>
    </tr>
    <!-- 所得 -->
    <tr class="netincome">
        <td>手取給与</td>
        <td class="net-income"><?= number_format($salaryForPL->netIncome); ?></td>
    </tr>
    <!-- 経費 -->
    <?php $cost = 0; ?>
    @foreach ($costsForPL as $costForPL)
        <?php $cost += $costForPL['accountAmount']; ?>
    @endforeach
    @foreach ($costsForPL as $costForPL)
    <tr>
        <td>{{ $costForPL['accountName'] }}</td>
        <td><?= number_format($costForPL['accountAmount']) . ' ( ' . round($costForPL['accountAmount'] / $cost, 4) * 100 . '% )'; ?></td>
    </tr>
    @endforeach
    <tr class="costamount">
        <td>経費合計</td>
        <td class="cost-amount"><?= number_format($cost); ?></td>
    </tr>
    <!-- 貯蓄可能額 -->
    <tr class="balance">
        <td>差引貯蓄可能額</td>
        <td><?= number_format($salaryForPL->netIncome - $cost); ?></td>
    </tr>
    <!-- 稼働時間 -->
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
    </table>

    <br>
    <br>
    @include('components.linkToTop')
</body>
</html>

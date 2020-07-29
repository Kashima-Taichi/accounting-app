<!DOCTYPE html>
<html lang="ja">
<head>
    @include('components.header', ['title' => '賞与明細の参照'])
</head>
<body>
<h2>計上された賞与の参照</h2>
    <table border="1" style="border-collapse: collapse" align="center">
    <tr>
    <th class="id">id</th>
    <th class="year">年</th>
    <th class="month">月</th>
    <th class="totalBonus">総支給賞与額</th>
    <th class="healthInsurance">健康保険料</th>
    <th class="employeePension">厚生年金</th>
    <th class="employmentInsurance">雇用保険料</th>
    <th class="incomeTax">所得税</th>
    <th class="totalDeduction">控除額合計</th>
    <th class="netIncome">差引総支給額</th>
    </tr>
        @foreach ($bonusData as $bonusDatum)
            <tr>
                <td>{{ $bonusDatum->id }}</td>
                <td>{{ $bonusDatum->year }}</td>
                <td>{{ $bonusDatum->month }}</td>
                <td><?php echo number_format($bonusDatum->totalBonus); ?></td>
                <td><?php echo number_format($bonusDatum->healthInsurance); ?></td>
                <td><?php echo number_format($bonusDatum->employeePension); ?></td>
                <td><?php echo number_format($bonusDatum->employmentInsurance); ?></td>
                <td><?php echo number_format($bonusDatum->incomeTax); ?></td>
                <td><?php echo number_format($bonusDatum->totalDeduction); ?></td>
                <td><?php echo number_format($bonusDatum->netIncome); ?></td>
            </tr>
        @endforeach
    </table>
    <br>
    @include('components.linkToTop')
</body>
</html>

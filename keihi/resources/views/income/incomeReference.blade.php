<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/style/common.css') }}">
    <title>所得明細の参照</title>
</head>
<body>
<h2>計上された所得金額の参照</h2>
    <table border="1" style="border-collapse: collapse" align="center">
    <tr>
    <th class="id">id</th>
    <th class="year">年</th>
    <th class="month">月</th>
    <th class="totalSalary">総支給金額</th>
    <th class="basicSalary">基本給</th>
    <th class="overtimePay">残業代</th>
    <th class="healthInsurance">健康保険料</th>
    <th class="employeePension">厚生年金</th>
    <th class="employmentInsurance">雇用保険料</th>
    <th class="incomeTax">所得税</th>
    <th class="residentTax">住民税</th>
    <th class="otherDeduction">その他控除</th>
    <th class="totalDeduction">控除額合計</th>
    <th class="netIncome">差引総支給額</th>
    </tr>
        @foreach ($incomeData as $incomeDatum)
            <tr>
                <td><a id="link" href="{{ action('IncomeController@getIndividualSalary', $incomeDatum->id) }}">{{ $incomeDatum->id }}</a></td>
                <td>{{ $incomeDatum->year }}</td>
                <td>{{ $incomeDatum->month }}</td>
                <td><?php echo number_format($incomeDatum->totalSalary); ?></td>
                <td><?php echo number_format($incomeDatum->basicSalary); ?></td>
                <td><?php echo number_format($incomeDatum->overtimePay); ?></td>
                <td><?php echo number_format($incomeDatum->healthInsurance); ?></td>
                <td><?php echo number_format($incomeDatum->employeePension); ?></td>
                <td><?php echo number_format($incomeDatum->employmentInsurance); ?></td>
                <td><?php echo number_format($incomeDatum->incomeTax); ?></td>
                <td><?php echo number_format($incomeDatum->residentTax); ?></td>
                <td><?php echo number_format($incomeDatum->otherDeduction); ?></td>
                <td><?php echo number_format($incomeDatum->totalDeduction); ?></td>
                <td><?php echo number_format($incomeDatum->netIncome); ?></td>
            </tr>
        @endforeach
    </table>
    <br>
    @include('components.linkToTop')
</body>
</html>

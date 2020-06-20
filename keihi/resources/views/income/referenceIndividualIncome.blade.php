<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/style/incomeDone.css') }}">
    <link rel="stylesheet" href="{{ asset('/style/common.css') }}">
    <title>所得の計上</title>
</head>
<body>
<h2>{{ $IndivudualSalary->year }}年{{ $IndivudualSalary->month }}月の計上された所得所得</h2>
<br>
<table border="1" style="border-collapse: collapse" align="center">
<tr>
<th>項目</th>
<th>金額</th>
</tr>
<tr>
<th>総支給金額</th>
<th><?= number_format($IndivudualSalary['totalSalary']); ?></th>
</tr>
<tr>
<th>基本給</th>
<th><?= number_format($IndivudualSalary['basicSalary']); ?></th>
</tr>
<tr>
<th>残業代</th>
<th><?= number_format($IndivudualSalary['overtimePay']); ?></th>
</tr>
<tr>
<th>健康保険料</th>
<th><?= number_format($IndivudualSalary['healthInsurance']); ?></th>
</tr>
<tr>
<th>厚生年金保険料</th>
<th><?= number_format($IndivudualSalary['employeePension']); ?></th>
</tr>
<tr>
<th>雇用保険料</th>
<th><?= number_format($IndivudualSalary['employmentInsurance']); ?></th>
</tr>
<tr>
<th>所得税</th>
<th><?= number_format($IndivudualSalary['incomeTax']); ?></th>
</tr>
<tr>
<th>住民税</th>
<th><?= number_format($IndivudualSalary['residentTax']); ?></th>
</tr>
<tr>
<th>その他の控除額</th>
<th><?= number_format($IndivudualSalary['otherDeduction']); ?></th>
</tr>
<tr>
<th>控除額の総合計</th>
<th><?= number_format($IndivudualSalary['totalDeduction']); ?></th>
</tr>
<tr>
<th>差し引きの支給額</th>
<th><?= number_format($IndivudualSalary['netIncome']); ?></th>
</tr>
</table>
<br>
<div class="edit-or-del">
    <button><a href="{{ action('IncomeController@IncomeDelete', $IndivudualSalary->id) }}">この経費明細を削除する(※このボタンを押すと現在ご覧の経費明細は削除されます)</a></button>
    <button><a href="{{ action('IncomeController@setRecordedSalary', $IndivudualSalary->id) }}">この経費明細を修正する</a></button>
</div>
<br>
@include('components.linkToTop')
</body>
</html>
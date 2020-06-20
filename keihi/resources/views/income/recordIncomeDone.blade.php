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
<h2>所得の計上は成功です</h2>
<br>
<table border="1" style="border-collapse: collapse" align="center">
<tr>
<th>項目</th>
<th>金額</th>
</tr>
<tr>
<th>総支給金額</th>
<th><?= number_format($recordedSalary['totalSalary']); ?></th>
</tr>
<tr>
<th>基本給</th>
<th><?= number_format($recordedSalary['basicSalary']); ?></th>
</tr>
<tr>
<th>残業代</th>
<th><?= number_format($recordedSalary['overtimePay']); ?></th>
</tr>
<tr>
<th>健康保険料</th>
<th><?= number_format($recordedSalary['healthInsurance']); ?></th>
</tr>
<tr>
<th>厚生年金保険料</th>
<th><?= number_format($recordedSalary['employeePension']); ?></th>
</tr>
<tr>
<th>雇用保険料</th>
<th><?= number_format($recordedSalary['employmentInsurance']); ?></th>
</tr>
<tr>
<th>所得税</th>
<th><?= number_format($recordedSalary['incomeTax']); ?></th>
</tr>
<tr>
<th>住民税</th>
<th><?= number_format($recordedSalary['residentTax']); ?></th>
</tr>
<tr>
<th>その他の控除額</th>
<th><?= number_format($recordedSalary['otherDeduction']); ?></th>
</tr>
<tr>
<th>控除額の総合計</th>
<th><?= number_format($recordedSalary['totalDeduction']); ?></th>
</tr>
<tr>
<th>差し引きの支給額</th>
<th><?= number_format($recordedSalary['netIncome']); ?></th>
</tr>
</table>
<br>
@include('components.linkToTop')
</body>
</html>
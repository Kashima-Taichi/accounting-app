<!DOCTYPE html>
<html lang="ja">
<head>
    @include('components.header', ['title' => '賞与の計上'])
    <link rel="stylesheet" href="{{ asset('/style/incomeDone.css') }}">
</head>
<body>
<h2>{{ $recordedBonus['year'] }}年{{ $recordedBonus['month'] }}月の賞与の計上は成功です</h2>
<br>
<table border="1" style="border-collapse: collapse" align="center">
<tr>
<th>項目</th>
<th>金額</th>
</tr>
<tr>
<th>総支給金額</th>
<th><?= number_format($recordedBonus['totalBonus']); ?></th>
</tr>
<tr>
<th>健康保険料</th>
<th><?= number_format($recordedBonus['healthInsurance']); ?></th>
</tr>
<tr>
<th>厚生年金保険料</th>
<th><?= number_format($recordedBonus['employeePension']); ?></th>
</tr>
<tr>
<th>雇用保険料</th>
<th><?= number_format($recordedBonus['employmentInsurance']); ?></th>
</tr>
<tr>
<th>所得税</th>
<th><?= number_format($recordedBonus['incomeTax']); ?></th>
</tr>
<tr>
<th>控除額の総合計</th>
<th><?= number_format($recordedBonus['totalDeduction']); ?></th>
</tr>
<tr>
<th>差し引きの支給額</th>
<th><?= number_format($recordedBonus['netIncome']); ?></th>
</tr>
</table>
<br>
@include('components.linkToTop')
</body>
</html>

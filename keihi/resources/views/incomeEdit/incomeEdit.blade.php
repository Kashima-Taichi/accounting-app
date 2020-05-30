<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/style/incomeRecord.css') }}">
    <link rel="stylesheet" href="{{ asset('/style/common.css') }}">
    <script src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('/js/Incomerecord.js') }}"></script>
    <script src="{{ asset('/js/isNumeric.js') }}"></script>
    <title>所得の計上</title>
</head>
<body>
    <div class="recform">
    @if (count($errors) > 0)
        <h3>入力内容に問題があります</h3>
    @endif
    <h2>{{ $selectedSalary->year }}年{{ $selectedSalary->month }}月度の計上した所得の修正を行う</h2>
    <form action="/incomeedit/incomeeditdone" method="post">
        <div style="display:inline-flex">
        @csrf
        <div>
        <p>総支給金額</p>                                                           
        {{ Form::text('totalSalary', $selectedSalary->totalSalary, ['class' => 'numeric', 'id' => 'totalSalary']) }}
        </div>
        <div>
        <p>基本給</p>
        {{ Form::text('basicSalary', $selectedSalary->basicSalary, ['class' => 'numeric', 'id' => 'basicSalary']) }}
        </div>
        <div>
        <p>残業代</p>
        {{ Form::text('overtimePay', $selectedSalary->overtimePay, ['class' => 'numeric', 'id' => 'overtimePay']) }}
        </div>
        <div>
        <p>健康保険料</p>
        {{ Form::text('healthInsurance', $selectedSalary->healthInsurance, ['class' => 'numeric', 'id' => 'healthInsurance']) }}
        </div>
        <div>
        <p>厚生年金</p>
        {{ Form::text('employeePension', $selectedSalary->employeePension, ['class' => 'numeric', 'id' => 'employeePension']) }}
        </div>
        </div>
        <br>
        <div style="display:inline-flex">
        <div>
        <p>雇用保険料</p>
        {{ Form::text('employmentInsurance', $selectedSalary->employmentInsurance, ['class' => 'numeric', 'id' => 'employmentInsurance']) }}
        </div>
        <div>
        <p>所得税</p>
        {{ Form::text('incomeTax', $selectedSalary->incomeTax, ['class' => 'numeric', 'id' => 'incomeTax']) }}
        </div>
        <div>
        <p>その他控除</p>
        {{ Form::text('otherDeduction', $selectedSalary->otherDeduction, ['class' => 'numeric', 'id' => 'otherDeduction']) }}
        </div>
        <div>
        <p>控除額合計</p>
        {{ Form::text('totalDeduction', $selectedSalary->totalDeduction, ['class' => 'numeric', 'id' => 'totalDeduction']) }}
        </div>
        <div>
        <p>差引総支給額</p>
        {{ Form::text('netIncome', $selectedSalary->netIncome, ['class' => 'numeric', 'id' => 'netIncome']) }}
        </div>
        </div>
        <p>入力が完了したら下のボタンを押下して下さい</p>
        {{ Form::hidden('id', $selectedSalary->id) }}
        {{ Form::hidden('year', $selectedSalary->year) }}
        {{ Form::hidden('month', $selectedSalary->month) }}
        {{ Form::button('上記の内容で所得の修正を行う', ['class' => 'submit', 'id' => 'submit', 'type' => 'submit']) }}
    </form>
        <br>
        @include('components.linkToTop')
    </div>
</body>
</html>
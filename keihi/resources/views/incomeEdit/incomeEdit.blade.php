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
        <input id="totalSalary" type="text" class="numeric" name="totalSalary" value="{{ $selectedSalary->totalSalary }}">
        </div>
        <div>
        <p>基本給</p>
        <input id="basicSalary" type="text" class="numeric" name="basicSalary" value="{{ $selectedSalary->basicSalary }}">
        </div>
        <div>
        <p>残業代</p>
        <input id="overtimePay" type="text" class="numeric" name="overtimePay" value="{{ $selectedSalary->overtimePay }}">
        </div>
        <div>
        <p>健康保険料</p>
        <input id="healthInsurance" type="text" class="numeric" name="healthInsurance" value="{{ $selectedSalary->healthInsurance }}">
        </div>
        <div>
        <p>厚生年金</p>
        <input id="employeePension" type="text" class="numeric" name="employeePension" value="{{ $selectedSalary->employeePension }}">
        </div>
        </div>
        <br>
        <div style="display:inline-flex">
        <div>
        <p>雇用保険料</p>
        <input id="employmentInsurance" type="text" class="numeric" name="employmentInsurance" value="{{ $selectedSalary->employmentInsurance }}">
        </div>
        <div>
        <p>所得税</p>
        <input id="incomeTax" type="text" class="numeric" name="incomeTax" value="{{ $selectedSalary->incomeTax }}">
        </div>
        <div>
        <p>その他控除</p>
        <input id="otherDeduction" type="text" class="numeric" name="otherDeduction" value="{{ $selectedSalary->otherDeduction }}">
        </div>
        <div>
        <p>控除額合計</p>
        <input id="totalDeduction" type="text" class="numeric" name="totalDeduction" value="{{ $selectedSalary->totalDeduction }}">
        </div>
        <div>
        <p>差引総支給額</p>
        <input id="netIncome" type="text" class="numeric" name="netIncome" value="{{ $selectedSalary->netIncome }}">
        </div>
        </div>
        <p>入力が完了したら下のボタンを押下して下さい</p>
        <input type="hidden" name="id" value="{{ $selectedSalary->id }}">
        <input type="hidden" name="year" value="{{ $selectedSalary->year }}">
        <input type="hidden" name="month" value="{{ $selectedSalary->month }}">
        <input id="submit" type="submit" value="上記の内容で所得の修正を行う">
    </form>
        <br>
        @include('components.linkToTop')
    </div>
</body>
</html>
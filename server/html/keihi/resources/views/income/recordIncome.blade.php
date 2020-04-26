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
    @if (!empty($notice))
        <h3>{{ $notice }}</h3>
    @endif
    <h2>所得の計上を行う</h2>
    <form action="/income/recordincomedone" method="post">
        <div style="display:inline-flex">
        @csrf
        <div>
        <p>登録年数</p>
        <input id="year" class="numeric" type="text" name="year">
        </div>
        <div>
        <p>登録月</p>
        <input id="month" class="numeric" type="text" name="month">
        </div>
        <div>
        <p>総支給金額</p>
        <input id="totalSalary" class="numeric" type="text" name="totalSalary">
        </div>
        <div>
        <p>基本給</p>
        <input id="basicSalary" class="numeric" type="text" name="basicSalary">
        </div>
        <div>
        <p>残業代</p>
        <input id="overtimePay" class="numeric" type="text" name="overtimePay">
        </div>
        <div>
        <p>健康保険料</p>
        <input id="healthInsurance" class="numeric" type="text" name="healthInsurance">
        </div>
        </div>
        <br>
        <div style="display:inline-flex">
        <div>
        <p>厚生年金</p>
        <input id="employeePension" class="numeric" type="text" name="employeePension">
        </div>
        <div>
        <p>雇用保険料</p>
        <input id="employmentInsurance" class="numeric" type="text" name="employmentInsurance">
        </div>
        <div>
        <p>所得税</p>
        <input id="incomeTax" class="numeric" type="text" name="incomeTax">
        </div>
        <div>
        <p>その他控除</p>
        <input id="otherDeduction" class="numeric" type="text" name="otherDeduction">
        </div>
        <div>
        <p>控除額合計</p>
        <input id="totalDeduction" class="numeric" type="text" name="totalDeduction">
        </div>
        <div>
        <p>差引総支給額</p>
        <input id="netIncome" class="numeric" type="text" name="netIncome">
        </div>
        </div>
        <input type="hidden" name="yearMonth" value="">
        <p>入力が完了したら下のボタンを押下して下さい</p>
        <input id="submit" type="submit" value="上記の内容で所得の登録を行う">
    </form>
        <br>
        <br>
        <br>
        <br>
        @include('components.linkToTop')
    </div>
</body>
</html>
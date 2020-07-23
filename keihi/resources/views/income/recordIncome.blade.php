<!DOCTYPE html>
<html lang="ja">
<head>
    @include('components.header', ['title' => '所得の計上'])
    <link rel="stylesheet" href="{{ asset('/style/incomeRecord.css') }}">
    @include('components.CallVueJsCDN')
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
        {{ Form::text('year', null, ['class' => 'numeric', 'id' => 'year']) }}
        </div>
        <div>
        <p>登録月</p>
        {{ Form::text('month', null, ['class' => 'numeric', 'id' => 'month']) }}
        </div>
        <div>
        <p>総支給金額</p>
        {{ Form::text('totalSalary', null, ['class' => 'numeric', 'id' => 'totalSalary']) }}
        </div>
        <div>
        <p>基本給</p>
        {{ Form::text('basicSalary', null, ['class' => 'numeric', 'id' => 'basicSalary']) }}
        </div>
        <div>
        <p>残業代</p>
        {{ Form::text('overtimePay', null, ['class' => 'numeric', 'id' => 'overtimePay']) }}
        </div>
        <div>
        <p>健康保険料</p>
        {{ Form::text('healthInsurance', null, ['class' => 'numeric', 'id' => 'healthInsurance']) }}
        </div>
        </div>
        <br>
        <div style="display:inline-flex">
        <div>
        <p>厚生年金</p>
        {{ Form::text('employeePension', null, ['class' => 'numeric', 'id' => 'employeePension']) }}
        </div>
        <div>
        <p>雇用保険料</p>
        {{ Form::text('employmentInsurance', null, ['class' => 'numeric', 'id' => 'employmentInsurance']) }}
        </div>
        <div>
        <p>所得税</p>
        {{ Form::text('incomeTax', null, ['class' => 'numeric', 'id' => 'incomeTax']) }}
        </div>
        <div>
        <p>住民税</p>
        {{ Form::text('residentTax', null, ['class' => 'numeric', 'id' => 'residentTax']) }}
        </div>
        <div>
        <p>その他控除</p>
        {{ Form::text('otherDeduction', null, ['class' => 'numeric', 'id' => 'otherDeduction']) }}
        </div>
        <div>
        <p>控除額合計</p>
        {{ Form::text('totalDeduction', null, ['class' => 'numeric', 'id' => 'totalDeduction']) }}
        </div>
        <div>
        <p>差引総支給額</p>
        {{ Form::text('netIncome', null, ['class' => 'numeric', 'id' => 'netIncome']) }}
        </div>
        </div>
        {{ Form::hidden('yearMonth', '') }}
            <p>入力が完了したら下のボタンを押下して下さい</p>
            {{ Form::button('送信する', ['class' => 'submit', 'id' => 'submit', 'type' => 'submit', 'v-on:click' => 'onclick']) }}
    </form>
        @include('components.linkToTop')
    </div>
    <?php /* ViewModelはid設定した要素より後ろで読み込む */ ?>
    <script src="{{ asset('/js/Incomerecord.js') }}"></script>
</body>
</html>
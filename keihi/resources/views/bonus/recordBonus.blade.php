<!DOCTYPE html>
<html lang="ja">
<head>
    @include('components.header', ['title' => '賞与の計上'])
    <link rel="stylesheet" href="{{ asset('/style/incomeRecord.css') }}">
</head>
<body>
    <div class="recform">
    @if (!empty($notice))
        <h3>{{ $notice }}</h3>
    @endif
    <h2>賞与の計上を行う</h2>
    <form action="/bonus/recorddone" method="post">
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
        {{ Form::text('totalBonus', null, ['class' => 'numeric', 'id' => 'totalBonus']) }}
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
        <p>控除額合計</p>
        {{ Form::text('totalDeduction', null, ['class' => 'numeric', 'id' => 'totalDeduction']) }}
        </div>
        <div>
        <p>差引総支給額</p>
        {{ Form::text('netIncome', null, ['class' => 'numeric', 'id' => 'netIncome']) }}
        </div>
        </div>
        <p>入力が完了したら下のボタンを押下して下さい</p>
        {{ Form::button('送信する', ['class' => 'submit', 'id' => 'submit', 'type' => 'submit']) }}
    </form>
        @include('components.linkToTop')
    </div>
</body>
</html>

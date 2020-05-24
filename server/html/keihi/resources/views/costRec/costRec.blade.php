<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/style/costrec.css') }}">
    <link rel="stylesheet" href="{{ asset('/style/common.css') }}">
    <script src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('/js/costrecord.js') }}"></script>
    <title>経費の計上</title>
</head>
<body>
    <div class="recform">
    @if (count($errors) > 0)
        <h3>入力内容に問題があります</h3>
    @endif
    <h2>経費の計上を行う</h2>
    <form action="/costrec/costrec" method="post">
        @csrf
        <div class="date">
            <div class="year-parts">
                <p>年数を入力して下さい</p>
                {{ Form::text('year', $reuseYear ?? date('Y'), ['class' => 'year', 'id' => 'year']) }}
            </div>
            <div class="month-parts">
                <p>月数を入力して下さい</p>
                {{ Form::text('month', $reuseMonth ?? date('n'), ['class' => 'month', 'id' => 'month']) }}
            </div>
            <div class="day-parts">
                <p>日数を入力して下さい</p>
                {{ Form::text('day', $reuseDay ?? date('j'), ['class' => 'day', 'id' => 'day']) }}
            </div>
        </div>

        <div class="account-parts">
            <p>科目を選択して下さい：</p>
            {!! Form::select('accountName', App\Models\Account::accountsList(), null, ['id' => 'account', 'class' => 'account', 'required' => 'required']) !!}
        </div>

        <div class="price-parts">
            <p>金額を入力して下さい：</p>
            {{ Form::text('price', null, ['id' => 'price', 'class' => 'price numeric']) }}
        </div>
        
        <div class="journal-parts">
            <p>摘要の入力:</p>
            {{ Form::textarea('journal', null, [ 'size' => '3x1','class' => 'journal', 'id' => 'journal']) }}
        </div>

        <br>
        {{ Form::button('送信する', ['class' => 'submit', 'id' => 'submit', 'type' => 'submit']) }}
        <div class="display-result">
            {{ $msg ?? '' }}
        </div>
    </form>
        @include('components.linkToTop')
    </div>
</body>
</html>
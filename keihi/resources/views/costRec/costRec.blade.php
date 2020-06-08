<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/style/costrec.css') }}">
    <link rel="stylesheet" href="{{ asset('/style/common.css') }}">
    @include('components.CallVueJsCDN')
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
            {{ Form::text('price', null, ['id' => 'price', 'class' => 'price']) }}
        </div>
        
        <div class="journal-parts">
            <p>摘要の入力:</p>
            {{ Form::textarea('journal', null, [ 'size' => '3x1','class' => 'journal', 'id' => 'journal']) }}
        </div>

        {{ Form::hidden('date', date('Y') . '-' . date('m') . '-' . date('d')) }}

        <br>
        <div id="submit">
            {{ Form::button('送信する', ['class' => 'submit', 'type' => 'submit', 'v-on:click' => 'onclick']) }}
        </div>
        <div class="display-result">
            {{ $msg ?? '' }}
        </div>
    </form>
        @include('components.linkToTop')
    </div>
    <?php /* ViewModelはid設定した要素より後ろで読み込む */ ?>
    <script src="{{ asset('/js/costrecord.js') }}"></script>
</body>
</html>
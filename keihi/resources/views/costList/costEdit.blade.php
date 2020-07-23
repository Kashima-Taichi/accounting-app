<!DOCTYPE html>
<html lang="ja">
<head>
    @include('components.costrecHeader', ['title' => '経費実績の修正'])
    @include('components.CallVueJsCDN')
</head>
<body>
    <div class="recform">
    <h2>計上された経費の修正を行う</h2>
    <br>
    <form action="/costlist/costeditdone" method="post">
        @csrf

        <div class="date">
            <div class="year-parts">
                <p>年数を入力して下さい</p>
                {{ Form::text('year', $record->year, ['class' => 'year', 'id' => 'year']) }}
            </div>
            <div class="month-parts">
               <p>月数を入力して下さい</p>
                {{ Form::text('month', $record->month, ['class' => 'month', 'id' => 'month']) }}
            </div>
            <div class="day-parts">
                <p>日数を入力して下さい</p>
                {{ Form::text('day', $record->day, ['class' => 'day', 'id' => 'day']) }}
            </div>        
        </div>

        <div class="account-parts">
            <p>勘定科目の修正ができます　　</p>
            <p>現在の勘定科目：{{ $record->accountName }}</p>
            {!! Form::select('accountName', App\Models\Account::accountsList(), $record->accountName, ['id' => 'account', 'class' => 'account', 'required' => 'required']) !!}
        </div>

        <div class="price-parts">
            <p>金額を入力し直して下さい</p>
            <p>現在の計上金額：{{ $record->price }}</p>
            {{ Form::text('price', $record->price, ['id' => 'price', 'class' => 'price']) }}
        </div>

        <div class="journal-parts">
            <p>摘要の修正もできます:</p>
            {{ Form::textarea('journal', $record->journal, [ 'size' => '3x1', 'class' => 'journal', 'id' => 'journal']) }}
        </div>

        {{ Form::hidden('id', $record->id) }}

        <div id="submit">
            {{ Form::button('修正する', ['class' => 'submit', 'type' => 'submit', 'v-on:click' => 'onclick']) }}
        </div>

        <div class="display-result">
            {{ $msg ?? '' }}
        </div>
    </form>
        <br>
        @include('components.linkToTop')
    </div>
    <?php /* ViewModelはid設定した要素より後ろで読み込む */ ?>
    <script src="{{ asset('/js/costrecord.js') }}"></script>
</body>
</html>
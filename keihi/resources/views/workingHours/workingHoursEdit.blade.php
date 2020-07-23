<!DOCTYPE html>
<html lang="ja">
<head>
    @include('components.header', ['title' => '稼働時間の修正'])
</head>
<body>
    @if (count($errors) > 0)
        <h3>入力内容に問題があります</h3>
    @endif
    <h2>{{ $wantEditHours->year }}年{{ $wantEditHours->month }}月度の稼働時間の修正を行う</h2>
    <form action="/workinghours/workinghourseditdone" method="post">
        @csrf
        {{ Form::hidden('id', $wantEditHours->id) }}
        {{ Form::hidden('year', $wantEditHours->year) }}
        {{ Form::hidden('month', $wantEditHours->month) }}
        <p>定時間を修正してください</p>
        {{ Form::text('fixedTime', $wantEditHours->fixedTime, ['class' => 'fixed-time', 'id' => 'fixed-time']) }}
        <p>残業時間を修正してください</p>
        {{ Form::text('overTime', $wantEditHours->overTime, ['class' => 'over-time', 'id' => 'over-time']) }}
        <br>
        {{ Form::button('送信する', ['class' => 'submit', 'id' => 'submit', 'type' => 'submit']) }}
        <br>
        <br>
        <div class="display-result">
            {{ $msg ?? '' }}
        </div>
    </form> 
        <br>
        @include('components.linkToTop')
    </div>
</body>
</html>
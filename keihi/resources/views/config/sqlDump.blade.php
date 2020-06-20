<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/style/common.css') }}">
    @include('components.CallVueJsCDN')
    <title>DBのダンプ方法</title>
</head>
<body>
    <h2>DBのダンプ方法</h2>
    <br>
    <p>DOMの検証からコマンドをコピペしてね！</p>
    <br>
        <div id="copy-command">
            <div class="enter-container-wrapper">
            {{ Form::button('コンテナ接続のコマンドをコピペする', ['v-on:click' => 'container', 'id' => 'enter-container-button']) }}
            <pre>{{ Form::text(null, $enterContainer, ['id' => 'enter-container-command']) }}</pre>
            </div>
            <br>
            <div class="dump-sql-wrapper">
            {{ Form::button('DBダンプのコマンドをコピペする', ['v-on:click' => 'dump', 'id' => 'dump-sql-button']) }}
            <pre>{{ Form::text(null, $sqlStatement, ['id' => 'dump-sql-command']) }}</pre>
            </div>
        </div>
    <br>
    @include('components.linkToTop')
    <?php /* ViewModelはid設定した要素より後ろで読み込む */ ?>
    <script src="{{ asset('/js/clipBoard.js') }}"></script>
</body>
</html>